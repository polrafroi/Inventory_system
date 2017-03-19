
<!DOCTYPE html>
<html>
    <head>
        <title>{!! Theme::get('title') !!}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
        <meta name="keywords" content="{!! Theme::get('keywords') !!}">
        <meta name="description" content="{!! Theme::get('description') !!}">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        {!! Theme::asset()->styles() !!}
        {!! Theme::asset()->scripts() !!}
    </head>
    <body>
    <!-- Status bar overlay for fullscreen mode-->
    <div class="statusbar-overlay"></div>
    <!-- Panels overlay-->
    <div class="panel-overlay"></div>
    <!-- Left panel with reveal effect-->
    <div class="panel panel-left panel-reveal">
        <div class="content-block">
            <p>Left panel content goes here</p>
        </div>
    </div>
    <!-- Right panel with cover effect-->
    <div class="panel panel-right panel-cover">
        <div class="content-block">
            <p>Right panel content goes here</p>
        </div>
    </div>
    <!-- Views, and they are tabs-->
    <!-- We need to set "toolbar-through" class on it to keep space for our tab bar-->
    <div class="views tabs toolbar-through">
        <!-- Your first view, it is also a .tab and should have "active" class to make it visible by default-->
        <div id="view-1" class="view view-main tab active">
            <!-- Pages-->
            <div class="pages">
                <!-- Page, data-page contains page name-->
                <div data-page="index-1" class="page">
                    {!! Theme::content() !!}
                </div>
            </div>
        </div>
        <!-- Bottom Tabbar-->
        <div class="toolbar tabbar tabbar-labels">
            <div class="toolbar-inner"><a href="/dashboard" class="tab-link active"> <i class="icon tabbar-demo-icon-1"></i><span class="tabbar-label">Dashboard</span></a><a href="/productout" class="tab-link"><i class="icon tabbar-demo-icon-2"></i><span class="tabbar-label">Products</span></a><a href="/user" class="tab-link"> <i class="icon tabbar-demo-icon-3"><span class="badge bg-red">4</span></i><span class="tabbar-label">Users</span></a><a href="#view-4" class="tab-link"> <i class="icon tabbar-demo-icon-4"></i><span class="tabbar-label">Reports</span></a></div>
        </div>
    </div>
    </body>
</html>

{!! Theme::asset()->scripts() !!}