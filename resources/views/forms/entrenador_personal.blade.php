@extends('layouts.app')

@section('title', 'Pagos')

@section('content')
    <div class="pagetitle">
        <h1>Pagos</h1>
        <nav>
            <!-- <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
            </ol> -->
        </nav>
    </div>

    <section class="section dashboard">

        <div class="row">
            <div class="col-lg-7 mx-auto">
                <div class="bg-white rounded-lg shadow-sm p-5">
                    <!-- Credit card form tabs -->
                    <ul role="tablist" class="nav bg-light nav-pills rounded-pill nav-fill mb-3">
                        <li class="nav-item">
                            <a data-toggle="pill" href="#nav-tab-card" class="nav-link active rounded-pill">
                                <i class="bi bi-credit-card"></i>
                                Tarjeta de Credito
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="pill" href="#nav-tab-paypal" class="nav-link rounded-pill">
                                <i class="bi bi-paypal"></i>
                                Paypal
                            </a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="pill" href="#nav-tab-bank" class="nav-link rounded-pill">
                                <i class="bi bi-bank"></i>
                                Tranferir
                            </a>
                        </li>
                    </ul>
                    <!-- End -->


                    <!-- Credit card form content -->
                    <div class="tab-content">

                        <!-- credit card info-->
                        <div id="nav-tab-card" class="tab-pane fade show active">
                            <p class="alert alert-success">Error al introducir los datos</p>
                            <form role="form">
                                <div class="form-group">
                                    <label for="username">Nombre completo</label>
                                    <input type="text" name="username" placeholder="Jason Doe" required
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="cardNumber">Numero de Tarjeta</label>
                                    <div class="input-group">
                                        <input type="text" name="cardNumber" placeholder="Tu numero de tarjeta"
                                            class="form-control" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text text-muted">
                                                <i class="ri ri-visa-fill mx-1"></i>
                                                <i class="ri ri-mastercard-line mx-1"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label><span class="hidden-xs">F.vencimiento</span></label>
                                            <div class="input-group">
                                                <input type="number" placeholder="Mes" name="" class="form-control"
                                                    required>
                                                <input type="number" placeholder="Año" name="" class="form-control"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4">
                                            <label data-toggle="tooltip"
                                                title="Three-digits code on the back of your card">CVV
                                                <i class="bi bi-question-circle"></i>
                                            </label>
                                            <input type="text" required class="form-control">
                                        </div>
                                    </div>



                                </div>
                                <button type="button" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm">
                                    Confirmar </button>
                            </form>
                        </div>
                        <!-- End -->

                        <!-- Paypal info -->
                        <div id="nav-tab-paypal" class="tab-pane fade">
                            <p>PayPal es la forma más fácil de pagar en línea</p>
                            <p>
                                <button type="button" class="btn btn-primary rounded-pill"><i
                                        class="bi bi-paypal mr-2"></i> Log into my Paypal</button>
                            </p>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                        <!-- End -->

                        <!-- bank transfer info -->
                        <div id="nav-tab-bank" class="tab-pane fade">
                            <h6>Datos de la cuenta bancaria</h6>
                            <dl>
                                <dt>Banco</dt>
                                <dd> EL BANCO DEL MUNDO</dd>
                            </dl>
                            <dl>
                                <dt>Numero de cuentadt>
                                <dd>7775877975</dd>
                            </dl>
                            <dl>
                                <dt>IBAN</dt>
                                <dd>CZ7775877975656</dd>
                            </dl>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                tempor incididunt ut labore et dolore magna aliqua.
                            </p>
                        </div>
                        <!-- End -->
                    </div>
                    <!-- End -->

                </div>
            </div>
        </div>
        </div>

</section @endsection
