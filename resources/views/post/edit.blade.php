@extends('Components.layout')

@section('content')
<div class="container">
    <h2>Create New Post</h2>
    <form action="{{ route('post.update', $post->id) }}" method="POST" class="needs-validation" novalidate>
       @csrf
    @method('PATCH')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ $post->title }}">
        </div>

        <div class="mb-3">
            <label for="post_content" class="form-label">Post Content</label>
            <textarea class="form-control" id="post_content" name="post_content" rows="4" placeholder="Enter content">"{{ $post->post_content }}"</textarea>
        </div>
        <div class="mb-3">
            <label for="likes" class="form-label">Likes</label>
            <input type="number" class="form-control" id="likes" name="likes" placeholder="Number of likes" required value="{{ $post->post_content }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>
@endsection
