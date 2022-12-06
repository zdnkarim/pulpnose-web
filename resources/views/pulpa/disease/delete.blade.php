<div class="modal-header">
    <h5 class="modal-title" id="defaultModalLabel">Delete {{ $data->name }} Data</h5>
    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    Are you sure to delete {{ $data->name }}?
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    <a href="/dashboard/disease/{{ $data->id }}/delete">
        <input class="btn btn-danger" type="submit" value="Delete" name="delete">
    </a>
</div>
