@extends('pulpa.components.sidebar')

@section('subtitle')
    - History Detail
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
    History Detail
@endsection

@if ($isDashboard)
    @section('navigation')
        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/dashboard/history">History</a></li>
        <li class="breadcrumb-item" aria-current="page">History Detail</li>
    @endsection
@endif

@section('content')
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Hasil Diagnosa</h4>
                </div>
                <div class="card-content">
                    @if (count($data) != 0)
                        <div class="card-body">
                            <form class="form">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3 col-12">
                                                    <label for="first-name-column">Nama</label>
                                                </div>
                                                <div class="col-md-8 col-12">
                                                    : {{ $data[0]->histories->users->name }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3 col-12">
                                                    <label for="first-name-column">Penyakit</label>
                                                </div>
                                                <div class="col-md-9 col-12">
                                                    @if ($data[0]->histories->diseases)
                                                        : {{ $data[0]->histories->diseases->name }}
                                                    @else
                                                        : -
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3 col-12">
                                                    <label for="first-name-column">Persentase</label>
                                                </div>
                                                <div class="col-md-9 col-12">
                                                    : {{ $data[0]->histories->cf * 100 }}%
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3 col-12">
                                                    <label for="first-name-column">Definisi Penyakit</label>
                                                </div>
                                                <div class="col-md-9 col-12">
                                                    @if ($data[0]->histories->diseases)
                                                        : {{ $data[0]->histories->diseases->desc }}
                                                    @else
                                                        : -
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3 col-12">
                                                    <label for="first-name-column">Penanganan</label>
                                                </div>
                                                <div class="col-md-9 col-12">
                                                    @if ($data[0]->histories->diseases)
                                                        : {{ $data[0]->histories->diseases->first_aid }}
                                                    @else
                                                        : -
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        @foreach ($symptomData as $item)
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-3 col-12">
                                                        @if ($loop->index == 0)
                                                            <label for="first-name-column">Gejala yang Dipilih</label>
                                                        @else
                                                            <label for="first-name-column"></label>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-8 col-12">
                                                        : ({{ $item->code }})
                                                        {{ $item->name }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <a href="/" class="btn btn-primary me-1 mb-1">Home</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @else
                        <div class="justify-content-center text-center my-10">
                            <strong>No data available in this history</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
