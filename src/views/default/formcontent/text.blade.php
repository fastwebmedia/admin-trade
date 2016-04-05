<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">
			<a data-toggle="collapse" href="#collapse{{str_slug($name)}}">{{ $label }} <i class="fa fa-angle-down pull-right"></i></a>
		</h4>
	</div>
	<div id="collapse{{str_slug($name)}}" class="panel-collapse collapse">
		<div class="panel-body">

			<div class="form-group {{ $errors->has($name) ? 'has-error' : '' }}">
				<textarea class="ckeditor" name="{{ $name }}">{!! $value !!}</textarea>
				@include(AdminTemplate::view('formitem.errors'))
			</div>

		</div>
	</div>
</div>