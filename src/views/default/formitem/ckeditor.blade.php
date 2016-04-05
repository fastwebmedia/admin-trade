<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }}</label>
	<textarea class="ckeditor" name="{{ $name }}">{!! $value !!}</textarea>
	@if(isset($help))
		<div class="help-block">{!! $help !!}</div>
	@endif
	@include(AdminTemplate::view('formitem.errors'))
</div>