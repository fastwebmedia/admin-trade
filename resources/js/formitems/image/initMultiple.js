function ImageUploadMultiple (container, options) {
	if( !this instanceof ImageUploadMultiple ){
		throw new SyntaxError("ImageUploadMultiple constructor called without 'new' keyword!");
	}

	var $container = $(container);

	if( ! $container.length ){
		throw new ReferenceError("ImageUploadMultiple() - Argument #1. container selector matches no elements");
	}

	this.$container = $container;
	this.container = $container[0];

	// merge the options in
	$.extend(this, options);
	this.init();
}

ImageUploadMultiple.prototype = {
	constructor: ImageUploadMultiple,

	init:function() {
		this.setup();
	},

	setup:function() {
		this.$container.each(function (index, item) {

			var $item = $(item);
			var $group = $item.closest('.form-group');
			var $innerGroup = $item.find('.form-group');
			var $errors = $item.find('.errors');
			var $imageBrowse = $item.find('.imageBrowse');
			var loadingBtn = Ladda.create($imageBrowse[0]);

			var flow = new Flow({
				target: $item.data('target'),
				testChunks: false,
				chunkSize: 1024 * 1024 * 1024,
				query: {
					_token: $item.data('token')
				}
			});

			var updatePosition = function ()
			{
				$(item).find('.image_position').each(function(i) {
					$(this).val(i);
				});
			};

			flow.assignBrowse($imageBrowse);

			flow.on('filesSubmitted', function(file) {
				flow.upload();
			});

			flow.on('fileSuccess', function(file, message){
				flow.removeFile(file);

				$errors.html('');
				$group.removeClass('has-error');

				var result = $.parseJSON(message);
				var identifier = $.now();

				$innerGroup.append(
					'<div class="col-xs-12 col-sm-6 col-md-3 imageThumbnail">' +
						'<div class="thumbnail">' +
							'<div class="img-container push">' +
							'<img data-value="' + result.value +'" src="' + result.url + '" />' +
						'</div>' +
						'<div class="push-lg">' +
							'<input type="hidden" name="_image[' + identifier + '][position]" value="" class="image_position" />' +
							'<input type="hidden" name="_image[' + identifier + '][path]" value="' + result.value + '" class="image_path" />' +
							'<input name="_image[' + identifier + '][alt_title]" value="" class="form-control" placeholder="Alt Title" />' +
						'</div>' +
						'<div class="text-right">' +
							'<button class="btn btn-danger btn-sm imageRemove" type="button"><i class="fa fa-remove"></i> Remove</button>' +
						'</div>' +
					'</div>'
				);

				updatePosition();
			});

			flow.on('progress', function(file){
				if ( flow.progress() >= 1 ) {
					loadingBtn.stop();
				}
			});

			flow.on('complete', function(file){
				loadingBtn.stop();
			});

			flow.on('fileError', function(file, message){
				flow.removeFile(file);

				var response = $.parseJSON(message);
				var errors = '';
				$.each(response, function (index, error)
				{
					errors += '<p class="help-block">' + error + '</p>'
				});
				$errors.html(errors);
				$group.addClass('has-error');
				loadingBtn.stop();
			});

			flow.on('uploadStart', function(file){
				loadingBtn = Ladda.create($imageBrowse[0]);
				loadingBtn.start();
			});

			$item.on('click', '.imageRemove', function (e)
			{
				e.preventDefault();
				$(this).closest('.imageThumbnail').remove();

				updatePosition();
			});

			$innerGroup.sortable({
				onUpdate: function ()
				{
					updatePosition();
				}
			});

		});
	}
};

$(function(){
	if($('.imageUploadMultiple').length){
		window.imageuploadMultiple = new ImageUploadMultiple('.imageUploadMultiple');
	}
});
