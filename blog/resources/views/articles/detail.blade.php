@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 600px;">
        <div class="card mb-2">
            <div class="card-body">
                <h4>{{ $article->title }}</h4>
                <div class="text-muted mb-2"> Category : {{ $article->category->name}}</div>
                <div class="mb-2">{{ $article->body }}</div>
                <div class="text-success">{{ $article->created_at->diffForHumans() }}</div>
                <a href="{{url("/articles/delete/$article->id")}}" class="btn btn-outline-danger btn-sm">Delete</a>
                <a href="{{url("/articles/edit/$article->id")}}" class="btn btn-outline-warning btn-sm">Edit</a>
            </div>
        </div>
        <ul class="list-group mt-4">
            <li class="list-group-item active">Comments ({{ count($article->comments)}})</li>
            @foreach ($article->comments as $comment)
                <li class="list-group-item">
                    <a href="{{url("/comments/delete/$comment->id")}}" class="btn-close float-end"></a>
                    {{$comment->content}}
                </li>
            @endforeach
            <form action="{{url("/comments/add")}}" method="post">
                @csrf
                <input type="hidden" value="{{$article->id}}" name="article_id">
                <textarea name="content" class="form-control my-2"></textarea>
                <button class="btn btn-secondary">Add Comment</button>
            </form>
        </ul>
    </div>
@endsection