<script>
$( document ).ready(function() {
   loadTable();
});
$("#add_button").click(function(){
    $("#addModalLabel").text('Add Vendor');
    $("#submit_button").show();
    $("#update_button").hide();
    $('#new_vendor_form').trigger("reset");
    $("#addModal").modal('show');
});
$("#submit_button").click(function(){
    addVendor();
    
});
$("#update_button").click(function(){
     updateVendor();
   
});


function loadTable(){
    $.ajax({
        type: "GET",
        url: "{{route('admin.get.vendors')}}",
        success: function(data) {
           if(data.success){
            $("#vendorsTable").find('tbody').html('');
            data.data.forEach((vendor) => {
                $("#vendorsTable").find('tbody')
                    .append($('<tr>')
                        .append($('<td>')
                            .html(vendor.id)
                        )
                        .append($('<td>')
                            .html(vendor.name)
                        )
                        .append($('<td>')
                            .html(vendor.email)
                        )
                        .append($('<td>')
                            .html(` <button type="button" class="btn btn-success btn-sm" onclick="editVendor(`+vendor.id+`)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
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

function addVendor(){
    let form_data = new FormData($('#new_vendor_form')[0]);
    $.ajax({
        type: "POST",
        url: "{{route('admin.add.vendor')}}",
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
function updateVendor(){
    let form_data = new FormData($('#new_vendor_form')[0]);
    $.ajax({
        type: "POST",
        url: "{{route('admin.update_vendor')}}",
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

function editVendor(id){
    $('#id').val(id);
    $('#new_vendor_form').trigger("reset");
    $("#addModal").modal('show');
    $("#addModalLabel").text('Edit Vendor');
    $("#submit_button").hide();
    $("#update_button").show();
    $.ajax({
        type: "GET",
        url: "{{route('admin.get.single_vendor')}}",
        data: { 'id' : id,
        '_token': '{{ csrf_token() }}'},
        dataType: "json",
        success: function(data) {
            $('#name').val(data.data['name']);
            $('#email').val(data.data['email']);
          
        },
        error: function(data) {
            alert('something went wrong');
        }
        });
    }

</script>