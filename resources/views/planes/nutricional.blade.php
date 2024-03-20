@extends('layouts.app')

@section('title', 'Lista especialista')

@section('content')

    <div class="pagetitle">
        <h1>Planes</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Lista</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-4">
                <div class="card text-white">
                    <img src="{{ asset('images/food/receta_3.jpg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay text-center">
                        <h5 class="card-title text-white text-center">Plan Personalizado</h5>
                        
                        <a href="{{ route('nutricional-personalizado') }}" type="button"
                            class="btn btn-primary rounded-pill">Empezar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-white">
                    <img src="{{ asset('images/food/receta_3.jpg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay text-center">
                        <h5 class="card-title text-white text-center">Plan Personalizado</h5>
                    
                        <a href="{{ route('nutricional-personalizado') }}" type="button"
                            class="btn btn-primary rounded-pill">Empezar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-white">
                    <img src="{{ asset('images/food/receta_3.jpg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay text-center">
                        <h5 class="card-title text-white text-center">Plan Personalizado</h5>
                        
                        <a href="{{ route('nutricional-personalizado') }}" type="button"
                            class="btn btn-primary rounded-pill">Empezar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-white">
                    <img src="{{ asset('images/food/receta_3.jpg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay text-center">
                        <h5 class="card-title text-white text-center">Plan Personalizado</h5>
                    
                        <a href="{{ route('nutricional-personalizado') }}" type="button"
                            class="btn btn-primary rounded-pill">Empezar</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card text-white">
                    <img src="{{ asset('images/food/receta_3.jpg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay text-center">
                        <h5 class="card-title text-white text-center">Plan Personalizado</h5>
                        
                        <a href="{{ route('nutricional-personalizado') }}" type="button"
                            class="btn btn-primary rounded-pill">Empezar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
