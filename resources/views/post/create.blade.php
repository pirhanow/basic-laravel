@extends('Components.layout')

@section('content')
<div class="container">
    <h2>Create New Post</h2>
    <form action="{{ route('post.store') }}" method="POST" class="needs-validation" novalidate>
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
        </div>

        <div class="mb-3">
            <label for="post_content" class="form-label">Post Content</label>
            <textarea class="form-control" id="post_content" name="post_content" rows="4" placeholder="Enter content" required></textarea>
        </div>
        <div class="mb-3">
            <label for="likes" class="form-label">Likes</label>
            <input type="number" class="form-control" id="likes" name="likes" placeholder="Number of likes" required>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
           <select class="form-control" id="category" name="category_id">
    @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ (old('category_id', $post->category_id ?? '') == $category->id) ? 'selected' : '' }}>
            {{ $category->title }}
        </option>
    @endforeach
</select>
        </div>


        <div class="form-group">
            <label for="tags">Tags</label>
           <select class="form-control" id="tags" name="tags[]" multiple>
            @foreach ($tags as $tag)
        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
        @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>
@endsection
