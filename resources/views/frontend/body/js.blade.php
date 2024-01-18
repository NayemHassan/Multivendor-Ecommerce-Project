    <script src="{{asset('backend')}}/assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="{{asset('backend')}}/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{asset('backend')}}/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
    <script src="{{asset('backend')}}/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{asset('backend')}}/assets/js/plugins/slick.js"></script>
    <script src="{{asset('backend')}}/assets/js/plugins/jquery.syotimer.min.js"></script>
    <script src="{{asset('backend')}}/assets/js/plugins/waypoints.js"></script>
    <script src="{{asset('backend')}}/assets/js/plugins/wow.js"></script>
    <script src="{{asset('backend')}}/assets/js/plugins/perfect-scrollbar.js"></script>
    <script src="{{asset('backend')}}/assets/js/plugins/magnific-popup.js"></script>
    <script src="{{asset('backend')}}/assets/js/plugins/select2.min.js"></script>
    <script src="{{asset('backend')}}/assets/js/plugins/counterup.js"></script>
    <script src="{{asset('backend')}}/assets/js/plugins/jquery.countdown.min.js"></script>
    <script src="{{asset('backend')}}/assets/js/plugins/images-loaded.js"></script>
    <script src="{{asset('backend')}}/assets/js/plugins/isotope.js"></script>
    <script src="{{asset('backend')}}/assets/js/plugins/scrollup.js"></script>
    <script src="{{asset('backend')}}/assets/js/plugins/jquery.vticker-min.js"></script>
    <script src="{{asset('backend')}}/assets/js/plugins/jquery.theia.sticky.js"></script>
    <script src="{{asset('backend')}}/assets/js/plugins/jquery.elevatezoom.js"></script>
    <!-- Template  JS -->
    <script src="{{asset('backend')}}/assets/js/main.js?v=5.3"></script>
    <script src="{{asset('backend')}}/assets/js/shop.js?v=5.3"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <script>
            @if(Session::has('message'))
            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
                  toastr.success("{{ session('message') }}");
            @endif

            @if(Session::has('error'))
            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
                  toastr.error("{{ session('error') }}");
            @endif

            @if(Session::has('info'))
            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
                  toastr.info("{{ session('info') }}");
            @endif

            @if(Session::has('warning'))
            toastr.options =
            {
              "closeButton" : true,
              "progressBar" : true
            }
                  toastr.warning("{{ session('warning') }}");
            @endif
          </script>
          <script type = "text/javascript">

$(document).ready(function(){
$('#image').change(function(e){
var reader = new FileReader();
reader.onload = function(e){
    $('#showImage').attr('src',e.target.result);
}
reader.readAsDataURL(e.target.files['0']);
});
});
</script>

<Script type="text/javascript">
$.ajaxSetup({
  headers:{
    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')

  }
})
 //Start Product View Model
function productView(id){
  $.ajax({
     type:'GET',
     url:'/product/view/modal/'+id,
     dataType:'json',
    success:function(data){
     // console.log(data)
     $('#pname').text(data.product.product_name);
     $('#pcode').text(data.product.product_code);
     $('#pbrand').text(data.product.brand.brand_name);
     $('#pcategory').text(data.product.category.categories_name);
     $('#pvendor_id').text(data.product.vendor_id);
     $('#pimage').attr('src','/frontend_upload/product/thumbnail/'+data.product.product_thumbnail);
    // $('#sellprice').text(data.product.selling_price);
     $('#product_id').val(id);
     $('#qty').val(1);

    //Product price
    if(data.product.discount_price == null){
      $('#sellprice').text('');
      $('#oldprice').text('');
      $('#sellprice').text(data.product.selling_price);
    }else{
      $('#sellprice').text(data.product.discount_price);
      $('#oldprice').text(data.product.selling_price);

    }//end else
    //Stoct Part
    if(data.product.product_qty > 0){
     $('#available').text('');
     $('#stockout').text('');
     $('#available').text('Available');

    }//End if
    else{
      $('#available').text('');
      $('#stockout').text('');
      $('#stockout').text('Stockout');
    }//End Else

     //Size
     $('select[name="size"]').empty();
      $.each(data.size,function(key,value){
        $('select[name="size"]').append('<option value="'+value+'">'+value+' </option>' );
        if(data.size == ''){
          $('#sizeArea').hide();
        }
        else{
          $('#sizeArea').show();
        }
      })
      //Color

      $('select[name="color"]').empty();
      $.each(data.color,function(key,value){
        $('select[name="color"]').append('<option value="'+value+'"> '+value+' </option>' )
        if(data.color == ''){
          $('#colorArea').hide();
        }
        else{
          $('#colorArea').show();
        }
      })//End Color
    }

  })
}
//Add to cart Ajax
 function addToCart(){
  $('#closeModal').click(); //For close Modal When Click Add to Cart
   var product_name = $('#pname').text();
   var id = $('#product_id').val();
   var color = $('#color option:selected').text();
   var size = $('#size option:selected' ).text();
   var vendor = $('#pvendor_id' ).text();
   var quantity = $('#qty').val();
   $.ajax({
    type :"POST",
    dateType : "json",
    data : {
      product_name:product_name, color:color,size:size,quantity:quantity,vendor:vendor
    },
    url:"/cart/data/store/"+id,
    success:function(data){
      miniCart()
   //   console.log(data)
      //Message Sweetalert
       const Toast = Swal.mixin({
        toast : true,
        position: "top-end",
        icon: "success",
        showConfirmButton: false,
        timer: 3000
       })
       if($.isEmptyObject(data.error)){
        Toast.fire({
          type:'success',
          title:data.success,
        });
       }else{
        Toast.fire({
          type:'error',
          title:data.error,
        });
       }
      //  //End MEssage
    }
  })
 }

  //Add to Cart Details Page
