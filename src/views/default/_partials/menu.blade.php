<ul class="sidebar-menu">
	<li class="header">{{ trans('admin::lang.navigation.main-label') }}</li>
	@foreach (Admin::instance()->getMenu() as $item)
		{!! $item !!}
	@endforeach
</ul>