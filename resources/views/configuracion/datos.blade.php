@extends('layouts.app')

@section('title', 'Datos físicos')

@section('css')
    <link href="css/reco.css" rel="stylesheet">
@endsection

@section('js')
    <script src="js/reco.js"></script>
@endsection

@section('content')
    <section>

        <section class="section">

            <!-- Left side columns -->
            <div class="col-lg-10">
                <div class="row">

                    <div class="card">
                        <div class="card-body">
                            <div class="row text-center">
                                <h3>Colocar datos fiscos</h3>

                                <!-- General Form Elements -->
                                <form method="POST"action="{{ route('guardar-datos') }}">
                                    @csrf
                                    <div class="row mb-3 justify-content-center ">
                                        <div class="col-lg-8">
                                            <input type="text" hidden="" value="{{ auth()->user()->id }}"
                                                id="usuario_id" name="usuario_id"
                                                class="form-control @error('nombre') is-invalid @enderror">
                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center">
                                        <label>¿Cual es su Nacionalidad?</label>
                                        <div class="col-lg-8">
                                            <div>
                                                <div class="input-group mt-3">
                                                    <select id="genero" name="nacionalidad"
                                                        class="form-control @error('tipos') is-invalid @enderror">
                                                        <option value="" selected disabled>Seleciona tu Nacionalidad
                                                        </option>
                                                        @foreach ($nacionalidades as $nacionalidad)
                                                            <option value="{{ $nacionalidad->id }}">
                                                                {{ $nacionalidad->pais }}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="valid-feedback">listo</div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mb-3 justify-content-center">
                                            <label>¿Cual es tu objetivo?</label>
                                            <div class="col-lg-8">
                                                <div>
                                                    <div class="input-group mt-3">
                                                        <select id="habitos" name="objetivo"
                                                            class="form-control @error('tipos') is-invalid @enderror">
                                                            <option value=""selected disabled>seleciona tus objetivo
                                                            </option>
                                                            <option value="Bajar de Peso">Bajar de Peso</option>
                                                            <option value="Subir de Peso">Subir de Peso</option>
                                                            <option value="Balancear mi nutrición">Balancear mi nutrición
                                                            </option>
                                                        </select>
                                                        <div class="valid-feedback">listo</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mb-3 justify-content-center">
                                            <label>¿Que Habitos Alimenticios Tiene?</label>
                                            <div class="col-lg-8">
                                                <div>
                                                    <div class="input-group mt-3">
                                                        <select id="habitos" name="habitos"
                                                            class="form-control @error('tipos') is-invalid @enderror">
                                                            <option value=""selected disabled>seleciona tus habitos
                                                            </option>
                                                            <option value="No respeto horarios de comida">No respeto
                                                                horarios de
                                                                comida</option>
                                                            <option value="Como dulce o alimentos azucardos con frecuencia">
                                                                Como
                                                                dulce o alimentos azucardos con frecuencia</option>
                                                            <option value="Como comida chatarra , procesada o enlatada">
                                                                Como
                                                                comida chatarra , procesada o enlatada</option>
                                                            <option value="Consumo alimentos fritos"> Consumo alimentos
                                                                fritos
                                                            </option>

                                                        </select>
                                                        <div class="valid-feedback">listo</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mb-3 justify-content-center">
                                            <label>¿Cual es tu Genero?</label>
                                            <div class="col-lg-8">
                                                <div>
                                                    <div class="input-group mt-3">
                                                        <select id="genero" name="genero"
                                                            class="form-control @error('tipos') is-invalid @enderror">
                                                            <option value="" selected disabled>Seleciona tu genero
                                                            </option>
                                                            <option value="Femenino">Femenino</option>
                                                            <option value="Masculino">Masculino</option>
                                                        </select>
                                                        <div class="valid-feedback">listo</div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="row mb-3 justify-content-center ">
                                            <label for="inputText">¿Cual es tu Peso? (Kg) </label>
                                            <div class="col-lg-8">
                                                <select name="pesoi" id="selectAge1" class="form-control"></select>
                                                <script>
                                                    var selectAge = document.getElementById("selectAge1");
                                                    var contents;

                                                    for (let i = 1; i <= 300; i++) {
                                                        contents += "<option>" + i + "</option>";
                                                    }

                                                    selectAge.innerHTML = contents;
                                                </script>
                                            </div>

                                        </div>
                                        <div class="row mb-3 justify-content-center ">
                                            <label for="inputText">¿Cual es tu Altura? (Cm)</label>
                                            <div class="col-lg-8">

                                                <select name="altura" id="selectAge" class="form-control"></select>
                                                <script>
                                                    var selectAge = document.getElementById("selectAge");
                                                    var contents;

                                                    for (let i = 1; i <= 300; i++) {
                                                        contents += "<option>" + i + "</option>";
                                                    }

                                                    selectAge.innerHTML = contents;
                                                </script>
                                            </div>
                                        </div>
                                        <div class="row mb-3 justify-content-center">
                                            <label for="inputText">¿Cual es tu Indice de Masa Corporal?</label>
                                            <div class="col-lg-8">
                                                <select name="imc" id="selectAge2" class="form-control"></select>
                                                <script>
                                                    var selectAge = document.getElementById("selectAge2");
                                                    var contents;

                                                    for (let i = 1; i <= 300; i++) {
                                                        contents += "<option>" + i + "</option>";
                                                    }

                                                    selectAge.innerHTML = contents;
                                                </script>
                                            </div>
                                        </div>
                                        <div class="row mb-3 justify-content-center">
                                            <label for="inputText">¿Tiene Alguna Discapacidad?</label>
                                            <div class="col-lg-8">
                                                <input type="text" name="discapacidad" class="form-control">

                                            </div>
                                        </div>

                                        <div class="row mb-3 justify-content-center">
                                            <label for="inputText">¿Tiene Alguna Alergia ?</label>
                                            <div class="col-lg-8">
                                                <input type="text" name="alergia" class="form-control">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3 justify-content-center ">
                                        <label for="inputText">¿Que Edad Tiene?</label>
                                        <div class="col-lg-8">
                                            <input type="date" name="edad"
                                                class="form-control @error('nombre') is-invalid @enderror">
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
