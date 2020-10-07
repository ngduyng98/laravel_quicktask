@extends('layouts.app')

@section('content')
    <div class="wrap-edit-post-page">
        <h2 class="text-center">{{ trans('post.title_edit') }}</h2>
        <form action="{{ route('posts.update', [$post->id]) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label>{{ trans('post.id') }}</label>
                <input type="text" class="form-control" name="id" value="{{ $post->id }}" readonly>
            </div>
            <div class="form-group">
                <label>{{ trans('post.title') }}</label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}" required>
                @if ($errors->has('title'))
                    <div class="text text-danger">
                        {{ trans($errors->first('title')) }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>{{ trans('post.content') }}</label>
                <input type="text" class="form-control" name="content" value="{{ $post->content }}" required>
                @if ($errors->has('content'))
                    <div class="text text-danger">
                        {{ trans($errors->first('content')) }}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label>{{ trans('post.image') }}</label>
                <input type="text" class="form-control" value="{{ $post->image }}" name="image" readonly>
                <img style="" src="{{ $post->image }}" alt="{{ trans('post->image') }}" class="img-post">
                <input type="file" class="form-control" name="image">
                @if ($errors->has('image'))
                    <div class="text text-danger">
                        {{ trans($errors->first('image')) }}
                    </div>
                @endif
            </div>
            <input type="submit" class="btn btn-primary" value="{{ trans('post.save') }}">
        </form>
    </div>
@endsection