function addToCartDetails(){

     var product_name = $('#dpname').text();
     var id = $('#dproduct_id').val();
     var color = $('#dcolor option:selected').text();
     var size = $('#dsize option:selected').text();
     var vendor = $('#vproduct_id').val();
     var quantity = $('#dqty').val();
     $.ajax({
      type :"POST",
      dateType : "json",
      data : {
        product_name :product_name, color:color,size:size,quantity:quantity,vendor:vendor
      },
      url:"/dcart/data/store/"+id,
      success:function(data){
        miniCart()
     //   console.log(data)
        //Message Sweetalert
         const Toast = Swal.mixin({
          toast : true,
          position: "top-end",
          icon: "success",
          showConfirmButton: false,
          timer: 3000
         })
         if($.isEmptyObject(data.error)){
          Toast.fire({
            type:'success',
            title:data.success,
          })
         }else{
          Toast.fire({
            type:'error',
            title:data.error,
          })
         }
        //  //End MEssage
      }
    })
 }
</Script>




<script type="text/javascript">
function miniCart(){
  $.ajax({
  type:'GET',
  url:'/product/mini/cart',
  dataType:'json',
  success:function(response){
   // console.log(response)
   $('span[id="cartTotal"]').text(response.cartTotal);
   $('#cartqty').text(response.cartQty);
   var miniCart = "";
   $.each(response.carts,function(key,value){
    console.log(value);
    miniCart +=`
    <ul>
      <li>
          <div class="shopping-cart-img">
              <a href="shop-product-right.html"><img alt="Nest"  src="http://127.0.0.1:8000/frontend_upload/product/thumbnail/${value.options.image}" style="height:50px;width:50px" ></a>
          </div>
          <div class="shopping-cart-title">
              <h4><a href="shop-product-right.html">${value.name} </a></h4>
              <h4><span>${value.qty} × </span>${value.price} </h4>
          </div>
          <div class="shopping-cart-delete">
              <a type="submit" id="${value.rowId}" onClick="mitiCartRemove(this.id)"><i class="fi-rs-cross-small"></i></a>
          </div>
      </li>
  </ul>
  <hr>
  <br>
    `
   });
   $('#miniCart').html(miniCart);
  }
})
}
miniCart()
</script>
<script>
  //Remove Cart Ajax
function mitiCartRemove(rowId){
  $.ajax({
  type:'GET',
  url:'/cart/mini/remove/'+rowId,
  dataType:'json',
  success:function(data){
    miniCart()
    const Toast = Swal.mixin({
        toast : true,
        position: "top-end",
        icon: "success",
        showConfirmButton: false,
        timer: 3000
       })
       if($.isEmptyObject(data.error)){
        Toast.fire({
          type:'success',
          title:data.success,
        })
       }else{
        Toast.fire({
          type:'error',
          title:data.error,
        })
       }
      //  //End MEssage
  }
  });
}

</script>

