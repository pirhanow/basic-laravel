@extends('Components.layout') {{-- или 'layouts.app' --}}

@section('content')

<div class="container my-4">
    <div>
        <a href="{{ route('post.create') }}">Add Post</a>
    </div>
    <h1 class="mb-4 text-center">List of Posts</h1>
    @if($posts->isEmpty())
        <p class="text-center text-muted">No posts available.</p>
    @else
        @foreach($posts as $post)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h2 class="card-title">
                        <a href="{{ route('post.show', ['post' => $post]) }}">{{ $post->title }}</a>
                    </h2>
                    <p class="card-text">{{ $post->content }}</p>
                </div>
            </div>
        @endforeach
    @endif
</div>
@endsection
