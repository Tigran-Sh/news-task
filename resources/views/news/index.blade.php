@extends('layouts.app')
@section('content')
    @foreach($news as $post)
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <a href="{{ route('news.show',['slug' => $post->slug]) }}" class="btn btn-primary">View</a>
            </div>
        </div>
        <br>
    @endforeach
@endsection
