<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addModalLabel">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form role="form" id="new_products_form">
              {{ csrf_field() }}
              <input type="hidden" name="id" id="id">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                  <label for="email">Category</label>
                  <input type="email" class="form-control" id="category" name="category" placeholder="Enter Category" required>
                </div>
              
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="submit_button" class="btn btn-primary">Submit</button>
          <button type="button" id="update_button" class="btn btn-primary">Update</button>
        </form>
        </div>
      </div>
    </div>
  </div>
