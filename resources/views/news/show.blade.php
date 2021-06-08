@extends('layouts.app')
@section('content')

    <div class="card" style="width: 100%">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title ?? '' }}</h5>
            <p class="card-text">{{ $post->content ?? ''}}</p>
            <small>{{ $post->created_at ?? ''}}</small>
            <div class="float-right">
                <a href="/" class="btn btn-primary">Back</a>
            </div>
        </div>
    </div>
@endsection
