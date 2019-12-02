
@include('admin.includes.head')

@include('admin.includes.header')
@include('admin.includes.sidebar')
@include('admin.includes.aside')
<main class="main">
	@yield('breadcrumb')
	<div class="container-fluid">
		@yield('content')
	</div>
</main>

@include('admin.includes.footer')