<script type="text/javascript">
function addToWishList(product_id){
    $.ajax({
    type:'POST',
    url:"/add/to/wishlist/"+product_id,
    dataType:'json',
    success:function(data){
        wishlist();
        const Toast = Swal.mixin({
        toast : true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000
       })
       if($.isEmptyObject(data.error)){
        Toast.fire({
          type:'success',
          icon: "success",
          title:data.success,
        })
       }else{
        Toast.fire({
          type:'error',
          icon: "error",
          title:data.error,
        })
       }
      //  //End MEssage
    }
});
}// end add wishlist
//Data show Load wishlist ajax
function wishlist(){
    $.ajax({
        type:'GET',
        dataType:'json',
        url:"/wishlist-data-view/",
        success:function(response){
         $('#wishlistCount').text(response.wishlistQty)
            var rows = "";
            $.each(response.wishlist,function(key,value){
                rows += `
                <tr class="pt-30">
                            <td class=" pl-30">

                                <label class="form-check-label" for="exampleCheckbox1"></label>
                            </td>
                            <td class="image product-thumbnail pt-40"><img src="http://127.0.0.1:8000/frontend_upload/product/thumbnail/${value.product.product_thumbnail}" alt="#" /></td>
                            <td class="product-des product-name">
                                <h6><a class="product-name mb-10" href="shop-product-right.html">${value.product.product_name}</a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </td>

                            <td class="price" data-title="Price">
                                ${value.product.discount_price == null
                                    ?`<h3 class="text-brand">${value.product.selling_price}$</h3>`
                                    :`<h3 class="text-brand">${value.product.discount_price}$</h3>`
                                }
                            </td>
                            <td class="text-center detail-info" data-title="Stock">
                                ${value.product.product_qty>0

                                ?`<span class="stock-status in-stock mb-0"> In Stock </span>`
                                 :`<span class="stock-status out-stock mb-0"> Sold out </span>`
                                }
                            </td>

                            <td class="action text-center" data-title="Remove">
                                <a type="submit" id="${value.id}" onClick="wishlistRemove(this.id)" class="text-body"><i class="fi-rs-trash"></i></a>
                            </td>
                        </tr>
                `
            });
            $('#wishlist').html(rows);
        }



    })
}
//Wishlist Remove
function wishlistRemove(id){
 $.ajax({
    type:'GET',
    dataType:'json',
    url:"/wishlist-remove/"+id,
    success:function(data){
        wishlist()
        const Toast = Swal.mixin({
        toast : true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000
       })
       if($.isEmptyObject(data.error)){
        Toast.fire({
          type:'success',
          icon: "success",
          title:data.success,
        })
       }else{
        Toast.fire({
          type:'error',
          icon: "error",
          title:data.error,
        })
       }
    }
 })
}
wishlist();
//end  wishlist remove


</script>
<script type="text/javascript">
//Add to Compare Start

