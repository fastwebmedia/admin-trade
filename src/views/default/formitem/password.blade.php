<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }}</label>
	<input class="form-control"
		   name="{{ $name }}"
		   type="password"
		   id="{{ $name }}"
		   value=""
		   @if(isset($placeholder))placeholder="{{ $placeholder }}" @endif
		   @if(isset($readonly))readonly="{{ $readonly }}"@endif>
	@if(isset($help))
		<div class="help-block">{!! $help !!}</div>
	@endif
	@include(AdminTemplate::view('formitem.errors'))
</div>