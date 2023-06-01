
//For adding and subtracting qty
$(document).ready(function () {

    //INCREMENT BUTTON 
    $(document).on('click','.increment-btn', function(e) {
        e.preventDefault(); 
        $.ajaxSetup ({
            cache: false
        });
        var qty = $(this).closest('.product_data').find('.input-qty').val(); //product data = parent class
        var value = parseInt(qty,10); //Convert to integer
        value = isNaN(value) ? 0 : value; //Nan = Not a Number
        if (value < 10)
        {
            value++;
            $('.input-qty').val(value);
            $(this).closest('.product_data').find('.input-qty').val(value); 
        }
    });

    //DECREMENT BUTTON
    $(document).on('click','.decrement-btn', function(e) {
        e.preventDefault();
        $.ajaxSetup ({
            cache: false
        });
        var qty = $(this).closest('.product_data').find('.input-qty').val(); //product data = parent class
        var value = parseInt(qty,10); //Convert to integer
        value = isNaN(value) ? 0 : value; //Nan = Not a Number
        if (value > 1)
        {
            value--;
            $('.input-qty').val(value);
            $(this).closest('.product_data').find('.input-qty').val(value); 
        }
    });

    //ADD TO CART BUTTON
    $(document).on('click','.addToCartBtn', function(e) {
        e.preventDefault();
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).val();
        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "add"
            },
            success: function(response) {

                if(response == 201)
                {
                    alertify.success("Product successfully added to cart!");
                }
                else if(response == "existing")
                {
                    alertify.success("Product already in cart!");
                }
                else if(response == 401)
                {
                    alertify.success("Please log in to continue.");
                }
                else if(response == 500)
                {
                    alertify.success("Something went wrong!");
                }
            } 
        });
    });


   //UPDATE QTY BUTTON
    $(document).on('click','.updateQty', function() {
        var qty = $(this).closest('.product_data').find('.input-qty').val();
        var prod_id = $(this).closest('.product_data').find('.prodId').val();

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "prod_id": prod_id,
                "prod_qty": qty,
                "scope": "update"
            },
            success: function (response){
              //alert(response);
            }
        });
    });
    
    //REMOVE PRODUCTS FROM CART
    $(document).on('click','.deleteItem', function()
    {
        var cart_id = $(this).val();
        //alert(cart_id);

        $.ajax({
            method: "POST",
            url: "functions/handlecart.php",
            data: {
                "cart_id": cart_id,
                "scope": "delete"
            },
            success: function (response){
                if(response == 200)
                {
                    alertify.success("Product removed from cart");
                    $('#mycart').load(location.href + " #mycart");
                }
                else
                {
                    alertify.success(response);
                }
            }
        });

    }); 

});
