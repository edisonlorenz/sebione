<div class="modal" tabindex="-1" id="editCompany" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="editFormCompany" method="post" enctype="multipart/form-data"> 
        {{ csrf_field() }}
        {{ method_field('PUT') }} 
            <div class="modal-header">
                <h5 class="modal-title">Update Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control" id="id" name="id" hidden>
                <div class="m-3">
                    <img id="editLogo" src="#" width='200' height='200' class='rounded mx-auto d-block'/>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" id="logo" name="logo"  onchange="readImage(this);" accept="image/x-png, image/png, image/jpg, image/jpeg">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Company Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="website" name="website" placeholder="Website">
                </div>
            </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>