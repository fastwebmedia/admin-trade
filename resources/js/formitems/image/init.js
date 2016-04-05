function ImageUpload (container, options) {
	if( !this instanceof ImageUpload ){
		throw new SyntaxError("ImageUpload constructor called without 'new' keyword!");
	}

	var $container = $(container);

	if( ! $container.length ){
		throw new ReferenceError("ImageUpload() - Argument #1. container selector matches no elements");
	}

	this.$container = $container;
	this.container = $container[0];

	// merge the options in
	$.extend(this, options);
	this.init();
}

ImageUpload.prototype = {
	constructor: ImageUpload,

	init:function() {
		this.setup();
	},

	setup:function() {
		this.$container.each(function (index, item) {

			var $item = $(item);
			var $group = $item.closest('.form-group');
			var $errors = $item.find('.errors');
			var $noValue = $item.find('.no-value');
			var $hasValue = $item.find('.has-value');
			var $thumbnail = $item.find('.thumbnail img.has-value');
			var $input = $item.find('.imageValue');
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

			flow.assignBrowse($imageBrowse[0], false, true);

			flow.on('filesSubmitted', function(file) {
				flow.upload();
			});

			flow.on('fileSuccess', function(file,message){
				flow.removeFile(file);

				$errors.html('');
				$group.removeClass('has-error');

				var result = $.parseJSON(message);
				$thumbnail.attr('src', result.url);
				$hasValue.find('span').text(result.value);
				$input.val(result.value);
				$noValue.addClass('hidden');
				$hasValue.removeClass('hidden');
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

			$item.find('.imageRemove').on('click', function(){
				$input.val('');
				$noValue.removeClass('hidden');
				$hasValue.addClass('hidden');
			});

		});
	}
};

$(function(){
	if($('.imageUpload').length){
		window.imageupload = new ImageUpload('.imageUpload');
	}
});
