<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Session::has('roles'))
    @foreach(Session::get('roles') as $rol)
    <title>{{$rol->name}}</title>
    @endforeach
    @endif
    <link href="{{url ('/image/Logo_Menu.png')}}" rel="shortcut icon" />
    <link href="{{url ('/css/styles.css')}}" rel="stylesheet" />
    <link href="{{url ('/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" crossorigin="anonymous" />
    <script src="{{url ('/js/all.min.js')}}" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.1/chart.min.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="{{url ('Bienvenido')}}">Menú</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="{{url ('perfil/vista')}}"> Perfil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('PDF')}}" target="_blank"> Ayuda </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{url ('userlogout')}}"> Cerrar Sesión </a>
                </div>
            </li>
        </ul>
    </nav>
    @if(Session::has('roles'))
    @foreach(Session::get('roles') as $rol)
    @if($rol->name == "Administrador")
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
                            Configuración
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{url ('home')}}"><i class="fas fa-user mr-2"></i> Usuarios </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#personas" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                            Personas
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="personas" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{url ('home_people')}}"><i class="fas fa-user-friends mr-2"></i> Personas </a>
                                <a class="nav-link" href="{{url ('home_client')}}"><i class="fas fa-user-tie mr-2"></i> Clientes </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ventas" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            Ventas
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="ventas" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{url ('home_ventas')}}"><i class="fas fa-money-bill-alt mr-2"></i> ventas </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#almacen" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                            Almacen
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="almacen" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{url ('home_almacen')}}"><i class="fas fa-dolly-flatbed mr-2"></i> almacen </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#empresas" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                            Empresas
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="empresas" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{url ('home_empresas')}}"><i class="far fa-building mr-2"></i> Empresas </a>
                                <a class="nav-link" href="{{url ('home_oficinas')}}"><i class="fas fa-city mr-2"></i> Oficinas </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#proveedores" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-dolly"></i></div>
                            Proveedores
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="proveedores" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{url ('home_proveedores')}}"><i class="fas fa-people-carry mr-2"></i> Proveedores </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            @yield('content')
        </div>
    </div>
    @endif
    @if($rol->name == "Asistencia")
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ventas" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            Ventas
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="ventas" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{url ('home_ventas')}}"><i class="fas fa-money-bill-alt mr-2"></i> ventas </a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#almacen" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-warehouse"></i></div>
                            Almacen
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="almacen" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{url ('home_almacen')}}"><i class="fas fa-dolly-flatbed mr-2"></i> almacen </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
        @yield('content')
        </div>
    </div>
    @endif
    @if($rol->name == "Caja")
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ventas" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-shopping-cart"></i></div>
                            Ventas
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="ventas" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{url ('home_ventas')}}"><i class="fas fa-money-bill-alt mr-2"></i> ventas </a>
                            </nav>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
        @yield('content')
        </div>
    </div>
    @endif
    @endforeach
    @endif
    <script src="{{url ('/js/jquery-3.6.0.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{url ('/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{url ('/js/scripts.js')}}"></script>
    <!--<script src="{{url ('/js/Chart.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{url ('/demo/chart-area-demo.js')}}"></script>
        <script src="{{url ('/demo/chart-bar-demo.js')}}"></script> -->
    <script src="{{url ('/js/jquery.dataTables.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{url ('/js/dataTables.bootstrap4.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{url ('/demo/datatables-demo.js')}}"></script>
    <script src="{{url ('/js/sweetalert2.all.min.js')}}"></script>
    <script src="{{url ('/js/funciones.js')}}"></script>
</body>

</html>