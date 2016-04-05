<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }}</label>
	<div class="imageUpload" data-target="{{ route('admin.formitems.image.uploadImage') }}" data-token="{{ csrf_token() }}">
		<div>
			<div class="thumbnail">
				<img class="no-value {{ empty($value) ? '' : 'hidden' }}" src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&text=no+image" width="200px" height="150px" />
				<img class="has-value {{ empty($value) ? 'hidden' : '' }}" src="{{ $value }}" width="200px" height="150px" />
			</div>
		</div>
		<div>
			<button class="btn btn-primary imageBrowse ladda-button" data-style="expand-left" type="button">
				<span class="ladda-label">
					<i class="fa fa-upload"></i>
					 {{ trans('admin::lang.image.browse') }}
				</span>
			</button>
			<div class="btn btn-danger imageRemove"><i class="fa fa-times"></i> {{ trans('admin::lang.image.remove') }}</div>
		</div>
		<input name="{{ $name }}" class="imageValue" type="hidden" value="{{ $value }}">
		<div class="errors">
			@include(AdminTemplate::view('formitem.errors'))
		</div>
	</div>
	@if(isset($help))
		<div class="help-block">{!! $help !!}</div>
	@endif
</div>
