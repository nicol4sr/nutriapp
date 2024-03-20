<form method="POST" action="{{ route('guardar-ejercicio') }}">
    @csrf

    <div class="mx-auto col-lg-8">

        <div class="row mb-3 justify-content-center ">
            <label for="inputText">Nombre del plan</label>
            <div class="input-group">

                <input type="text" name="nombre" class="form-control @error('nombre') is-invalid @enderror"
                    placeholder="Cardio prolongado" value="{{ old('nombre') }}">

                @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3 justify-content-center ">
            <label>Dificultad</label>

            <div class="input-group">
                <select name="dificultad" class="form-select @error('dificultad') is-invalid @enderror"
                    aria-label="Default select example">
                    <option value="" disabled selected>Seleccionar</option>
                    <option value="0">Básico</option>
                    <option value="1">Intermedio</option>
                    <option value="2">Difícil</option>
                </select>
            </div>
        </div>

        <div class="row mb-3 justify-content-center ">
            <label for="inputText">Descripción</label>
            <div class="input-group">

                <textarea name="descripcion" class="form-control @error('descripcion') is-invalid @enderror"
                    placeholder="Lleva a cabo 3 sets de 10 sentadillas durante 45 mins">{{ old('descripcion') }}</textarea>

                @error('descripcion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3 justify-content-center">
            <label>Genero</label>
            <div class="col-lg-8">
                <div class="input-group mt-3 justify-content-evenly">
                    <label>
                        <input type="radio" name="genero" value="0" />
                        Femenino
                    </label>
                    <label>
                        <input type="radio" name="genero" value="1" />
                        Masculino
                    </label>
                </div>
            </div>
        </div>

        <div class="row mb-3 justify-content-center">
            <label>Rango de edad</label>
            <div class="col">
                <label>Mínima</label>
                <div class="input-group mt-3">
                    <input type="number" name="edad_min" class="form-control @error('edad_min') is-invalid @enderror"
                        placeholder="20" value="{{ old('edad_min') }}">

                    @error('edad_min')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <label>Máxima</label>
                <div class="input-group mt-3">
                    <input type="number" name="edad_max" class="form-control @error('edad_max') is-invalid @enderror"
                        placeholder="25" value="{{ old('edad_max') }}">

                    @error('edad_max')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mb-3 justify-content-center">
            <label>Rango de peso</label>
            <div class="col">
                <label>Mínimo</label>
                <div class="input-group mt-3">
                    <input type="number" name="peso_min" class="form-control @error('peso_min') is-invalid @enderror"
                        placeholder="20" value="{{ old('peso_min') }}">

                    @error('peso_min')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <label>Máximo</label>
                <div class="input-group mt-3">
                    <input type="number" name="peso_max" class="form-control @error('peso_max') is-invalid @enderror"
                        placeholder="25" value="{{ old('peso_max') }}">

                    @error('peso_max')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row mb-3 justify-content-center">
            <label>Rango de altura (cm)</label>
            <div class="col">
                <label>Mínima</label>
                <div class="input-group mt-3">
                    <input id="altura_min" step="0.01" type="number" name="altura_min"
                        class="form-control @error('altura_min') is-invalid @enderror" placeholder="20"
                        value="{{ old('altura_min') }}">

                    @error('altura_min')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <label>Máxima</label>
                <div class="input-group mt-3">
                    <input id="altura_max" step="0.01" type="number" name="altura_max"
                        class="form-control @error('altura_max') is-invalid @enderror" placeholder="25"
                        value="{{ old('altura_max') }}">

                    @error('altura_max')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-3 has-validation">
            <label class="col-form-label">Parte del cuerpo a trabajar</label>

            <select name="parte_cuerpo_id" class="form-select @error('parte_cuerpo_id') is-invalid @enderror"
                aria-label="Default select example">
                <option value="" disabled selected>Seleccionar</option>
                @foreach ($grupos_musculares as $grupo)
                    <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                @endforeach
            </select>

            @error('parte_cuerpo_id')
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
    </div>


</form>
