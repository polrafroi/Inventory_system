
<div class="navbar">
    <div class="navbar-inner">
        <div class="center sliding">Search Bar</div>
    </div>
</div>
<div class="pages navbar-through">
<div data-page="searchbar" class="page">
<form data-search-list=".search-here" data-search-in=".item-title" class="searchbar searchbar-init">
    <div class="searchbar-input">
        <input type="search" placeholder="Search"/><a href="#" class="searchbar-clear"></a>
    </div><a href="#" class="searchbar-cancel">Cancel</a>
</form>
<div class="searchbar-overlay"></div>
<div class="page-content">
<div class="list-block searchbar-not-found">
    <ul>
        <li class="item-content">
            <div class="item-inner">
                <div class="item-title">Nothing found</div>
            </div>
        </li>
    </ul>
</div>
<div class="list-block search-here searchbar-found media-list">
    <ul>
        @foreach ($products as $product)
        <li>
            <a href="#" class="item-link item-content">
                <div class="item-media"><img src="http://lorempixel.com/160/160/people/1" width="80"/></div>
                <div class="item-inner">
                    <div class="item-title-row">
                        <div class="item-title">{{$product->description}}</div>
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