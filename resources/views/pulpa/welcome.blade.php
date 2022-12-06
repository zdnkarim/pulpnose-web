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
                <form action="/diagnose" method="post">
                    @csrf
                    {{-- <button class="btn btn-secondary mt-1 py-3 px-5">Diagnosis</button> --}}
                    <input type="submit" name="" id="" class="btn btn-secondary mt-1 py-3 px-5"
                        value="Diagnosis">
                    {{-- <a href="/diagnose" class="btn btn-secondary mt-1 py-3 px-5">Diagnosis</a> --}}
                </form>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <img class="img-fluid mt-5" src="{{ asset('landing/img/header.png') }}" alt="" />
            </div>
        </div>
    </div>
    <!-- Header End -->
@endsection
