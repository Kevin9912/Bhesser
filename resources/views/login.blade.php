<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> Iniciar sesión en tu cuenta del sistema </title>
        <link href="{{url ('/image/Logo.png')}}" rel="shortcut icon" />
        <link href="{{url ('/css/styles.css')}}" rel="stylesheet" />
        <script src="{{url ('/js/all.min.js')}}" crossorigin="anonymous"></script>
        
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-1 rounded-lg mt-5 border border-secondary" >
                                    <div class="card-header border-bottom border-secondary"><h1 class="text-center font-weight-light my-4 text-primary">Iniciar Sesión</h1></div>
                                    <div class="card-body">
                                        <form id="frmLogin" action="{{route('validar')}}">
                                            <div class="form-group">
                                                <label class="small mb-1 text-primary" for="user"><i class="fas fa-user text-secondary"></i> Usuario </label>
                                                <input class="form-control py-4 border border-secondary" id="user" name="user" type="text" placeholder="Ingresar Usuario" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1 text-primary" for="password"><i class="fas fa-key text-secondary"></i> Contraseña </label>
                                                <input class="form-control py-4 border border-secondary" id="password" name="password" type="password" placeholder="Ingresar Contraseña" />
                                            </div>
                                            <div class="alert alert-danger text-center d-none" id="alerta" role="alert">
                                                
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <button class="btn btn-primary border border-secondary" type="button" onclick="frmLogin(this);"> Acceder </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer" class="border border-secondary">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-primary"> Copyright &copy; <a href="https://www.facebook.com/Bhesser-Consulting-108502741422926" target="_blank" rel="noopener noreferrer"> Visita Nuestra Página de Facebook </a> <?php echo date("Y"); ?></div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="{{url ('/js/jquery-3.5.1.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{url ('/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{url ('/js/scripts.js')}}"></script>
        <script src="{{url ('/js/sweetalert2.all.min.js')}}"></script>
        <script src="{{url ('/js/funciones.js')}}"></script>

    </body>
</html>
