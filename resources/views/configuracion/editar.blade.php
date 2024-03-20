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
                            <h5 class="card-title">Editar datos fiscos</h5>
                          
                            <!-- General Form Elements -->
                            <form method="post" action="{{ route('actualizar.d',$datos) }}" >
                                @csrf
                      
                              @method('put')
                              <div class="row mb-3 justify-content-center ">
                                <div class="col-lg-8">
                                    <input type="text" hidden="" value="{{ auth()->user()->id }}" id="usuario_id" name="usuario_id" class="form-control @error('nombre') is-invalid @enderror">
                                </div>
                            </div>
                                <div class="row mb-3 justify-content-center">
                                    <label>¿Cual es tu objetivo?</label>
                                    <div class="col-lg-8">
                                        <div>
                                            <div class="input-group mt-3">
                                                <select id="habitos" name="objetivo"
                                                    class="form-control @error('tipos') is-invalid @enderror">
                                                    <option value="{{$datos->objetivo}}"selected disabled >{{$datos->objetivo}}</option>
                                                    <option value="Bajar de Peso" >Bajar de Peso</option>
                                                    <option value="Subir de Peso" >Subir de Peso</option>
                                                    <option value="Balancear mi nutrición" >Balancear mi nutrición</option>
                                                </select>
                                                <div class="valid-feedback">listo</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label>Habitos Alimenticios:</label>
                                    <div class="col-lg-8">
                                        <div>
                                            <div class="input-group mt-3">
                                                <select id="habitos" name="habitos"
                                                    class="form-control @error('tipos') is-invalid @enderror">
                                                    <option value="{{$datos->habitos}}"selected disabled >{{$datos->habitos}}</option>
                                                    <option value="No respeto horarios de comida" >No respeto horarios de comida</option>
                                                    <option value="Como dulce o alimentos azucardos con frecuencia" >Como dulce o alimentos azucardos con frecuencia</option>
                                                    <option value="Como comida chatarra , procesada o enlatada" > Como comida chatarra , procesada o enlatada</option>
                                                    <option value="Consumo alimentos fritos" >  Consumo alimentos fritos</option>
                                                    
                                                </select>
                                                <div class="valid-feedback">listo</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <label>Genero</label>
                                    <div class="col-lg-8">
                                        <div>
                                            <div class="input-group mt-3">
                                                <select id="genero" name="genero"
                                                    class="form-control @error('tipos') is-invalid @enderror">
                                                    <option value="{{$datos->genero}}"  selected disabled>{{$datos->genero}}</option>
                                                    <option value="Masculino" >Masculino</option>
                                                    <option value="Femenino" > Femenino</option>
                                                </select>
                                                <div class="valid-feedback">listo</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mb-3 justify-content-center ">
                                    <label for="inputText">Peso</label>
                                    <div class="col-lg-8">
                                        <input type="number"value="{{$datos->pesoi}}" name="pesoi"
                                            class="form-control @error('nombre') is-invalid @enderror">
                                    </div>
                                
                                </div>
                                <div class="row mb-3 justify-content-center ">
                                    <label for="inputText">Altura</label>
                                    <div class="col-lg-8">
                                        <input type="number"value="{{$datos->altura}}" name="altura"
                                            class="form-control @error('nombre') is-invalid @enderror">
                                    </div>
                                
                                </div>
                                <div class="row mb-3 justify-content-center ">
                                    <label for="inputText">Edad</label>
                                    <div class="col-lg-8">
                                        <input type="date"value="{{$datos->edad}}" name="edad"
                                            class="form-control @error('nombre') is-invalid @enderror">
                                    </div>
                                
                                </div>
                                <div class="row mb-3 justify-content-center">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-primary w-50">editar</button>
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
