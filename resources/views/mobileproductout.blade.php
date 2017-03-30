{!! Theme::asset()->add('out.css','assets/css/productout.css') !!}
<style>
.toolbar.messagebar.toolbar-hidden {
    bottom: 44px;
}
</style>
<div class="navbar">
  <div class="navbar-inner">
    <div class="left sliding"><a href="index.html" class="back link"><i class="icon icon-back"></i><span>Back</span></a></div>
    <div class="center sliding">Swipeable Tabs</div>
    <div class="subnavbar sliding">
      <div class="buttons-row"><a href="#tab1" class="button active tab-link">Tab 1</a><a href="#tab2" class="button tab-link">Tab 2</a></div>
    </div>
  </div>
</div>
<div class="pages navbar-through">

  <div data-page="tabs-swipeable" class="page with-subnavbar">
    <div class="tabs-swipeable-wrap">
      <div class="tabs">
        <div id="tab1" class="page-content tab active">
          <div class="content-block">
              <div data-page="home" class="page">
                  <!-- Search Bar -->
                  <form data-search-list=".list-block-search" data-search-in=".item-title" class="searchbar searchbar-init">
                      <div class="searchbar-input">
                          <input type="search" placeholder="Search"><a href="#" class="searchbar-clear"></a>
                      </div><a href="#" class="searchbar-cancel">Cancel</a>
                  </form>

                  <!-- Search Bar overlay -->
                  <div class="searchbar-overlay"></div>

                  <div class="page-content">
                      <!-- This block will be displayed if nothing found -->
                      <div class="content-block searchbar-not-found">
                          <div class="content-block-inner">Nothing found</div>
                      </div>

                      <!-- This block will be displayed if anything found, and this list block is used a searbar target -->
                      <div class="list-block list-block-search searchbar-found media-list">
                          <ul>
                              @foreach ($products as $product)
                              <li>
                                  <a href="#" data-popup=".popup-about" data-productid="{{$product->id}}" data-brand="{{$product->brand}}" data-category="{{$product->category}}" data-code="{{$product->code}}" data-description="{{$product->description}}" data-unit="{{$product->unit}}" data-quantity="{{$product->qty}}" data-unitprice="{{$product->unit_price}}" class="item-link item-content open-popup" id="product">
                                      <div class="item-media"><img src="http://lorempixel.com/160/160/people/1" width="80"/></div>
                                      <div class="item-inner">
                                          <div class="item-title-row">
                                              <div class="item-title">{{$product->description}} Lorem ipsum</div>
                                              <div class="item-after">P{{$product->unit_price}}</div>
                                          </div>
                                          <div class="item-subtitle">{{$product->brand}}</div>
                                          <div class="item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sagittis tellus ut turpis condimentum, ut dignissim lacus tincidunt. Cras dolor metus, ultrices condimentum sodales sit amet, pharetra sodales eros. Phasellus vel felis tellus. Mauris rutrum ligula nec dapibus feugiat. In vel dui laoreet, commodo augue id, pulvinar lacus.</div>
                                      </div>
                                  </a>
                              </li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <div id="tab2" class="page-content tab">
          <div class="content-block">
            <div class="content-block" style="padding: 0 15px !important;">
              <div class="ks-grid">
                <div class="row">
                  <div class="col-100">
                    <div class="list-block" style="margin: 5px 10px !important;">
                      <ul>
                        <li>
                          <a href="#" class="item-link smart-select">
                            <select name="fruits">
                              <option value="apple" selected="selected">Apple</option>
                              <option value="pineapple">Pineapple</option>
                              <option value="pear">Pear</option>
                            </select>
                            <div class="item-content">
                              <div class="item-inner">
                                <div class="item-title">Location</div>
                              </div>
                            </div>
                          </a>
                          </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-100 total-name">Total</div>
                </div>
                <div class="row">
                  <div class="col-100 price-name"></div>
                </div>
                <div class="row">
                  <div class="col-100">
                    <div class="list-block inset" style="margin: 11px 10px !important;">
                      <ul>
                        <li><a href="#" class="list-button item-link color-red">Lorem</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="content-block-title">Cart</div>
            <div class="list-block media-list">
              <ul>
                @foreach ($temp as $product)
                <li>
                    <a href="#" data-popup=".popup-about" data-productid="{{$product->id}}" data-brand="{{$product->brand}}" data-category="{{$product->category}}" data-code="{{$product->code}}" data-description="{{$product->description}}" data-unit="{{$product->unit}}" data-quantity="{{$product->qty}}" data-unitprice="{{$product->unit_price}}" class="item-link item-content open-popup" id="product">
                        <div class="item-media"><img src="http://lorempixel.com/160/160/people/1" width="80"/></div>
                        <div class="item-inner">
                            <div class="item-title-row">
                                <div class="item-title">{{$product->description}} Lorem ipsum</div>
                                <div class="item-after">P{{$product->unit_price}}</div>
                            </div>
                            <div class="item-subtitle">{{$product->brand}}</div>
                            <div class="item-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla sagittis tellus ut turpis condimentum, ut dignissim lacus tincidunt. Cras dolor metus, ultrices condimentum sodales sit amet, pharetra sodales eros. Phasellus vel felis tellus. Mauris rutrum ligula nec dapibus feugiat. In vel dui laoreet, commodo augue id, pulvinar lacus.</div>
                        </div>
                    </a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
