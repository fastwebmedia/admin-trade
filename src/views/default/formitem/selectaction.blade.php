<div class="form-inline">
	<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
		<div>
			<label for="{{ $name }}">{{ $label }}</label>
		</div>

		<select id="{{ $name }}" name="{{ $name }}" class="form-control multiselect" data-select-type="single" {!! ($nullable) ? 'data-nullable="true"' : '' !!}>
			@if ($nullable)
				<option value=""></option>
			@endif
			@foreach ($options as $optionValue => $optionLabel)
				<option value="{{ $optionValue }}" {!! ($value == $optionValue) ? 'selected="selected"' : '' !!}>{{ $optionLabel }}</option>
			@endforeach
		</select>

		&nbsp;
		<button type="button" class="btn btn-success btn-xs add-content">Add Content</button>

		@include(AdminTemplate::view('formitem.errors'))
	</div>
</div>


<script>
// todo: move this into resources
$(function(){

	$('.add-content').on('click', function(e){
		var $this = $(this),
			$target = $('#dynamic-content'),
			contentId = $this.closest('select').chosen().val();



	});

});
</script>