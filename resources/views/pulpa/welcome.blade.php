@extends('pulpa.components.navbar')
@section('content')
    <!-- Header Start -->
    <div class="container-fluid bg-primary px-0 px-md-5">
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left">
                <h4 class="text-white mb-4 mt-5 mt-lg-0">Diagnosis Penyakit Pulpitis</h4>
                <h1 class="display-3 font-weight-bold text-white">
                    Dental Pulp Disease Diagnosis
                </h1>
                <p class="text-white mb-4">
                    Website Diagnosis Penyakit Pulpitis yangs memiliki kemampuan seperti
                    pakar dalam pengambilan keputusan, dalam kasus ini adalah diagnosis
                    penyakit pulpitis.
                </p>
                {{-- <form action="/diagnose" method="post">
                    @csrf
                    <input type="submit" name="" id="" class="btn btn-secondary mt-1 py-3 px-5"
                        value="Diagnosis">
                </form> --}}
                <a href="#" type="button" class="btn btn-secondary mt-1 py-3 px-5" data-target="#popUpInput"
                    data-toggle="modal">
                    Diagnosis
                </a>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <img class="img-fluid mt-5" src="{{ asset('landing/img/header.png') }}" alt="" />
            </div>
        </div>
    </div>
    <div class="modal fade" id="popUpInput" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="/diagnose" method="post">
                    @csrf
                    @if (Route::has('login'))
                        @auth
                            <div class="modal-header">
                                <h5 class="modal-title" id="defaultModalLabel">Input Patient Name</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Patient Name</label>
                                    <input type="text" class="form-control" name="pname" id=""
                                        placeholder="Patient Name" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn mb-2 btn-primary">Input</button>
                            </div>
                        @else
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Please login first to continue</label>
                                </div>
                            </div>
                        @endauth
                    @endif

                </form>
            </div>
        </div>
    </div>
    <!-- Header End -->
@endsection
