<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }}</label>
	<div class="imageUploadMultiple" data-target="{{ route('admin.formitems.image.uploadImage') }}" data-token="{{ csrf_token() }}">
		<div class="row form-group images-group">
			@foreach ($value as $image)

				<div class="col-xs-12 col-sm-6 col-md-3 imageThumbnail">
					<div class="thumbnail">
						<div class="img-container push">
							<img data-value="{{ $image->path }}" src="{{ $image->getSize('medium') }}" />
						</div>
						<div class="push-lg">
							<input type="hidden" name="_image[{{ $image->id }}][position]" value="{{ $image->position }}" class="image_position" />
							<input type="hidden" name="_image[{{ $image->id }}][path]" value="{{ $image->path }}" class="image_path" />
							<input type="text" name="_image[{{ $image->id }}][alt_title]" value="{{ $image->alt_title }}" class="form-control" placeholder="Alt Title" />
						</div>
						<div class="text-right">
							{{--<button class="btn btn-primary btn-sm" type="button"><i class="fa fa-expand"></i> Expand</button>--}}
							<button class="btn btn-danger btn-sm imageRemove" type="button"><i class="fa fa-remove"></i> Remove</button>
						</div>
					</div>
				</div>

			@endforeach
		</div>
		<div>
			<button class="btn btn-primary imageBrowse ladda-button" data-style="expand-left" type="button">
				<span class="ladda-label">
					<i class="fa fa-upload"></i>
					{{ trans('admin::lang.image.browseMultiple') }}
				</span>
			</button>
		</div>
		<input name="{{ $name }}" class="imageValue" type="hidden" value="">
		<div class="errors">
			@include(AdminTemplate::view('formitem.errors'))
		</div>
	</div>
	@if(isset($help))
		<div class="help-block">{!! $help !!}</div>
	@endif
</div>
