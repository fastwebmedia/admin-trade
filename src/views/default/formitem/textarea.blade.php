<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }}</label>
	<textarea class="form-control" rows="{{ $rows }}" name="{{ $name }}" @if(isset($readonly))readonly="{{ $readonly }}"@endif>{!! $value !!}</textarea>
	@if(isset($help))
		<div class="help-block">{!! $help !!}</div>
	@endif
	@include(AdminTemplate::view('formitem.errors'))
</div>