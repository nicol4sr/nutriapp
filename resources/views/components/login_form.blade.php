<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                @if (session('email'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('email') }}
                    </div>
                @endif

                @if (session('attempt'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('attempt') }}
                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        Su contraseña ha sido cambiada con exito
                    </div>
                @endif

                <div class="card mb-3">
                    <div class="d-flex justify-content-center">
                        <div class="pt-4 logo d-flex flex-column align-items-center">
                            <img src="/images/icons/icon.png" alt="">
                            <h5 class="text-center" style="color: #22A7EA">
                                Iniciar sesión
                            </h5>
                            <p class="text-center text-muted px-4">
                                Ingrese su usuario y contraseña para entrar
                            </p>
                        </div>
                    </div>
                    <div class="card-body">
                        <x-login />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
