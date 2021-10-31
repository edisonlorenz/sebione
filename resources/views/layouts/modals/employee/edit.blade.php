<div class="modal" tabindex="-1" id="editEmployee" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="editFormEmployee" method="POST" enctype="multipart/form-data"> 
        {{ csrf_field() }}
        {{ method_field('PUT') }} 
            <div class="modal-header">
                <h5 class="modal-title">Update Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <select id="edit_companyId" name="create_companyname" class="form-control">
                        <option value="" disabled selected>Company</option>
                        @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name}}</option>
                        @endforeach  
                    </select>
                </div>
                <input type="text" class="form-control" id="edit_employeeId" name="edit_employeeId" hidden>
                <div class="form-group">
                    <input type="text" class="form-control" id="edit_firstname" name="edit_firstname" placeholder="First name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="edit_lastname" name="edit_lastname" placeholder="Last name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="edit_email" name="edit_email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="edit_phone" name="edit_phone" placeholder="Phone">
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