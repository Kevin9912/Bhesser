            @extends('master')
            @section('content')
            <h1 class="text-center text-white bg-primary"> Reportes de Ventas </h1>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-danger float-right" onclick="generar_grafica('ULTIMO_MES')">Ultimo mes</button>
                    <button class="btn btn-secondary float-right" onclick="generar_grafica('ULTIMA_SEMANA')">Ultima Semana</button>
                    <button class="btn btn-primary float-right" onclick="generar_grafica('ULTIMO_DIA')">Ultimo dia</button>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-md-12">
                        <canvas id="myChart" width="100" height="100"></canvas>
                    </div>
                </div>

                <script>
                    const ctx = document.getElementById('myChart').getContext('2d');

                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {},
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });

                    function generar_grafica(periodo) {
                        $.ajax({
                            url: "/venta/grafica",
                            data: {
                                periodo: periodo
                            },
                            method: "POST",
                            datatype: "json",
                            success: function(response) {


                                var Ventas = response.Ventas;

                                var dias = [];
                                var totales = [];
                                for(var i = 0; i<Ventas.length; i++){
                                    dias.push(Ventas[i].fecha_venta);
                                    totales.push(Ventas[i].total)
                                }

                                myChart.data = {
                                        labels: dias,
                                        datasets: [{
                                            label: ' Precio de Ventas',
                                            data: totales,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(255, 206, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(255, 159, 64, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgba(255, 99, 132, 1)',
                                                'rgba(54, 162, 235, 1)',
                                                'rgba(255, 206, 86, 1)',
                                                'rgba(75, 192, 192, 1)',
                                                'rgba(153, 102, 255, 1)',
                                                'rgba(255, 159, 64, 1)'
                                            ],
                                            borderWidth: 2
                                        }]
                                    },

                                    myChart.update();

                            },
                            error: function(response) {
                                console.log(response)

                            }
                        });
                    }
                </script>
            </div>
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
            @endsection('content')