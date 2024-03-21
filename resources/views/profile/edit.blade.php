@extends('layouts.app')

@section('title', 'Perfil')

@section('js')
    <script src="{{ asset('js/imagePreview.js') }}"></script>
@endsection

@section('content')

    <div class="pagetitle">
        <h1>Perfil</h1>
    </div>

    <section class="section profile">
        <form method="POST" action="{{ route('actualizar-perfil') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="row mb-3 text-center">
                    <div class="col-sm-12">
                        <a href="{{ route('perfil') }}" class="btn btn-primary">Volver</a>
                    </div>
                </div>
                <div class="mx-auto col-8">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            <img src="{{ asset('images/users/profile_0.png') }}" id="preview" alt="Profile"
                                class="rounded-circle">
                            <img
                                src="{{ $usuario->foto == null ? asset('images/users/profile_0.png') : asset('storage/imagenes/' . $usuario->foto) }}">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                    <input class="upload" type="file" name="foto"
                                        accept="image/png, image/jpeg, image/jpg" onchange="loadImage(event)">
                                    <label class="custom-file-label" for="foto">Choose file</label>
                                </div>
                            </div>
                            @error('foto')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <div class="row mb-3 justify-content-center text-center">
                                <label>Nombre</label>
                                <div class="col-12">
                                    <div class="input-group mt-3">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" placeholder="Jose"
                                            value="{{ $usuario->name }}">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 justify-content-center text-center">
                                <label>Correo</label>
                                <div class="col-12">
                                    <div class="input-group mt-3">
                                        <input type="text" name="email"
                                            class="form-control @error('email') is-invalid @enderror" placeholder="Jose"
                                            value="{{ $usuario->email }}">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3 text-center">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </form>
    </section>
@endsection
