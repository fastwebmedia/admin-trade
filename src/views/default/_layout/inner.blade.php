@extends(AdminTemplate::view('_layout.base'))

@section('content')
	<div class="wrapper">
		<header class="main-header">
			@include(AdminTemplate::view('_partials.header'))
		</header>
		<aside class="main-sidebar">
			<section class="sidebar">
				@include(AdminTemplate::view('_partials.menu'))
			</section>
		</aside>
		<div class="content-wrapper">
            @include(AdminTemplate::view('_partials.flash_message'))
            @if (isset($title))
			<section class="content-header">
				<h1>{{{ $title }}}</h1>
			</section>
			@endif
			<section class="content">
				{!! $content !!}
			</section>
		</div>
	</div>
@stop