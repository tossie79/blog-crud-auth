@extends('layouts.blog_master')
@section('content')

<div class="col-sm-8 blog-main">
@if(count($posts) >0)
    @foreach($posts as $post)
        @include('posts.post')
    @endforeach
@endif

    <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#">Newer</a>
    </nav>

</div><!-- /.blog-main -->
@endsection


