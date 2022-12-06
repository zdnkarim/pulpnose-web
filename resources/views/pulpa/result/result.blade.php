@extends('pulpa.components.navbar')

@section('content')
    <div class="container-fluid bg-primary px-0 px-md-5">
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-left">
                <h4 class="text-white mb-4 mt-5 mt-lg-0">Hasil Diagnosis</h4>
                <h1 class="display-3 font-weight-bold text-white">
                    @if (!$sick || empty($data->diseases->name))
                        Kemungkinan Anda Tidak Mengalami Penyakit Pulpitis
                    @else
                        Kemungkinan Anda Mengalami Penyakit {{ $data->diseases->name }} : {{ $data->cf * 100 }}%
                    @endif

                </h1>
                <p class="text-white mb-4 font-italic">
                    *segera kunjungi dokter untuk pemeriksaan lebih lanjut
                </p>

                {{-- <button class="btn btn-secondary mt-1 py-3 px-5">Diagnosis</button> --}}
                <form action="/diagnose" method="post">
                    @csrf
                    {{-- <button class="btn btn-secondary mt-1 py-3 px-5">Diagnosis</button> --}}
                    <input type="submit" name="" id="" class="btn btn-danger mt-1 py-3 px-5"
                        value="Diagnosis">
                    {{-- <a href="/diagnose" class="btn btn-secondary mt-1 py-3 px-5">Diagnosis</a> --}}
                </form>
                @if (!$sick || empty($data->diseases->name))
                @else
                    <a class="btn btn-secondary mt-1 py-3 px-5" href="/history/detail/{{ $data->id }}">Detail</a>
                @endif
                {{-- <a href="/diagnose" class="btn btn-secondary mt-1 py-3 px-5">Diagnosis</a> --}}

            </div>
            <div class="col-lg-6 text-center text-lg-right">
                @if (!$sick || empty($data->diseases->name))
                    {{-- <img class="img-fluid mt-5" src="{{ asset('landing/img/tooth-' . $data->result . '.png') }}"
                        alt="" /> --}}
                    <img class="img-fluid mt-5" src="{{ asset('landing/img/tooth-healthy.png') }}" alt="" />
                @else
                    <img class="img-fluid mt-5" src="{{ asset('landing/img/tooth-1.png') }}" alt="" />
                @endif
            </div>
        </div>
    </div>
@endsection
