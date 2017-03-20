
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
    <div class="views tabs toolbar-through">
        <div id="view-1" class="view view-main tab active">
            <div class="speed-dial"><a href="#" class="floating-button"><i class="icon f7-icons">add</i><i class="icon f7-icons">close</i></a>
                <div class="speed-dial-buttons"><a href="/chatmobile"><i style="font-size: 20px" class="icon f7-icons">email</i></a><a href="#"><i style="font-size: 20px" class="icon f7-icons">today</i></a><a href="#"><i style="font-size: 20px" class="icon f7-icons">download</i></a></div>
            </div>
            <!-- Second view (for second wrap)-->
            {!! Theme::content() !!}
        </div>

      <div class="toolbar tabbar tabbar-labels">
        <div class="toolbar-inner"><a href="/dashboard" class="tab-link active"> <i class="icon tabbar-demo-icon-1"></i><span class="tabbar-label">Dashboard</span></a><a href="/products" class="tab-link"><i class="icon tabbar-demo-icon-2"></i><span class="tabbar-label">Products</span></a><a href="/user" class="tab-link"> <i class="icon tabbar-demo-icon-3"><span class="badge bg-red">4</span></i><span class="tabbar-label">Users</span></a><a href="#view-4" class="tab-link"> <i class="icon tabbar-demo-icon-4"></i><span class="tabbar-label">Reports</span></a></div>
      </div>
    </div>
    </body>


</html>

{!! Theme::asset()->scripts() !!}