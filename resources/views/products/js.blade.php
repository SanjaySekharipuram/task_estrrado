<script>
$( document ).ready(function() {
   loadTable();
});
$("#add_button").click(function(){
    $("#addModalLabel").text('Add Product');
    $("#submit_button").show();
    $("#update_button").hide();
    $('#new_products_form').trigger("reset");
    $("#addModal").modal('show');
});
$("#submit_button").click(function(){
    addProduct();
    
});
$("#update_button").click(function(){
    updateProduct();
   
});

function loadTable(){
    $.ajax({
        type: "GET",
        url: "{{route('get.products')}}",
        success: function(data) {
           if(data.success){
            $("#productsTable").find('tbody').html('');
            data.data.forEach((product) => {
                $("#productsTable").find('tbody')
                    .append($('<tr>')
                        .append($('<td>')
                            .html(product.id)
                        )
                        .append($('<td>')
                            .html(product.name)
                        )
                        .append($('<td>')
                            .html(product.category)
                        )
                        .append($('<td>')
                            .html(` <button type="button" class="btn btn-success btn-sm" onclick="editProduct(`+product.id+`)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                          </svg></button>

                          
                          <button type="button" class="btn btn-danger btn-sm" onclick="deleteProduct(`+product.id+`)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                      </svg></button>
`
                      )
                        )
                    );
            });
           }
        },
    }); 
}

function addProduct(){
    let form_data = new FormData($('#new_products_form')[0]);
    $.ajax({
        type: "POST",
        url: "{{route('add.product')}}",
        data: form_data,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
            if(data.success){
                loadTable();
           alert('added successfully');
           $("#addModal").modal('hide');
            }
            else{
                alert(data.msg);
            }
       
        },
        error: function(data) {
          alert('something went wrong');
        }
        });
}
function updateProduct(){
    let form_data = new FormData($('#new_products_form')[0]);
    $.ajax({
        type: "POST",
        url: "{{route('update.product')}}",
        data: form_data,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data) {
            if(data.success){
                loadTable();
           alert('updated successfully');
           $("#addModal").modal('hide');
            }
            else{
                alert(data.msg);
            }
       
        },
        error: function(data) {
          alert('something went wrong');
        }
        });
}

function editProduct(id){
    $('#id').val(id);
    $('#new_products_form').trigger("reset");
    $("#addModal").modal('show');
    $("#addModalLabel").text('Edit Product');
    $("#submit_button").hide();
    $("#update_button").show();
    $.ajax({
        type: "GET",
        url: "{{route('get.single_product')}}",
        data: { id : id},
        dataType: "json",
        success: function(data) {
            $('#name').val(data.data['name']);
            $('#category').val(data.data['category']);
          
        },
        error: function(data) {
            alert('something went wrong');
        }
        });
    }

    function deleteProduct(id){
        $.ajax({
        type: "POST",
        url: "{{route('delete.product')}}",
        data: { 'id' : id,
        '_token': '{{ csrf_token() }}'},
        dataType: "json",
        success: function(data) {
            alert('Deleted Successfully');
            loadTable();
        },
        error: function(data) {
            alert('something went wrong');
        }
        });
    }
</script>