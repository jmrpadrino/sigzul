<body class="c-app flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>Ingresar</h1>
                            <p class="text-muted">Inicie sesión en su cuenta</p>
                            <form id="loginform" role="form" action="." method="post">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend"><span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                            </svg></span></div>
                                    <input class="form-control" name="user" type="text" placeholder="Usuario">
                                </div>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend"><span class="input-group-text">
                                            <svg class="c-icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                                            </svg></span></div>
                                    <input class="form-control" name="pass" type="password" placeholder="Contraseña">
                                </div>
                                <?php if ($message) { ?>
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <span class="text-danger"><?php echo $message; ?></span>
                                    </div>
                                </div>
                                <?php $message = '';} ?>
                                <div class="row">
                                    <div class="col-6">
                                        <button class="btn btn-primary px-4" type="submit">Entrar</button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <!--
                                        <button class="btn btn-link px-0" type="button">¿Olvidó su contraseña?</button>
                                        -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card text-white bg-primary py-5 d-md-down-none" style="width:44%">
                        <div class="card-body text-center">
                            <div class="h-100 d-flex justify-content-center flex-column align-items-center">
                                <h2>SIGZUL<sup>®</sup></h2>
                                <p>Sistema de Gestión de Contenidos de LifEscozul<sup>®</sup></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- CoreUI and necessary plugins-->
    <script src="vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <!--[if IE]><!-->
    <script src="vendors/@coreui/icons/js/svgxuse.min.js"></script>
    <!--<![endif]-->
</body>
</html>