

@extends('Components.layout') {{-- или 'layouts.app' --}}

@section('content')
<div class="container my-4">
    <a href="{{ route('post.index') }}" class="btn btn-secondary mb-4"> To the list of posts</a>

    <div class="card">
        <div class="card-body">
            <h1 class="card-title">{{ $post->title }}</h1>
           <p class="card-text">{{ $post->post_content }}</p>

        </div>
    </div>
</div>
<div>
    <a href="{{ route('post.index') }}">Back</a>
</div>
<div>
    <a href="{{ route('post.edit', $post->id) }}">Edit</a>
</div>
<div>
<form action="{{ route('post.destroy', $post->id) }}" method="POST">
    @csrf
    @method('delete')
    <input type="submit" value="DELETE">
</form>
</div>
