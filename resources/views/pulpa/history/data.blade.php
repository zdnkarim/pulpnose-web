@extends('pulpa.components.sidebar')

@section('subtitle')
    - History Data
@endsection

@section('link')
    @if ($isDashboard)
        <li class="sidebar-item">
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
    @endif

    <li class="sidebar-item active">
        <a @if ($isDashboard) href="/dashboard/history" @else href="/history" @endif class='sidebar-link'>
            <span>History</span>
        </a>
    </li>
@endsection

@section('page-title')
    History Data
@endsection

@if ($isDashboard)
    @section('navigation')
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">History</li>
    @endsection
@endif

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table datatables" id="table1" style="width:100%">
                <thead class="text-center">
                    <tr>
                        <th>Doctor's Name</th>
                        <th>Patient's Name</th>
                        <th>Result</th>
                        <th>Percent</th>
                        <th>Date</th>
                        <th style="width:15%">Action</th>

                    </tr>
                </thead>
                <tfoot></tfoot>
                <tbody>
                    @foreach ($data as $item)
                        @if (!$item->result && $isDashboard == false)
                        @else
                            <tr>
                                <td>{{ $item->users->name }}</td>
                                <td>{{ $item->patient_name }}</td>
                                @if ($item->result)
                                    <td>{{ $item->diseases->name }}</td>
                                @else
                                    <td class="text-center">-</td>
                                @endif
                                @if (empty($item->cf))
                                    <td class="text-center">-</td>
                                @else
                                    <td class="text-center">{{ $item->cf * 100 }}%</td>
                                @endif
                                <td class="text-center">{{ $item->created_at }}</td>
                                <td class="text-center">
                                    <a class="btn btn-link"
                                        @if ($isDashboard) href="/dashboard/history/detail/{{ $item->id }}" @else href="/history/detail/{{ $item->id }}" @endif>
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
