@extends('layouts.blog_master')

@section('content')
<div class="col-sm-8 blog-main">

    <h1>{{$post->title}}</h1>
    @if(count($post->tags))
    <ul class="list-group">
        @foreach($post->tags as $tag)
        <li class="list-group-item">{{$tag->name}}</li>
        @endforeach
    </ul>
    @endif
    {{$post->body}}
    <hr>
    <div class='comments'>
        <ul class="list-group">
            @foreach($post->comments as $comment)
            <li class='list-group-item'>
                <strong>{{$comment->created_at->diffForHumans()}}: &nbsp;</strong>
                {{$comment->body}}

            </li>
            @endforeach
        </ul>
    </div>
    {{-- Add a comment --}}
    <div class='card'>
        <div class="card-block">
            <form method="POST" action="/posts/{{$post->id}}/comments">
                {{@csrf_field()}}
                <div class="form-group">
                    <textarea name='body' placeholder="Your Comment Here" class='form-control' required>
                        
                    </textarea>
                </div>
                 <div class="form-group">
                    <button type='submit' value='submit' class='btn btn-primary'>
                        Add Comment
                    </button>
                </div>
            </form>
            @include('layouts.includes.errors')
        </div>
    </div>
</div>
@endsection