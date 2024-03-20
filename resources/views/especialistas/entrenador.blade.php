@extends('layouts.app')

@section('title', 'Perfil entrenador ')
 @section('content')
    <section class="section">

        <!-- Left side columns -->
        <div class="col-lg-10">
            <div class="row">

                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <h5 class="card-title">Perfil de entrenador</h5>

                            <!-- General Form Elements -->
                            <form method="POST"action="{{ route('guardar-p') }}">
                                @csrf
                                <div class="row mb-3 justify-content-center ">
                                    <div class="col-lg-8">
                                        <input type="text" hidden="" value="{{ auth()->user()->id }}"
                                            id="usuario_id" name="usuario_id"
                                            class="form-control @error('nombre') is-invalid @enderror">
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Cuál es tu experiencia y certificaciones como entrenador
                                        personal. ?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required name="pg1" class="form-control">

                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Cómo diseñarás un plan de entrenamiento personalizado? </label>
                                    <div class="col-lg-8">
                                        <input type="text"required title="este" name="pg2" class="form-control">

                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Qué tipo de ejercicios y rutinas recomendarías para alcanzar las
                                        metas de tus clientes ?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required name="pg3" class="form-control">

                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Cómo monitorearás el progreso y ajustarás el plan de
                                        entrenamiento según sea necesario?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required title="este" name="pg4" class="form-control">

                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Como recomendarías un tipo de nutrición y dieta para
                                        complementar un programa de entrenamiento?</label>
                                    <div class="col-lg-8">
                                        <input type="text" required name="pg5" class="form-control">

                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Cuál es tu disponibilidad para sesiones de entrenamiento y
                                        seguimiento?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required title="este" name="pg6" class="form-control">

                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Cómo abordarías lesiones o limitaciones físicas que pueda tener
                                        un cliente?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required name="pg7" class="form-control">

                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Qué medidas de seguridad y prevención implementas durante las
                                        sesiones de entrenamiento?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required title="este" name="pg8" class="form-control">

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
