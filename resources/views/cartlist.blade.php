
  <ul id="ul_prod_cart">
    @foreach ($temp as $product)
    <li data-price="{{$product->unit_price}}">
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
