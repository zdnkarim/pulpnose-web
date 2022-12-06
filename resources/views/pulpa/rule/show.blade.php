<form method="post" action="/dashboard/rule/{{ $data->id }}/update">
    @csrf
    <div class="modal-header">
        <h5 class="modal-title" id="defaultModalLabel">Edit {{ $data->name }} Account</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <label for="recipient-name" class="col-form-label">Disease</label>
            <select name="disease" class="form-select" id="">
                @foreach ($disease as $ditem)
                    <option value="{{ $data->diseases->id }}" selected hidden>({{ $data->diseases->code }})
                        {{ $data->diseases->name }}</option>
                    <option value="{{ $ditem->id }}">({{ $ditem->code }}) {{ $ditem->name }}</option>
                @endforeach
            </select>
            <label for="recipient-name" class="col-form-label">Symptom</label>
            <select name="symptom" class="form-select" id="">
                @foreach ($symptom as $sitem)
                    <option value="{{ $data->symptoms->id }}" selected hidden>({{ $data->symptoms->code }})
                        {{ $data->symptoms->name }}</option>
                    <option value="{{ $sitem->id }}">({{ $sitem->code }}) {{ $sitem->name }}</option>
                @endforeach
            </select>
            <div class="row">
                <div class="col">
                    <label for="recipient-name" class="col-form-label">MB Score</label>
                    <small class="">
                        Nilai Ketidakpercayaan
                    </small>
                    <input type="number" class="form-control" name="mb" id="" placeholder="MB Score"
                        min="0" max="1" step=".2" value="{{ $data->mb }}">
                </div>
                <div class="col">
                    <label for="recipient-name" class="col-form-label">MD Score</label>
                    <small class="">
                        Nilai Ketidakpercayaan
                    </small>
                    <input type="number" class="form-control" name="md" id="" placeholder="MD Score"
                        min="0" max="1" step=".2" value="{{ $data->md }}">
                </div>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal" aria-label="Close"
            aria-hidden="true">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
