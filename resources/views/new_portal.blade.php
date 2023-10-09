<div class="modal fade" id="new_portal" tabindex="-1" role="dialog" aria-labelledby="new_portaldata" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="new_portaldata">New Portal</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form  method='POST' action='new-portal' onsubmit='show()' enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
            <div class="row">
              <div class='col-md-12 form-group'>
                 Image
                <input type="file" name='image' class="form-control"  accept="image/png, image/gif, image/jpeg" required>
              </div>
              <div class='col-md-12 form-group'>
                 Title
                <input type="text" name='title' class="form-control" required>
              </div>
              <div class='col-md-12 form-group'>
                 Inside PMI Tower Link
                <input type="text" name='link' class="form-control"  required>
              </div>
              <div class='col-md-12 form-group'>
                 Outside PMI Tower Link
                <input type="text" name='link_outside' class="form-control"  required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form> 
      </div>
    </div>
</div>
