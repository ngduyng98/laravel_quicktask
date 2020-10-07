@extends('layouts.app')

@section('content')
<div class="wrap-create-post-page">
    <h2 class="text-center">{{ trans('post.title_create') }}</h2>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>{{ trans('post.title') }}</label>
            <input type="text" class="form-control" name="title" required>
            @if ($errors->has('title'))
                <div class="text text-danger">
                    {{ trans($errors->first('title')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('post.content') }}</label>
            <input type="text" class="form-control" name="content" required>
            @if ($errors->has('content'))
                <div class="text text-danger">
                    {{ trans($errors->first('content')) }}
                </div>
            @endif
        </div>
        <div class="form-group">
            <label>{{ trans('post.image') }}</label>
            <input type="file" class="form-control" name="image" required>
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
