@extends('layouts.app')
@section('content')
    <form action="{{ route('manager.store') }}" method="POST">
        @method('POST')
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Enter the title...">
        </div>
        <div class="form-group">
            <label for="text">Content</label>
            <textarea class="form-control" name="content" id="text" rows="3" placeholder="Enter the content..."></textarea>
        </div>
        <div class="form-group">
            <label for="categories">Categories</label>
            <select multiple class="form-control" name="category_ids[]" id="categories">
                @forelse($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                @empty

                @endforelse
            </select>
        </div>
        <div class="form-group">
            <button class="btn btn-success">Save</button>
        </div>
    </form>
@endsection
