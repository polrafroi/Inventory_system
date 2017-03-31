{!! Theme::asset()->add('out.css','assets/css/productout.css') !!}

<input type="hidden" id="user_id" value="{{Auth::user()->id}}">
<div class="navbar">
    <div class="navbar-inner">
        <div class="center sliding">List View</div>
    </div>
</div>
<div class="pages navbar-through">
<div data-page="list-view" class="page">
<div class="page-content">
<div class="content-block">
    <p>Framework7 allows you to be flexible with list views (table views). You can make them as navigation menus, you can use there icons, inputs, and any elements inside of the list, and even make them nested:</p>
</div>

<div class="content-block-title">Links</div>
<div class="list-block">
    <ul>
        <li><a href="/productout" class="item-link item-content">
                <div class="item-media"><i class="icon icon-f7"></i></div>
                <div class="item-inner">
                    <div class="item-title">Ivan Petrov</div>
                    <div class="item-after">CEO</div>
                </div></a></li>
        <li><a href="/productin" class="item-link item-content">
                <div class="item-media"><i class="icon icon-f7"></i></div>
                <div class="item-inner">
                    <div class="item-title">John Doe</div>
                    <div class="item-after">Cleaner</div>
                </div></a></li>
        <li><a href="/123123" class="item-link item-content">
                <div class="item-media"><i class="icon icon-f7"></i></div>
                <div class="item-inner">
                    <div class="item-title">Jenna Smith</div>
                </div></a></li>
    </ul>
</div>

</div>
</div>
</div>
<script>
$(document).ready(function(){

  var BASEURL = $('#baseURL').val();
  loadCart();
  $('.speed-dial-buttons').on('click',function(){
    $('.tabbar').hide();

  })

    $('body').delegate('.back','click',function(){
    $('.tabbar').show();
  })

  $('body').delegate('#product','click',function(){
    $('#qty').val('')
    $('#product_id').val($(this).data('productid'))
    $('#brand').val($(this).data('brand'))
    $('#category').val($(this).data('category'))
    $('#code').val($(this).data('code'))
    $('#description').val($(this).data('description'))
    $('#unit').val($(this).data('unit'))
    $('#quantity').val($(this).data('quantity'))
    $('#unit_price').val($(this).data('unitprice'))


  })

  $('body').delegate('#add_cart','click',function(){

    $.ajax({
        url : BASEURL + '/addcart',
        type: 'POST',
        data: $("#list_product").serializeArray(),
        success:function(data){
            $('.price-name').text('P' + data);
            loadCart();
        }
    });

  })


})

function loadCart(){
  var BASEURL = $('#baseURL').val();
  $.ajax({
      url : BASEURL + '/loadcart',
      type: 'POST',
      data: {
              '_token': $('meta[name="csrf_token"]').attr('content')
          },
      success:function(data){
          $('#cart_list').html(data)
      }
  });
}


</script>
