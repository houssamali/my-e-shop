$(document).ready(function(){
   // loadcart();
       $('.addToCart').click(function(e){
       e.preventDefault();
       
       var product_id=$(this).closest('.cart-data').find('.prod_id').val();
       var product_qty=$(this).closest('.cart-data').find('.prod_qty').val();
       var over_price=$(this).closest('.cart-data').find('.over_price').val();
    
       $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
       $.ajax({
        method:"POST",
        url:"/add-to-cart",
        data:{
            'product_id':product_id,
            'product_qty':product_qty,
            'over_price':over_price,

        },
        success: function (response)
        {
          alert(response.status);    
        }
       });
        });
    
    
        $('.AddToWishlis').click(function(e){
            e.preventDefault();
            
            var prod_id=$(this).closest('.cart-data').find('.prod_id').val();
            var qty=$(this).closest('.cart-data').find('.prod_qty').val();
           
         
            $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
         
            $.ajax({
             method:"POST",
             url:"/add-to-wishlist",
             data:{
                 'prod_id':prod_id,
                 'prod_qty':qty,
                
             },
             success: function (response)
             {
               alert(response.status);    
             }
            });
             });
    
        $('.increament-btn').click(function(e){
            e.preventDefault();
            
            var inc_value=$(this).closest('.cart-data').find('.prod_qty').val();
    
            var value=parseInt(inc_value,10);
            value=isNaN(value)?0:value;
            if(value < 10){
                value++;
                $(this).closest('.cart-data').find('.prod_qty').val(value);
            }
        });
    
        $('.decrement-btn').click(function(e){
            e.preventDefault();
            var dec_value=$(this).closest('.cart-data').find('.prod_qty').val();
            var value=parseInt(dec_value,10);
            value=isNaN(value)?0:value;
            if(value > 1){
                value--;
                var inc_value=$(this).closest('.cart-data').find('.prod_qty').val(value);
            }
        });
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    
        $('.delete-cart-item').click(function(e){
            e.preventDefault();
    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            var prod_id=$(this).closest('.product_data').find('.prod_id').val();
            $.ajax({
               method:"POST",
               url:"delete-cart-item",
               data:{
                 'prod_id':prod_id,
               },
               success:function (response){
                window.location.reload();
                 swal('',response.status,'success'); 
               }
            });
    
    
    
        }); 
    
        $('.remove-wishlist-item').click(function(e){
            e.preventDefault();
    
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    
            var prod_id=$(this).closest('.product_data').find('.prod_id').val();
            $.ajax({
               method:"POST",
               url:"remove-wishlist-item",
               data:{
                 'prod_id':prod_id,
               },
               success:function (response){
                window.location.reload();
                 swal('',response.status,'success'); 
               }
            });
    
    
    
        }); 
    
    
    
        $('.changeQuantity').click(function(e){
            e.preventDefault();
    
        var prod_id=$(this).closest('.cart-data').find('.prod_id').val();
        var qty=$(this).closest('.cart-data').find('.prod_qty').val();
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
    
        $.ajax({
            method:"POST",
            url:"update-cart",
            data:{
              'prod_id':prod_id,
              'prod_qty':qty,
            },
            success:function (response){
            window.location.reload();
            }
         });
        });


        $('.changeQuantity').click(function(e){
            e.preventDefault();
    
        var prod_id=$(this).closest('.cart-data').find('.prod_id').val();
        var qty=$(this).closest('.cart-data').find('.prod_qty').val();
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
    
        $.ajax({
            method:"POST",
            url:"update-wishlist",
            data:{
              'prod_id':prod_id,
              'prod_qty':qty,
            },
            success:function (response){
            window.location.reload();
            }
         });
        });


    
        function loadcart()
        {
            $.ajax({
                method:"GET",
                url:"/load-cart-data",
               
                success:function (response){
               
               $('.cart-count').html('');
               $('.cart-count').html(response.count);
    
                console.log(response.count);
                }
             }); 
        }
        
    
        function loadwishlist()
        {
            $.ajax({
                method:"GET",
                url:"/load-wishlist-count",
               
                success:function (response){
               
               $('.wishlist-count').html('');
               $('.wishlist-count').html(response.count);
    
                console.log(response.count);
                }
             }); 
        }
    });