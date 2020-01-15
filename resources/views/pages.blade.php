@extends('layouts.mainlayout')
@section('content')
<main class="main-content">
	@foreach($page_data as $page)
	<div class="breadcrumbs">
		<div class="container">
			<a href="/">Home</a>
			<span>{{$page->title}}</span>
		</div>
	</div>

	<div class="page">
		<div class="container">
			<h2>{!! $page->title !!}</h2>
			<!--<strong>Description:</strong> -->
			<p>{!! $page->short_description !!}</p>
			<strong>Content Block:</strong>
			@foreach($page_blocks as $page_block)
				<p>{!! $page_block->text !!}</p>
			@endforeach
			<!-- <h3>Page Meta</h3>
			@foreach($page_meta_data as $page_meta)
			<strong>Meta Title:</strong>
			<p>{!! $page_meta->meta_title !!}</p>
			<strong>Meta Keyword:</strong>
			<p>{!! $page_meta->meta_keyword !!}</p>
			<strong>Meta Description:</strong>
			<p>{!! $page_meta->meta_description !!}</p> -->
			@endforeach
		</div>
	</div> <!-- .page -->
	@endforeach
</main>
@endsection