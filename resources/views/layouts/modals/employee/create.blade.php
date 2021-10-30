<div class="modal" tabindex="-1" id="createEmployee" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{ route('employee.store') }}" id="createFormEmployee" method="POST" enctype="multipart/form-data"> 
        {{ csrf_field() }}
       
            <div class="modal-header">
                <h5 class="modal-title">Create Employee</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <select id="company_name" name="company_name" class="form-control">
                        <option value="" disabled selected>Company</option>
                        @foreach($companies as $company)
                                <option value="{{ $company->id }}">{{ $company->name}}</option>
                        @endforeach  
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="create_firstname" name="create_firstname" placeholder="First name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="create_lastname" name="create_lastname" placeholder="Last name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="create_email" name="create_email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" id="create_phone" name="create_phone" placeholder="Phone">
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