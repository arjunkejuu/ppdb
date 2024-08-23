@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/fotopaud.jpg') }}" class="d-block w-100" alt="Slide 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/fotopaud1.jpg') }}" class="d-block w-100" alt="Slide 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/fotopaud2.jpg') }}" class="d-block w-100" alt="Slide 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="row justify-content-center bg-white mt-3 rounded-top border-bottom">
        <div class="col align-self-center p-5 border-end">
            <div class="row">
                <h3><i class="ri-map-pin-line"></i></h3>
            </div>
            <div class="row">
                <p>Perum. Griya Bukit Jaya Blok N RT.12/27, Desa Tlajung Udik, Kec. Gunungputri, Kab. Bogor, 16962</p>
            </div>
        </div>
        <div class="col align-self-center p-5">
            <div class="row">
                <h3><i class="ri-time-line"></i></h3>
            </div>
            <div class="row">
                <p>07:00 - 12:00 WIB</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center bg-white rounded-bottom">
        <div class="col align-self-center p-5">
            <h5>PENDAFTARAN GRATIS, DAFTARKAN ANAK ANDA</h5>
            <a class="btn btn-primary" href="{{ url('/pdb') }}">DAFTAR</a>
        </div>
    </div>
</div>
@endsection