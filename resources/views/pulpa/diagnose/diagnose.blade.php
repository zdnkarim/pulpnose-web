@extends('pulpa.components.navbar')

@section('content')
    <form id="msform" method="POST" action="/diagnose/show/post">
        @csrf
        <div class="form-group">
            <div class="container-fluid py-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            {{-- <img class="img-fluid rounded mb-5 mb-lg-0"
                                @if ($id == 1) src="{{ asset('landing/img/tooth-1.png') }}"
                        @elseif ($id == 2)
                            src="{{ asset('landing/img/tooth-2.png') }}"
                        @elseif ($id == 3)
                            src="{{ asset('landing/img/tooth-3.png') }}"
                        @elseif ($id == 4)
                            src="{{ asset('landing/img/tooth-4.png') }}" @endif /> --}}

                            <img class="img-fluid rounded mb-5 mb-lg-0" src="{{ asset('landing/img/tooth-4.png') }}" />
                        </div>
                        <div class="col-lg-7">
                            <p class="section-title pr-5">
                                <span class="pr-2">Gejala</span>
                            </p>
                            <h1 class="mb-4">Pilih Gejala yang Anda Alami</h1>
                            <div class="form-check">
                                <div class="checkbox">
                                    @foreach ($data as $item)
                                        <li class="py-2">
                                            <input type="checkbox" id="checkbox{{ $item->id }}" class="form-check-input"
                                                name="symptom[]" value="{{ $item->id }}">
                                            <label for="checkbox{{ $item->id }}">({{ $item->code }})
                                                {{ $item->name }}</label>
                                        </li>
                                    @endforeach
                                </div>
                            </div>
                            <a href="/" class="btn btn-danger mt-2 py-2 px-4">Cancel</a>
                            <i><input type="submit" name="wnext" id="" class="btn btn-success mt-2 py-2 px-4"
                                    value="Submit"></i>
                            {{-- @if ($done == 1)
                                <i><input type="submit" name="wnext" id=""
                                        class="btn btn-success mt-2 py-2 px-4" value="Submit"></i>
                            @else
                                <i><input type="submit" name="wnext" id=""
                                        class="btn btn-primary mt-2 py-2 px-4" value="Next"></i>
                            @endif --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
