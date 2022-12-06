<form method="post" action="/dashboard/user/{{ $data->id }}/update">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="defaultModalLabel">Edit {{ $data->name }} Account</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="message-text" class="col-form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{ $data->name }}" disabled>

            <label for="message-text" class="col-form-label">Email</label>
            <input type="email" class="form-control" name="email" value="{{ $data->email }}" disabled>

            <label for="message-text" class="col-form-label">Role</label>
            <select class="form-select" id="basicSelect" name="role" required>
                @forelse ($data->roleUser as $roleItem)
                    <option value="$roleItem->roles->name" selected hidden>{{ $roleItem->roles->name }}</option>
                @empty
                    <option value="-" selected hidden>-</option>
                @endforelse
                @foreach ($role as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal" aria-label="Close"
            aria-hidden="true">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
