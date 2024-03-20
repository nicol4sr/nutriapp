@extends('layouts.app')

@section('title', 'Consulta con especialista')

@section('content')

    <div class="pagetitle">
        <h3>Consultas</h3>
    </div>
    <br>

    <section class="section">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="row" >
                        <div class="col">
                            <h5 class="card-text"><strong>Para solicitar una consulta ya sea para emisión de recetas, por una revisión , por rutina de ejercicio o por consulta con un psicologo seleccione la opción 'Consultar'. En cuanto tenga su cita, podrá retrasarla o cancelarla en caso de no poder atender en el momento de su notificación.</strong></h5>
                        </div>
                    </div>
                    <br>
                    <div>
                        <button class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#mi-modal1">Consultar
                        </button>
                    </div>
                </div>
            </div>
        </div>
     </div>
    </section>
    <div class="modal fade" id="mi-modal1" data-bs-backdrop="static">
                <div class="modal-dialog modal-lg ">
                    <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Agendar Consulta</h4>
                                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row justify-content-center">
                                    <div class="col">
                                      <div class="card" style="width: 11rem;">
                                          <img src="{{ asset('images/consulta/entrenadorV.png') }}" class="card-img-top" alt="...">
                                          <button class="btn btn-primary" type="button" id="citar"><strong>Entrenador</strong></button>
                                      </div>
                                    </div>
                                    <div class="col">
                                      <div class="card" style="width: 11rem;">
                                          <img src="{{ asset('images/consulta/psicologoV.png') }}" class="card-img-top" alt="...">
                                          <button class="btn btn-primary" type="button" id="citar2"><strong>Psicologo</strong></button>
                                      </div>
                                    </div>
                                    <div class="col">
                                      <div class="card" style="width: 11rem;">
                                          <img src="{{ asset('images/consulta/nutricionista.png') }}" class="card-img-top" alt="...">
                                            <button class="btn btn-primary" type="button" id="citar3"><strong>Nutriologo</strong></button>
                                          </div>
                                      </div>
                                </div>
                              </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
@section('js')

    <script src="{{ asset('/js/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('/js/cita.js') }}"></script>
@endsection