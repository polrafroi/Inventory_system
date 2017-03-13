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
            <!-- Scrollable page content-->
            <div class="page-content">
              <div class="content-block-title">Dashboard</div>
              <div class="content-block">
                <p>This is an example of tab bar application layout. The main point of such tabbed layout is that each tab contains independent view with its own routing and navigation.</p>
                <p>Each tab/view may have different layout, different navbar type (dynamic, fixed or static) or without navbar like this tab.</p>
                <p>And of course, your favorite panels are still here: <a href="#" class="open-panel">left</a> and  <a href="#" data-panel="right" class="open-panel">right</a></p>
                <p>Icons and their labels in tab bar below are just for example and don't related to their content.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Second view (for second wrap)-->
      <div id="view-2" class="view tab">
        <!-- We can make with view with navigation, let's add Top Navbar-->
        <div class="navbar">
          <div class="navbar-inner">
            <div class="center sliding">Products</div>
          </div>
        </div>
        <div class="pages navbar-through">
          <div data-page="index-2" class="page">
            <div class="page-content">
              <div class="content-block">
                <p>This is a second view. Lets, for example, have here some internal pages with navbar navigation</p>
              </div>
              <div class="list-block">
                <ul>
                  <li><a href="about.html" class="item-link">
                      <div class="item-content">
                        <div class="item-inner"> 
                          <div class="item-title">Manage Products</div>
                        </div>
                      </div></a></li>
                  <li><a href="services.html" class="item-link">
                      <div class="item-content"> 
                        <div class="item-inner">
                          <div class="item-title">Product Out</div>
                        </div>
                      </div></a></li>
                      <li><a href="services.html" class="item-link">
                      <div class="item-content"> 
                        <div class="item-inner">
                          <div class="item-title">Product In</div>
                        </div>
                      </div></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="view-3" class="view tab">
        
        <div class="pages">
          <div data-page="index-3" class="page">
            <div class="page-content">
              <div class="content-block-title">Another plain static view</div>
              <div class="content-block">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel commodo massa, eu adipiscing mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus ultricies dictum neque, non varius tortor fermentum at. Curabitur auctor cursus imperdiet. Nam molestie nisi nec est lacinia volutpat in a purus. Maecenas consectetur condimentum viverra. Donec ultricies nec sem vel condimentum. Phasellus eu tincidunt enim, sit amet convallis orci. Vestibulum quis fringilla dolor.    </p>
                <p>Mauris commodo lacus at nisl lacinia, nec facilisis erat rhoncus. Sed eget pharetra nunc. Aenean vitae vehicula massa, sed sagittis ante. Quisque luctus nec velit dictum convallis. Nulla facilisi. Ut sed erat nisi. Donec non dolor massa. Mauris malesuada dolor velit, in suscipit leo consectetur vitae. Duis tempus ligula non eros pretium condimentum. Cras sed dolor odio.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla vel commodo massa, eu adipiscing mi. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Phasellus ultricies dictum neque, non varius tortor fermentum at. Curabitur auctor cursus imperdiet. Nam molestie nisi nec est lacinia volutpat in a purus. Maecenas consectetur condimentum viverra. Donec ultricies nec sem vel condimentum. Phasellus eu tincidunt enim, sit amet convallis orci. Vestibulum quis fringilla dolor.    </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="view-4" class="view tab">
        <div class="pages navbar-fixed">
          <div data-page="index-4" class="page">
            <div class="navbar">
              <div class="navbar-inner">
                <div class="center">Reports</div>
              </div>
            </div>
            <div class="page-content">
            
              <div class="content-block">
                <p>Mauris commodo lacus at nisl lacinia, nec facilisis erat rhoncus. Sed eget pharetra nunc. Aenean vitae vehicula massa, sed sagittis ante. Quisque luctus nec velit dictum convallis. Nulla facilisi. Ut sed erat nisi. Donec non dolor massa. Mauris malesuada dolor velit, in suscipit leo consectetur vitae. Duis tempus ligula non eros pretium condimentum. Cras sed dolor odio.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Bottom Tabbar-->
      <div class="toolbar tabbar tabbar-labels">
        <div class="toolbar-inner"><a href="#view-1" class="tab-link active"> <i class="icon tabbar-demo-icon-1"></i><span class="tabbar-label">Dashboard</span></a><a href="#view-2" class="tab-link"><i class="icon tabbar-demo-icon-2"></i><span class="tabbar-label">Products</span></a><a href="#view-3" class="tab-link"> <i class="icon tabbar-demo-icon-3"><span class="badge bg-red">4</span></i><span class="tabbar-label">Users</span></a><a href="#view-4" class="tab-link"> <i class="icon tabbar-demo-icon-4"></i><span class="tabbar-label">Reports</span></a></div>
      </div>
    </div>
    </body>
</html>

{!! Theme::asset()->scripts() !!}