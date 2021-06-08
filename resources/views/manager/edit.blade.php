@extends('layouts.app')
@section('content')

    <form action="{{ route('manager.update',['manager' => $post->id]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" value="{{ $post->title }}" class="form-control" name="title" id="title" placeholder="Enter the title...">
        </div>
        <div class="form-group">
            <label for="text">Content</label>
            <textarea class="form-control" name="content" id="text" rows="3" placeholder="Enter the content...">{{ $post->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="categories">Categories</label>
            <select multiple class="form-control" name="category_ids[]" id="categories">
                @foreach($categories as $category)
                    <option {{ in_array($category->id, $selectedCategories) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
{{--                @foreach ($selectedCategories as $category)--}}
{{--                    <option {{ in_array($category->id,$categories) ? 'selected' : '' }} value={{ $category->id }}>{{ $category->title }}</option>--}}
{{--                @endforeach--}}
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-success">Save</button>
        </div>
    </form>

@endsection
