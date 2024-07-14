@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 600px;">
        @session('info')
        <div class="alert alert-info">
            {{session('info')}}
        </div>
        @endsession
        {{$articles->links()}}
        @foreach ($articles as $article)
            <div class="card mb-2">
                <div class="card-body">
                    <h4>{{ $article->title }}</h4>
                    <div class="text-muted mb-2">
                        <b>Category :</b> {{ $article->category->name}},
                        <b>Comments :</b> {{count($article->comments)}}
                    </div>
                    {{-- <div class="text-muted mb-2">{{ $article->category()->first()->name}}</div> --}}
                    <div class="mb-2">{{ $article->body }}</div>
                    <div class="text-success">{{ $article->created_at->diffForHumans() }}</div>
                    <a href="{{ url("/articles/detail/$article->id")}}">
                        View Detail
                    </a>
                </div>
            </div>
        @endforeach
        {{$articles->links()}}
    </div>
@endsection