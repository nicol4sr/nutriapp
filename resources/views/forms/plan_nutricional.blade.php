@extends('layouts.app')

@section('title', 'Plan de alimentacion')

@section('content')
    <div class="pagetitle">
        <h1>Crear Plan Nutricional</h1>
        <nav>
            <!-- <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                        </ol> -->
        </nav>
    </div>

    <section class="section dashboard">
        <div class="row justify-content-center">

            <!-- Left side columns -->
            <div class="col-lg-11">
                <div class="row">

                    <div class="card">
                        <div class="card-body">
                           

                            <!-- General Form Elements -->
                            <form>
                                <div class="mb-3 has-validation">
                                    <label for="nombre" class="col-sm-2 col-form-label">Nombre del plan</label>
                                    <input type="text" name="nombre"
                                        class="form-control @error('nombre') is-invalid @enderror"
                                        placeholder="Nombre del plan">
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 has-validation">
                                    <label for="descripcion" class="col-sm-2 col-form-label">Descripción</label>
                                    <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" style="height: 100px"
                                        placeholder="Descripción"></textarea>
                                    @error('descripcion')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 has-validation">
                                    <label for="objetivo" class="col-sm-2 col-form-label">Objetivo</label>
                                    <select name="objetivo" class="form-select @error('objetivo') is-invalid @enderror"
                                        aria-label="Default select example">
                                        <option value="" disabled selected>Seleccionar</option>
                                        <option value="1">Adelgazar</option>
                                        <option value="2">Subir de Peso</option>
                                        <option value="3">Balancear mi Nutrición</option>
                                        <option value="3">Diabetes</option>
                                        <option value="3">Hipertension</option>
                                    </select>
                                    @error('objetivo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3 has-validation">
                                    <legend class="col-form-label col-12 pt-0">Selección de receta</legend>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck1">
                                        <label class="form-check-label" for="gridCheck1">
                                            Elegir yo
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck2" checked>
                                        <label class="form-check-label" for="gridCheck1">
                                            Elegir existente
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="gridCheck2" checked>
                                        <label class="form-check-label" for="gridCheck1">
                                            Dejar que la app lo cree
                                        </label>
                                    </div>
                                    @error('receta')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
        </div>
    </section>
@endsection
