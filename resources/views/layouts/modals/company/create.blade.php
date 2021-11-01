<div class="modal" tabindex="-1" id="createCompany" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ route('company.store') }}" id="createFormCompany" method="POST" enctype="multipart/form-data"> 
        {{ csrf_field() }}
       
            <div class="modal-header">
                <h5 class="modal-title">Create Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="m-3">
                    <img id="createLogo" src="/img/placeholder.jpg" width='200' height='200' class='rounded mx-auto d-block'alt="Upload Image"/>
                </div>
                <div class="form-group">
                    <input type="file" class="form-control" id="create_logo" name="create_logo"  onchange="readImage(this);" accept="image/x-png, image/png, image/jpg, image/jpeg">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="create_name" name="create_name" placeholder="Company Name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="create_email" name="create_email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="create_website" name="create_website" placeholder="Website">
                </div>
            </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </form>
    </div>
  </div>
</div>