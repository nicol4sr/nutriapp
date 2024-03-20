@extends('layouts.app')

@section('title', 'Registrarme como especialista')

@section('content')
    <div class="col-4 mb-4">
        <a href="{{ route('home') }}" class="btn btn-primary w-50"> <i class="bi bi-arrow-left"> </i>Regresar</a>
    </div>

    <h1>Registrarme como especialista</h1>
    <section class="section">

        <!-- Left side columns -->
        <div class="col-lg-10">

            <div class="card">
                <div class="card-body">
                    <div class="row text-center">


                        <!-- General Form Elements -->
                        <form method="POST" action="{{ route('guardar-especialista') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row mb-3 justify-content-center ">
                                <label for="inputText">Especialidad</label>
                                <div class="col-lg-8">
                                    <div class="input-group">

                                        <select name="especialidad"
                                            class="form-control @error('especialidad') is-invalid @enderror">
                                            <option value="" disabled selected>Seleccione
                                            </option>
                                            <option value="0" {{ old('especialidad') === 0 ? 'selected' : '' }}>
                                                Entrenador</option>
                                            <option value="1" {{ old('especialidad') === 1 ? 'selected' : '' }}>
                                                Psicólogo</option>
                                            <option value="2" {{ old('especialidad') === 2 ? 'selected' : '' }}>
                                                Nutricionista</option>
                                        </select>

                                        @error('especialidad')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center ">
                                <label for="inputText">Número de permiso</label>
                                <div class="col-lg-8">
                                    <div class="input-group">

                                        <input name="nro_permiso"
                                            class="form-control @error('nro_permiso') is-invalid @enderror" placeholder="48"
                                            value="{{ old('nro_permiso') }}">

                                        @error('nro_permiso')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <label>Cédula</label>
                                <div class="col-lg-8">
                                    <div class="input-group mt-3">
                                        <input type="number" name="cedula"
                                            class="form-control @error('cedula') is-invalid @enderror"
                                            placeholder="28101201" value="{{ old('cedula') }}">

                                        @error('cedula')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center">
                                <label>Cédula</label>
                                <div class="col-lg-8">
                                    <div class="input-group mb-3">
                                        <div class="custom-file">
                                            <input type="file" name="comprobante"
                                                class="form-control custom-file-input @error('comprobante') is-invalid @enderror"
                                                id="inputGroupFile01" accept="image/*">
                                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>
                                    @error('comprobante')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3 text-center">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary w-50">Crear</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
