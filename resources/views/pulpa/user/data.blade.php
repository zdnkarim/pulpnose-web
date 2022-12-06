@extends('pulpa.components.sidebar')

@section('subtitle')
    - User Data
@endsection

@section('link')
    <li class="sidebar-item active">
        <a href="/dashboard/user" class='sidebar-link'>
            <span>User</span>
        </a>
    </li>

    <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
            <span>Disease Data</span>
        </a>
        <ul class="submenu ">
            <li class="submenu-item ">
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
    User Data
@endsection

@section('navigation')
    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
    <li class="breadcrumb-item active" aria-current="page">User</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table datatables" id="table1" style="width:100%">
                <thead>
                    <tr class="text-center">
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th style="width:15%">Action</th>
                    </tr>
                </thead>
                <tfoot></tfoot>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            @forelse ($item->roleUser as $roleItem)
                                <td class="text-center">{{ $roleItem->roles->name }}</td>
                            @empty
                                <td class="text-center">-</td>
                            @endforelse
                            <td class="text-center">
                                <button class="btn btn-link openShowModal"
                                    data-href="/dashboard/user/{{ $item->id }}/show">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-link openDeleteModal"
                                    data-href="/dashboard/user/{{ $item->id }}/isdelete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
