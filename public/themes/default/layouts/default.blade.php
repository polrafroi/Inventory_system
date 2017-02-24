<!DOCTYPE html>
<html>
    <head>
        <title>{!! Theme::get('title') !!}</title>
        <meta charset="utf-8">
        <meta name="keywords" content="{!! Theme::get('keywords') !!}">
        <meta name="description" content="{!! Theme::get('description') !!}">
        <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">
        <meta name="csrf_token" content="{{ csrf_token() }}">
        {!! Theme::asset()->styles() !!}
        {!! Theme::asset()->scripts() !!}
    </head>
    <body>
        <input type="hidden" id="baseURL" value="{{ url('') }}" >
        <div class="container-fluid body-container">
            <div class="row">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#">
                                asd
                            </a>
                        </div>
                        <div class="navbar-collapse collapse" id="navbar">
                            <ul class="nav navbar-nav navbar-right" >
                                <li><a>asdasd</a></li>
                                <li><a>asdasd</a></li>
                                <li><a>asdasd</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            {!! Theme::content() !!}
        </div>
    </body>
</html>
