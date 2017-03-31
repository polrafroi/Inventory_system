
<!DOCTYPE html>
<html>
    <head>
        <title>{!! Theme::get('title') !!}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
        <meta name="keywords" content="{!! Theme::get('keywords') !!}">
        <meta name="description" content="{!! Theme::get('description') !!}">
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <input type="hidden" id="baseURL" value="{{ url('') }}" >
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

     <div class="popup popup-about">
       <div class="view navbar-fixed">
         <div class="pages">
           <div class="page">
             <div class="navbar">
               <div class="navbar-inner">
                 <div class="left"><a href="#" class="link close-popup">Close</a></div>
                 <div class="center">Popup Title</div>
                 <div class="right"><a href="#" class="link close-popup" id="add_cart">Add</a></div>
               </div>
             </div>
             <div class="page-content">
               <div class="content-block">

                 <form class="list-block" id ="list_product">
                     {{ csrf_field() }}
                     <div class="list-block inset" style="margin:0 !important;border-radius: 0 !important;">
                       <ul>
                         <li>
                           <div class="item-content">
                             <div class="item-inner">
                               <div class="item-title label">Name</div>
                               <div class="item-input">
                                 <input type="text" placeholder="Your name" id="qty" name="qty"/>
                               </div>
                             </div>
                           </div>
                         </li>
                       </ul>
                     </div>
                   <ul>
                     <li>
                       <div class="item-content">
                         <div class="item-inner">
                           <div class="item-title label">Name</div>
                           <div class="item-input">
                             <input type="text" placeholder="Your name" id="product_id" name="product_id"/>
                           </div>
                         </div>
                       </div>
                     </li>
                     <li>
                       <div class="item-content">
                         <div class="item-inner">
                           <div class="item-title label">Name</div>
                           <div class="item-input">
                             <input type="text" placeholder="Your name" id="brand" name="brand"/>
                           </div>
                         </div>
                       </div>
                     </li>
                     <li>
                       <div class="item-content">
                         <div class="item-inner">
                           <div class="item-title label">Name</div>
                           <div class="item-input">
                             <input type="text" placeholder="Your name" id="category" name="category"/>
                           </div>
                         </div>
                       </div>
                     </li>
                     <li>
                       <div class="item-content">
                         <div class="item-inner">
                           <div class="item-title label">Name</div>
                           <div class="item-input">
                             <input type="text" placeholder="Your name" id="code" name="code"/>
                           </div>
                         </div>
                       </div>
                     </li>
                     <li>
                       <div class="item-content">
                         <div class="item-inner">
                           <div class="item-title label">Name</div>
                           <div class="item-input">
                             <input type="text" placeholder="Your name" id="description" name="description"/>
                           </div>
                         </div>
                       </div>
                     </li>
                     <li>
                       <div class="item-content">
                         <div class="item-inner">
                           <div class="item-title label">Name</div>
                           <div class="item-input">
                             <input type="text" placeholder="Your name" id="quantity" name="quantity"/>
                           </div>
                         </div>
                       </div>
                     </li>
                     <li>
                       <div class="item-content">
                         <div class="item-inner">
                           <div class="item-title label">Gender</div>
                           <div class="item-input">
                             <select id="unit">
                               <option>Male</option>
                               <option>Female</option>
                             </select>
                           </div>
                         </div>
                       </div>
                     </li>
                     <li>
                       <div class="item-content">
                         <div class="item-inner">
                           <div class="item-title label">Name</div>
                           <div class="item-input">
                             <input type="text" placeholder="Your name" id="unit_price" name="unit_price"/>
                           </div>
                         </div>
                       </div>
                     </li>
                   </ul>
                 </form>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>


    </body>

</html>


{!! Theme::asset()->scripts() !!}
