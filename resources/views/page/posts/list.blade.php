@extends('layouts.app')

@section('content')
    <div class="wrap-list-post-page">
        <h2 class="text-center"> {{trans('post.title_list')}} {{ $user_name }}</h2>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">
            {{ trans('post.create_new') }}</a>
        <table class="table table-striped table-bordered table-image">
            <thead>
                <tr class="d-flex">
                    <th>#</th>
                    <th>{{ trans('post.title') }}</th>
                    <th>{{ trans('post.content') }}</th>
                    <th> {{ trans('post.image') }}</th>
                    <th>{{ trans('post.action') }}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $count = 1;
                @endphp

                @foreach ($posts as $post)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td> {{ $post->title }}</td>
                    <td>{{ $post->content }}</td>
                    <td class="text-center">
                        <div class="d-flex flex-row flex-nowrap">
                            <div class="img img-responsive">
                                <img src="{{asset($post->image)}}" alt="{{ trans('post.image_post')}}" class="img img-post"/>
                             </div>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('posts.edit', [$post->id]) }}" class="btn btn-primary">{{ trans('post.edit') }}</a>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete-{{ $post->id }}">{{ trans('post.delete') }}</button>
                        <div class="modal fade" id="delete-{{ $post->id }}" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{ trans('post.popup.title_delete')}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {{ trans('post.popup.comfirm_delete') }}
                                    </div>
                                    <div class="modal-footer">
                                        <form method="POST" action="{{ route('posts.destroy', [$post->id]) }}">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" class="btn btn-danger" value="{{ trans('post.popup.yes') }}">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">{{ trans('post.popup.no') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
@endsection
