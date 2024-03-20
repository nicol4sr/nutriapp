@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
    <div class="pagetitle">
        <h1>Inicio</h1>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card text-white">
                    <img src="{{ asset('images/food/keto.jpg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay text-center">
                        <h5 class="card-title text-white text-center">Dieta keto</h5>
                        <p class="card-text">Estos planes ofrecen una red de proveedores de atención. Los proveedores tienen
                            un contrato con el plan especialista. Esto significa que cobran una tarifa fija por sus
                            servicios. Usted elegirá un especialista de atención primaria.</p>
                        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#mi-modal1">Ver más</button>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card text-white">
                    <img src="{{ asset('images/others/peso.jpg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay text-center">
                        <h5 class="card-title text-white text-center">¿Como aumentar de peso?</h5>
                        <p class="card-text">Es importante la realización de ejercicios anaeróbicos de forma regular para
                            favorecer la hipertrofia de los músculos.</p>
                        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#mi-modal2">Ver más</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-white">
                    <img src="{{ asset('images/others/nutri.jpg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay text-center">
                        <h5 class="card-title text-white text-center">Comer para nutrirse no para llenarse</h5>
                        <p class="card-text">La sensación de saciedad tarda hasta 20 minutos en llegar al cerebro cuando
                            empezamos a comer. Por eso debemos tomarnos el tiempo suficiente para alimentarnos y no
                            llenarnos en demasía.</p>
                        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#mi-modal3">Ver más</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card text-white">
                    <img src="{{ asset('images/others/hie.jpg') }}" class="card-img" alt="...">
                    <div class="card-img-overlay text-center">
                        <h5 class="card-title text-white text-center">Dieta dash</h5>
                        <p class="card-text">DASH es la sigla de Dietary Approaches to Stop Hypertension (Enfoques
                            dietéticos para detener la hipertensión),
                            La dieta basada en enfoques dietéticos para detener la hipertensión.</p>
                        <button type="button" class="btn btn-primary rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#mi-modal4">Ver más</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="mi-modal1" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">

                        <div class="modal-body text-center">
                            <div class="modal-header">
                                <h5 class="modal-title">Dieta keto</h5>
                                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                            </div>

                            <div class="card">
                                <img src="{{ asset('images/food/keto.jpg') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">En pocas palabras, la cetosis es cuando el cuerpo tiene que
                                        recurrir a las grasas acumuladas para obtener energía por la falta de carbohidratos,
                                        por eso, muchas personas han logrado adelgazar con esta dieta.</p>
                                    <br>
                                    <a href="https://www.youtube.com/watch?v=yWzXQrDbIdQ" class="text-body-primary">¿Como
                                        Empezar dieta keto?</a>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="mi-modal2" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">

                        <div class="modal-body text-center">
                            <div class="modal-header">
                                <h5 class="modal-title">¿Como aumentar de peso?</h5>
                                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                            </div>

                            <div class="card">
                                <img src="{{ asset('images/others/peso.jpg') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">Para aumentar la masa muscular se deben implementar algunas
                                        estrategias como consumir más calorías de las que se gastan, aumentar la cantidad de
                                        proteínas y carbohidratos que se ingieren durante el día e incluir grasas buenas en
                                        la alimentación.</p>
                                    <br>
                                    <a href="https://www.youtube.com/watch?v=EUw9xBR7ULU" class="text-body-primary">¿Como
                                        aumentar de peso?</a>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="mi-modal3" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">

                        <div class="modal-body text-center">
                            <div class="modal-header">
                                <h5 class="modal-title">Comer para nutrirse no para llenarse</h5>
                                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                            </div>

                            <div class="card">
                                <img src="{{ asset('images/others/nutri.jpg') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">Comer bien y sano sin pasar hambre es mucho más fácil de lo que
                                        parece, incluso fuera de casa. Sólo hay que seguir algunos consejos y reducir las
                                        opciones menos saludables a ocasiones especiales. En definitiva, significa cambiar
                                        de hábitos y elegir cuidarse. ¡Te revelamos la fórmula en 14 tips.</p>
                                    <br>
                                    <a href="https://www.youtube.com/watch?v=eayYAehUc3I" class="text-body-primary">¿Como
                                        alimentarse de manera adecuada?</a>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="mi-modal4" data-bs-backdrop="static">
                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">

                        <div class="modal-body text-center">
                            <div class="modal-header">
                                <h5 class="modal-title">Dieta dash</h5>
                                <button type="button" data-bs-dismiss="modal" class="btn-close"></button>
                            </div>

                            <div class="card">
                                <img src="{{ asset('images/others/hie.jpg') }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <p class="card-text">es un plan de alimentación saludable diseñado para ayudar a tratar
                                        o prevenir la presión arterial alta (hipertensión). También puede ayudar a bajar el
                                        colesterol asociado a enfermedades cardíacas, denominado colesterol de lipoproteínas
                                        de baja densidad.</p>
                                    <br>
                                    <a href="https://www.youtube.com/watch?v=3f8oTsbjiSs" class="text-body-primary">Dieta
                                        para la hipertensíon</a>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
