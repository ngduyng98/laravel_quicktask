<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">{{ trans('language') }}
    </button>
    <div class="dropdown-menu">
        <a href="{!! route('change_language', ['en']) !!}" class="dropdown-item">{{ trans('english') }}</a>
        <a href="{!! route('change_language', ['vi']) !!}" class="dropdown-item">{{ trans('vietnamese') }}</a>
    </div>
</div>
