@extends('layouts.app')

@section('title', 'Perfil nutricionista')
@section('content')
    <section class="section">

        <!-- Left side columns -->
        <div class="col-lg-10">
            <div class="row">

                <div class="card">
                    <div class="card-body">
                        <div class="row text-center">
                            <h5 class="card-title">Perfil de nutricionista</h5>

                            <!-- General Form Elements -->
                            <form method="POST"action="{{ route('guardar-n') }}">
                                @csrf
                                <div class="row mb-3 justify-content-center ">
                                    <div class="col-lg-8">
                                        <input type="text" hidden="" value="{{ auth()->user()->rol_id }}"
                                            id="usuario_id" name="usuario_id"
                                            class="form-control @error('nombre') is-invalid @enderror">
                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Cuál es tu formación y experiencia en nutrición?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required name="pg1" class="form-control">

                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Qué tipo de alimentos y nutrientes recomendarías para alcanzar mis metas de salud o pérdida de peso?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required title="este" name="pg2" class="form-control">

                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Cómo monitorearás mi progreso y ajustarás el plan nutricional según sea necesario?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required name="pg3" class="form-control">

                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Cuál es mi objetivo principal al consultar con un nutricionista?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required title="este" name="pg4" class="form-control">

                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Has tenido alguna vez un cliente con el que fuera difícil trabajar? ¿Cómo te has comunicado con él?</label>
                                    <div class="col-lg-8">
                                        <input type="text" required name="pg5" class="form-control">

                                    </div>
                                </div>

                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">¿Cómo abordarías mis hábitos alimenticios actuales y posibles desafíos para cambiarlos?</label>
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
                                    <label for="inputText">¿Cómo evalúas las necesidades nutricionales de un nuevo cliente?</label>
                                    <div class="col-lg-8">
                                        <input type="text"required title="este" name="pg8" class="form-control">

                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label for="inputText">Disponibilidad de horario</label>
                                    <div class="col-lg-8">
                                        <input type="text"required title="este" name="dispo" class="form-control">

                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <div class="col-lg-8">
                                        <input type="text"required title="este" hidden value="10" name="stock" class="form-control">

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
