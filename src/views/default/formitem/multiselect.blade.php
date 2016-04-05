<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
	<label for="{{ $name }}">{{ $label }}</label>
	<div>
		<select id="{{ $name }}" name="{{ $name }}[]" class="form-control multiselect" multiple="multiple">
			@foreach ($options as $optionValue => $optionLabel)
				<option value="{{ $optionValue }}" {!! isset($value) && in_array($optionValue, $value) ? 'selected="selected"' : '' !!}>{{ $optionLabel }}</option>
			@endforeach
		</select>
	</div>
	@if(isset($help))
		<div class="help-block">{!! $help !!}</div>
	@endif
	@include(AdminTemplate::view('formitem.errors'))
</div>