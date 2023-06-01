$(document).ready(function () {

    $(document).on('click', '.delete_product_btn', function(e){
        e.preventDefault();

        var id = $(this).val();


        swal({
            title: "Do you want to delete this file?",
            text: "You many not recover this upon deletion!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'product_id':id,
                    'delete_product_btn':true
                    },
                success: function(response){
                    if(response == 200)
                    {
                        swal("Success!", "Product successfully deleted!", "success");
                        $("#products_table").load(location.href + " #products_table");
                    }
                    else if(response == 200)
                    {
                        swal("ERROR!", "Something went wrong!", "error");
                    }
                }
              });
            }
          });

    });
    

    //Dialog pop-up when deleting categories
    $(document).on('click', '.delete_category_btn', function(e){ 
        e.preventDefault();

        var id = $(this).val();

        swal({
            title: "Do you want to delete this file?",
            text: "You many not recover this upon deletion!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'category_id':id,
                    'delete_category_btn':true
                    },
                success: function(response){
                    if(response == 200)
                    {
                        swal("Success!", "Category successfully deleted!", "success");
                        $("#category_table").load(location.href + " #category_table");
                    }
                    else if(response == 200)
                    {
                        swal("ERROR!", "Something went wrong!", "error");
                    }
                }
              });
            }
          });

    });

});


