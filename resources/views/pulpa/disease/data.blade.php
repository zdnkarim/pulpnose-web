@extends('pulpa.components.sidebar')

@section('subtitle')
    - Disease Data
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
            <li class="submenu-item active">
                <a href="/dashboard/disease">Disease</a>
            </li>
            <li class="submenu-item ">
                <a href="/dashboard/symptom">Symptom</a>
            </li>
            <li class="submenu-item ">
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
    Disease Data
@endsection

@section('navigation')
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">Disease</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a href="#" type="button" class="btn btn-success" data-bs-target="#popUpCreate" data-bs-toggle="modal">
                Add New Disease
            </a>
        </div>
        <div class="card-body">
            <table class="table datatables" id="table1" style="width:100%">
                <thead class="text-center">
                    <tr>
                        <th>Code</th>
                        <th>Disease Name</th>
                        <th>Description</th>
                        <th>First Aid</th>
                        <th style="width:15%">Action</th>
                    </tr>
                </thead>
                <tfoot></tfoot>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td class="text-center">{{ $item->code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->desc }}</td>
                            <td>{{ $item->first_aid }}</td>
                            <td class="text-center">
                                <button class="btn btn-link openShowModal"
                                    data-href="/dashboard/disease/{{ $item->id }}/show">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-link openDeleteModal"
                                    data-href="/dashboard/disease/{{ $item->id }}/isdelete">
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
                <form method="post" action="/dashboard/disease/create">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="defaultModalLabel">Add New Disease</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Code</label>
                            <input type="text" class="form-control" name="code" id="" placeholder="Code">

                            <label for="recipient-name" class="col-form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="" placeholder="Name">

                            <label for="recipient-name" class="col-form-label">Description</label>
                            <textarea name="desc" class="form-control" id="" cols="15" placeholder="Description"></textarea>

                            <label for="recipient-name" class="col-form-label">First Aid</label>
                            <textarea name="first_aid" class="form-control" id="" cols="15" placeholder="First Aid"></textarea>
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
