
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

    <div class="views">

      <div class="view view-main">
                {!! Theme::content() !!}
      </div>

      <div class="toolbar tabbar tabbar-labels">
        <div class="toolbar-inner"><a href="/dashboard" class="tab-link active"> <i class="icon tabbar-demo-icon-1"></i><span class="tabbar-label">Dashboard</span></a><a href="/products" class="tab-link"><i class="icon tabbar-demo-icon-2"></i><span class="tabbar-label">Products</span></a><a href="/user" class="tab-link"> <i class="icon tabbar-demo-icon-3"><span class="badge bg-red">4</span></i><span class="tabbar-label">Users</span></a><a href="#view-4" class="tab-link"> <i class="icon tabbar-demo-icon-4"></i><span class="tabbar-label">Reports</span></a></div>
      </div>
    </div>
    </body>
</html>

{!! Theme::asset()->scripts() !!}