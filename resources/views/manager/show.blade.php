@extends('layouts.app')
@section('content')
    <div class="card" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->content }}</p>
            @foreach($post->categories()->get() as $category)
                <small><b>{{ $category->title }}</b></small>
            @endforeach
            <br>
            <div class="float-right">
                <a href="/manager" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
