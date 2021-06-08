@extends('layouts.app')
@section('content')
    <div class="float-right">
        <a href="{{ route('manager.create') }}" class="link-primary">Add Post</a>
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Slug</th>
            <th scope="col">Created at</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">1</th>
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <div class="row">
                        <a href="{{ route('manager.edit', ['manager' => $post->id]) }}"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('manager.show', ['manager' => $post->id]) }}"><i class="fa fa-eye"></i></a>
                        {{--                    here must`ve been delete popup :D                     --}}
                        <form action="{{ route('manager.destroy', ['manager' => $post->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button style="border: none; background-color: white; color: #007bff;" type="submit"
                                    onclick="return confirm('Are you sure you want to delete this post?')"><i
                                    class="fa fa-remove"></i></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
