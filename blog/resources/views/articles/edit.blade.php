@extends('layouts.app')

@section('content')
    <div class="container" style="max-width: 600px;">
        <h2>Edit Article</h2>
        @if($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{url("/articles/update/$article->id")}}" method="POST">
            @csrf
            <input type="text" name="title" placeholder="Title" class="form-control mb-2" value="{{$article->title}}">
            <textarea name="body" placeholder="Body" class="form-control mb-2">{{$article->body}}</textarea>
            <select name="category_id" class="form-select mb-2">
                @foreach($categories as $category)
                    <option value="{{$category->id}}" @selected($article->category_id == $category->id)>{{$category->name}}</option>
                @endforeach
            </select>
            <button class="btn btn-primary">Edit Article</button>
        </form>
    </div>
@endsection