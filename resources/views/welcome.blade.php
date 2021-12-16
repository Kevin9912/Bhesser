            @extends('master')
            @section('content')
                        <h1 class="text-center text-primary mb-3"> Bienvenido Usuario </h1>
                        @if(Session::has('roles'))
                        @foreach(Session::get('roles') as $rol)
                        <h1 class="text-center text-primary mb-3"> {{$rol->name}} </h1>
                        @endforeach
                        @endif
                        <h1 class="text-center text-primary mb-3"> Comencemos a Trabajar</h1> 
            <main>
                <div class="container-fluid">
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; <a href="https://www.facebook.com/Bhesser-Consulting-108502741422926" target="_blank" rel="noopener noreferrer"> Visita Nuestra Página de Facebook </a> <?php echo date("Y"); ?> </div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        
        @endsection('content')