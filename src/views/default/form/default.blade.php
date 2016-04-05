<div class="box">
	{!! Form::model($instance, ['method' => 'POST', 'url' => $action]) !!}

		<input type="hidden" name="_redirectBack" value="{{ $backUrl }}" />

		@foreach ($items as $item)
			{!! $item !!}
		@endforeach

		<hr />

		<div class="form-group">
			<input type="submit" value="{{ trans('admin::lang.table.save') }}" class="btn btn-primary flat"/>
			<a href="{{ $backUrl }}" class="btn btn-default flat">{{ trans('admin::lang.table.cancel') }}</a>
		</div>

	{!! Form::close() !!}
</div>