function addToCompare(product_id){
$.ajax({
    type:'POST',
    url:"/add-to-compare/"+product_id,
    dataType:'json',
    success:function(data){
        Compare()
        const Toast = Swal.mixin({
        toast : true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000
       })
       if($.isEmptyObject(data.error)){
        Toast.fire({
          type:'success',
          icon: "success",
          title:data.success,
        })
       }else{
        Toast.fire({
          type:'error',
          icon: "error",
          title:data.error,
        })
       }
    }
});
}
//Add to Compare End
//Compare Data Load Start
function Compare(){
    $.ajax({
        type:'GET',
        url:"/compare-data-view/",
        dataType:'json',
        success:function(response){
            $('#compareQTY').text(response.compareQty)
            var rows = "";
            $.each(response.compare,function(key,value){
                rows += `
           <tr>

                       <tr class="pr_image">
                            <td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>
                            <td class="row_img" ><img  style="height:250px;width:250px;"  src="http://127.0.0.1:8000/frontend_upload/product/thumbnail/${value.product.product_thumbnail}" /></td>

                        </tr>
                        <tr class="pr_title">
                            <td class="text-muted font-sm fw-600 font-heading">Name</td>
                            <td class="product_name">
                                <h6><a href="#" class="text-heading" id="cpname">${value.product.product_name}</a></h6>
                            </td>

                        </tr>
                        <tr class="pr_price">
                            <td class="text-muted font-sm fw-600 font-heading">Price</td>
                            <td class="product_price">
                                ${value.product.discount_price == null
                                    ?`<h3 class="text-brand">${value.product.selling_price}$</h3>`
                                    :`<h3 class="text-brand">${value.product.discount_price}$</h3>`
                                }
                            </td>

                        </tr>


                        </tr>
                        <tr class="description">
                            <td class="text-muted font-sm fw-600 font-heading">Description</td>
                            <td class="row_text font-xs">
                                <p class="font-sm text-muted" >${value.product.short_desc}</p>
                            </td>

                        </tr>
                        <tr class="pr_stock">
                            <td class="text-muted font-sm fw-600 font-heading">Stock status</td>
                            <td class="text-center detail-info" data-title="Stock">
                                ${value.product.product_qty>0

                                ?`<span class="stock-status in-stock mb-0"> In Stock </span>`
                                 :`<span class="stock-status out-stock mb-0"> Sold out </span>`
                                }
                            </td>

                        </tr>
                        <tr class="pr_weight">
                            <td class="text-muted font-sm fw-600 font-heading" >Size</td>
                            <td class="row_weight">
                                ${value.product.product_size ==null
                                ? `<span class="row_text font-xs">-  -  -  -  -</span>`
                                :`<span id="csize">${value.product.product_size}</span>`
                                }
                                </td>

                        </tr>
                        <tr class="pr_dimensions">
                            <td class="text-muted font-sm fw-600 font-heading">Color</td>
                            <td class="row_weight">
                                ${value.product.product_color ==null
                                ? `<span class="row_text font-xs">-  -  -  -  -</td>`
                                :`<span id="ccolor">${value.product.product_color}</span>`
                                }
                                </td>

                        </tr>
                        <tr class="pr_add_to_cart">
                            <td class="text-muted font-sm fw-600 font-heading">Buy now</td>

                            <td class="row_btn">

                                <a type="submit" id="${value.id}" class="btn btn-sm" onClick="AddToCartCompare(this.id)"><i class="fi-rs-shopping-bag mr-5" ></i>Add to cart</a>
                            </td>

                        </tr>
                        <tr class="pr_remove text-muted">
                            <td class="text-muted font-md fw-600"></td>

                            <td class="row_remove">
                                <a type="submit" id="${value.id}" onClick="compareDelete(this.id)" class="text-muted"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                            </td>
                        </tr>
                        </tr>
                       <hr>

                     `
            });
            $('#comparePage').html(rows);
        }
    })


}
function compareDelete(id){
    $.ajax({
        type:'GET',
        url:"/compare-remove/"+id,
        dataType:'json',
        success:function(data){
            Compare();
            const Toast = Swal.mixin({
        toast : true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000
       })
       if($.isEmptyObject(data.error)){
        Toast.fire({
          type:'success',
          icon: "success",
          title:data.success,
        })
       }else{
        Toast.fire({
          type:'error',
          icon: "error",
          title:data.error,
        })
       }
        }
    });
}
Compare();
//Compare Data Load End



//Start Cart Page
function Cart(){
    $.ajax({
        type:'GET',
        url:'/cart-page-data/',
        dataType:'json',
        success:function(response){
        
            var rows ="";
            $.each(response.carts,function(key,value){
                rows+=`
                <tr class="pt-30">
                            <td class=" pl-30">
                                <label class="form-check-label" for="exampleCheckbox1"></label>
                            </td>
                            <td class="image product-thumbnail pt-40"><img src="/frontend_upload/product/thumbnail/${value.options.image}" alt="#"></td>
                            <td class="product-des product-name">
                                <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">${value.name}</a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width:90%">
                                        </div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </td>

                            <td class="price" data-title="Price">
                                <h4 class="text-body">$${value.price}</h4>
                            </td>
                            <td class="  font-small ">
                                <hp class="mb-5">
                                    ${value.options.size == null
                                        ?`<span> ------ </span>`
                                        :`<span> ${value.options.size}</span>`

                                        }

                                    </p>
                            </td>
                            <td class="  font-small ">
                                <hp class="mb-5">
                                    ${value.options.color == null
                                        ?`<span> ------ </span>`
                                        :`<span> ${value.options.color}</span>`

                                        }

                                    </p>
                            </td>
                            <td class="text-center detail-info" data-title="Stock">
                                <div class="detail-extralink mr-15">
                                    <div class="detail-qty border radius">
                                        <a type="submit" id="${value.rowId}" onClick ="Decrement(this.id)" class="qty-down"> <i class="fi-rs-angle-small-down"></i></a>
                                        <input type="text" name="quantity" class="qty-val" value="${value.qty}" min="1">
                                        <a type="submit" class="qty-up" id="${value.rowId}" onClick ="Increment(this.id)"> <i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                                <h4 class="text-brand">$${value.subtotal}</h4>
                            </td>
                            <td class="action text-center" data-title="Remove"><a type="submit" id="${value.rowId}"  onClick="CartsingleRemove(this.id)"class="text-body"><i class="fi-rs-trash"></i></a></td>
                        </tr>
                `
                
            })
            $('#myCart').html(rows);
        }
    });
}
//End Cart Page
Cart();
function CartsingleRemove(rowId){
    $.ajax({
        type:'GET',
        url:"/cart-single-romove/"+rowId,
        dataType:'json',
        success:function(data){
          couponCalculation();
            Cart();
            miniCart();
           

        const Toast = Swal.mixin({
        toast : true,
        position: "top-end",
        type:'success',
        showConfirmButton: false,
        timer: 3000,
       });

       
       if($.isEmptyObject(data.error)){
        Toast.fire({
          
          icon: "success",
          title:data.success,
        });
       } else{
        Toast.fire({
          type:'error',
          title:data.error,
        });
       }
        }
    });
}//End

