<div class="modal" tabindex="-1" id="deleteCompany" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form id="deleteFormCompany" method="post">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <div class="modal-header">
            <h5 class="modal-title">Delete Company</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this data?</p>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Ok</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>
    </div>
  </div>
</div>