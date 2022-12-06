<form method="post" action="/dashboard/symptom/{{ $data->id }}/update">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="defaultModalLabel">Edit {{ $data->name }} Account</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="message-text" class="col-form-label">Code</label>
            <input type="text" class="form-control" name="code" value="{{ $data->code }}">

            <label for="message-text" class="col-form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $data->name }}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal" aria-label="Close"
            aria-hidden="true">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