function Decrement(rowId){
  $.ajax({
    type:'GET',
    url:"/cart-decrement/"+rowId,
    dataType:'json',
    
    success:function(data){
      couponCalculation();
        Cart();
        miniCart();
       
    }
  });
}///
function Increment(rowId){
  $.ajax({
    type:'GET',
    url:"/cart-increment/"+rowId,
    dataType:'json',
    success:function(data){
      couponCalculation();
        Cart();
        miniCart();
       
    }
  });
}
</script>
<!-- Start Apply Coupon  -->
<script type="text/javascript">
function ApplyCoupon(){
  var coupon_name = $('#coupon_name').val();
  $.ajax({
    type:'POST',
    url:'/apply-coupon-ajax/',
    dataType:'json',
    data:{
      coupon_name:coupon_name
    },
    success:function(data){
     
      couponCalculation();
      if(data.validity == true){
        $('#couponField').hide();
      }
      const Toast = Swal.mixin({
        toast : true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000
       });
       if($.isEmptyObject(data.error)){
        Toast.fire({
          type:'success',
          icon: "success",
          title:data.success,
        });
       } else{
        Toast.fire({
          type:'error',
          icon: "error",
          title:data.error,
        });
       }//End Message
    }
  });
}

//Coupon Calculation
function couponCalculation(){
  $.ajax({
    type:'GET',
    url:"/coupon-calculation/",
    dataType:'json',
    success:function(data){
    
      if(data.total){
        $('#couponCalField').html(
          `<tr>
              <td class="cart_total_label">
                  <h6 class="text-muted">Subtotal</h6>
              </td>
              <td class="cart_total_amount">
                  <h4 class="text-brand text-end">$${data.total}</h4>
              </td>
          </tr>
         
        
          <tr>
              <td class="cart_total_label">
                  <h6 class="text-muted">Grand Total</h6>
              </td>
              <td class="cart_total_amount">
                  <h4 class="text-brand text-end">$${data.total}</h4>
              </td>
          </tr>`
        )
      }else{
        $('#couponCalField').html(
          `<tr>
              <td class="cart_total_label">
                  <h6 class="text-muted">Subtotal</h6>
              </td>
              <td class="cart_total_amount">
                  <h4 class="text-brand text-end">$${data.subtotal}</h4>
              </td>
          </tr>
          <tr>
              <td class="cart_total_label">
                  <h6 class="text-muted">Coupon</h6>
              </td>
              <td class="cart_total_amount">
                  <h6 class="text-brand text-end">${data.coupon_name} <a type="submit" onClick="removeCoupon()" > <i class="fi-rs-trash"></i> </a></h6>
              </td>
          </tr>
          <tr>
              <td class="cart_total_label">
                  <h6 class="text-muted">Discount Amount</h6>
              </td>
              <td class="cart_total_amount">
                  <h4 class="text-brand text-end">$${data.discount_amount}</h4>
              </td>
          </tr>
          
          <tr>
              <td class="cart_total_label">
                  <h6 class="text-muted">Grand Total</h6>
              </td>
              <td class="cart_total_amount">
                  <h4 class="text-brand text-end">$${data.total_amount}</h4>
              </td>
          </tr>`
        )
      }
    }
  });
}
couponCalculation();

</script>
<script>
  function removeCoupon(){
  $.ajax({
    type:'GET',
    url:"/remove-coupon/",
    dataType:'json',
    success:function(data){
      couponCalculation();
      $('#couponField').show();
      const Toast = Swal.mixin({
        toast : true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000
       });
       if($.isEmptyObject(data.error)){
        Toast.fire({
          type:'success',
          icon: "success",
          title:data.success,
        });
       } else{
        Toast.fire({
          type:'error',
          icon: "error",
          title:data.error,
        });
       }//End Message
    }
  });
}
</script>
<!-- End Apply Coupon -->
