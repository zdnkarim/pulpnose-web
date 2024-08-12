@extends('pulpa.components.sidebar')

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection

@section('subtitle')
    - Rule Data
@endsection

@section('link')
    <li class="sidebar-item">
        <a href="/dashboard/user" class='sidebar-link'>
            <span>User</span>
        </a>
    </li>

    <li class="sidebar-item  has-sub active">
        <a href="#" class='sidebar-link'>
            <span>Disease Data</span>
        </a>
        <ul class="submenu active">
            <li class="submenu-item ">
                <a href="/dashboard/disease">Disease</a>
            </li>
            <li class="submenu-item ">
                <a href="/dashboard/symptom">Symptom</a>
            </li>
            <li class="submenu-item active">
                <a href="/dashboard/rule">Rule</a>
            </li>
        </ul>
    </li>

    <li class="sidebar-item">
        <a href="/dashboard/history" class='sidebar-link'>
            <span>History</span>
        </a>
    </li>
@endsection

@section('page-title')
    Rule Data
@endsection

@section('navigation')
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Rule</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="#" type="button" class="btn btn-success" data-bs-target="#popUpCreate" data-bs-toggle="modal">
                Add New Rule
            </a>
        </div>
        <div class="card-body">
            <table class="table datatables" id="table1" style="width:100%">
                <thead>
                    <tr>
                        <th>Disease</th>
                        <th>Symptom</th>
                        <th>CF Score</th>
                        <th style="width:15%">Action</th>
                    </tr>
                </thead>
                <tfoot></tfoot>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->diseases->name }}</td>
                            <td>{{ $item->symptoms->name }}</td>
                            <td>{{ $item->cf }}</td>
                            <td class="text-center">
                                <button class="btn btn-link openShowModal"
                                    data-href="/dashboard/rule/{{ $item->id }}/show">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-link openDeleteModal"
                                    data-href="/dashboard/rule/{{ $item->id }}/isdelete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="popUpCreate" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" action="/dashboard/rule/create">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Add New Rule</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Disease</label>
                            <select name="disease" class="form-select" id="">
                                @foreach ($disease as $ditem)
                                    <option value="" selected hidden>Choose Disease</option>
                                    <option value="{{ $ditem->id }}">({{ $ditem->code }}) {{ $ditem->name }}</option>
                                @endforeach
                            </select>

                            <label for="recipient-name" class="col-form-label">Symptom</label>
                            <select name="symptom" class="form-select" id="">
                                @foreach ($symptom as $sitem)
                                    <option value="" selected hidden>Choose Symptom</option>
                                    <option value="{{ $sitem->id }}">({{ $sitem->code }}) {{ $sitem->name }}</option>
                                @endforeach
                            </select>

                            <div class="row">
                                <div class="col">
                                    <label for="recipient-name" class="col-form-label">MB Score</label>
                                    <input type="number" class="form-control" name="mb" id=""
                                        placeholder="MB Score" min="0" max="1" step=".2">
                                </div>
                                <div class="col">
                                    <label for="recipient-name" class="col-form-label">MD Score</label>
                                    <input type="number" class="form-control" name="md" id=""
                                        placeholder="MD Score" min="0" max="1" step=".2">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn mb-2 btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn mb-2 btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script src="{{ asset('dboard/vendors/choices.js/choices.min.js') }}"></script> --}}
@endsection
