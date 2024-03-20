@extends('layouts.app')

@section('title', 'D.psicologico')
@section('content')
    <section class="section">

        <!-- Left side columns -->
        <div class="col-lg-10">
            <div class="row">

                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <h5 class="card-title">Colocar datos fiscos</h5>

                            <!-- General Form Elements -->
                            <form method="POST"action="{{ route('guardar-d') }}">
                                @csrf
                                <div class="row mb-3 justify-content-center ">
                                    <div class="col-lg-8">
                                        <input type="text" hidden="" value="{{ auth()->user()->id }}"
                                            id="usuario_id" name="usuario_id"
                                            class="form-control @error('nombre') is-invalid @enderror">
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Cómo valoras tu imagen física en este momento, de forma positiva o negativa?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required name="pg1" class="form-control">

                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText" >¿Qué piensas de tu peso actual?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required title="este" name="pg2" class="form-control">

                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Te obsesiona lo que has comido o lo que has de comer?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required name="pg3" class="form-control">

                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Se ha modificado tu peso en las últimas semanas?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required title="este" name="pg4" class="form-control">

                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText" >Sufres de falta de concentracion y/o memoria </label>
                                    <div class="col-lg-8">
                                        <input type="text" required name="pg5" class="form-control">

                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText" >¿Has notado debilidad en tus músculos?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required title="este" name="pg6" class="form-control">

                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText" > ¿Estás preocupada/o por tu figura?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required name="pg7" class="form-control">
    
                                    </div>
                                </div>
    
                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Cómo duermes?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required  title="este" name="pg8" class="form-control">
    
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary w-50">Crear</button>
                                    </div>
                                </div>
                            </form><!-- End General Form Elements -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
