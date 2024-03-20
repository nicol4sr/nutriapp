<section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                <div class="card mb-3">
                    <div class="d-flex justify-content-center py-4">
                        <a href="views/index.php" class="logo  d-flex align-items-center">
                            <img src="/images/icons/icon.png" alt="">
                            <span class="d-none d-lg-block"></span>
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="pt-2">
                            <h5 class="card-title text-center pb-0 fs-4 " style="color: #22A7EA">Iniciar Sesión</h5>
                            <p class="text-center small">Ingresa tu usuario y contraseña para entrar</p>
                            <div class="alert">
                                <p style="color: black;"><?php echo isset($alert) ? $alert : ''; ?>
                            </div>
                            </p>
                        </div>
                        <x-login />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
