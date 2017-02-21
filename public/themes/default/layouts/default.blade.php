<!DOCTYPE html>
<html>
    <head>
        <title>{!! Theme::get('title') !!}</title>
        <meta charset="utf-8">
        <meta name="keywords" content="{!! Theme::get('keywords') !!}">
        <meta name="description" content="{!! Theme::get('description') !!}">
        <meta name="csrf_token" content="{{ csrf_token() }}">
        {!! Theme::asset()->styles() !!}
        {!! Theme::asset()->scripts() !!}
    </head>
    <body>
        <input type="hidden" id="baseURL" value="{{ url('') }}" >
        <div class="container-fluid">
            {!! Theme::content() !!}
        </div>

    </body>
</html>
