@extends('layouts.app')

@section('title', $post->title)
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if($post->thumbnail)
            <img style="height: 550px; object-fit: cover; object-position: center;" class="rounded w-100" src="{{ $post->takeImage }}">
            @endif
            <h1>{{ $post->title }}</h1>
            <div class="text-secondary mb-3">
                <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
                &middot; {{ $post->created_at->format("d F, Y") }}
                &middot;
                @foreach($post->tags as $tag)
                <a href="/tags/{{ $tag->slug }}">{{ $tag->name }}</a>
                @endforeach
                <div class="media my-3">
                    
                    <div class="media-body">
                        <div class="div">
                            {{ $post->author->name }}
                        </div>

                    </div>
                </div>
            </div>
            <p>{!! nl2br($post->body) !!}</p>
            <div>

                @can('delete', $post)
                <div class="flex mt-3">
                    <form action="/posts/{{ $post->slug }}/delete" method="post">
                        @csrf
                        @method("delete")
                        <button class="btn btn-danger btn-sm" data-toggle="modal">Delete</button>
                        <a href="/posts/{{ $post->slug }}/edit" class="btn btn-sm btn-success">Edit</a>
                </div>
                <form action="/posts/{{ $post->slug }}/delete" method="post">
                    @csrf
                    @method("DELETE")

                </form>
                @endcan
            </div>
        </div>
        <div class="col-md-4">
            @foreach($posts as $post)
            <div class="card mb-4">
                <div class="card-body">
                    <div>
                        <a href="{{ route('categories.show', $post->category->slug) }}" class="text-secondary">
                            <small> {{ $post->category->name }} - </small>
                        </a>

                        @foreach($post->tags as $tag)
                        <a href="{{ route('tags.show', $tag->slug) }}" class="text-secondary">
                            <small> {{ $tag->name }} </small>
                        </a>
                        @endforeach
                    </div>
                    <h5>
                        <a class="text-dark" href="{{ route('posts.show', $post->slug) }}" class="card-title">
                            {{ $post->title }}
                        </a>
                    </h5>

                    <div class="text-secondary my-3">
                        {{ Str::limit ($post->body, 120, '.') }}
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="media align-items-center">
                            <img width="40" class="rounded-circle mr-3" src="{{ $post->author->gravatar() }}" alt="">
                            <div class="media-body">
                                <div>
                                    {{ $post->author->name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection