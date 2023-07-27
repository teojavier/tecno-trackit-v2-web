@extends('layouts.sidebar')

@section('content')
    <main>

        <div class="flex flex-col md:flex-row">

            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
            <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
            <!--Replace with your tailwind.css once created-->
            <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
            <!--Totally optional :) -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
                integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>


            <section>
                <div id="main" class="main-content flex-1 bg-dark mt-12 md:mt-2 pb-24 md:pb-5">

                    <div class="pt-3">
                        <div class="rounded-tl-3xl bg-gradient-to-r p-4 shadow text-2xl text-primary">
                            <h1 class="font-bold pl-2">Reportes</h1>
                        </div>
                    </div>

                    <div class="flex flex-wrap text-black">
                        <div class="w-full md:w-1/2 xl:w-1/4 p-6">
                            <!--Metric Card-->
                            <div
                                class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-green-600"><i
                                                class="fa fa-wallet fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-sm text-gray-600">Total Solicitudes</h2>
                                        <p class="font-bold text-lg">{{ $solicitudes }} <span class="text-green-500"><i
                                                    class="fas fa-caret-up"></i></span></p>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/4 p-6">
                            <!--Metric Card-->
                            <div
                                class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-pink-600"><i
                                                class="fas fa-users fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-sm text-gray-600">Total Usuarios</h2>
                                        <p class="font-bold text-lg">{{ $users }} <span class="text-pink-500"><i
                                                    class="fas fa-exchange-alt"></i></span></p>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/4 p-6">
                            <!--Metric Card-->
                            <div
                                class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-yellow-600"><i
                                                class="fas fa-user-plus fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-sm text-gray-600">Total Recomend</h2>
                                        <p class="font-bold text-lg">{{ $recomendaciones }} <span class="text-yellow-600"><i
                                                    class="fas fa-caret-up"></i></span></p>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/4 p-6">
                            <!--Metric Card-->
                            <div
                                class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-blue-600"><i
                                                class="fas fa-server fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-sm text-gray-600">Total Reclamos</h2>
                                        <p class="font-bold text-lg">{{ $reclamos }}</p>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/4 p-6">
                            <!--Metric Card-->
                            <div
                                class="bg-gradient-to-b from-indigo-200 to-indigo-100 border-b-4 border-indigo-500 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-indigo-600"><i
                                                class="fas fa-tasks fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-sm text-gray-600">Total Aceptados</h2>
                                        <p class="font-bold text-lg">{{ $aceptados }}</p>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                        <div class="w-full md:w-1/2 xl:w-1/4 p-6">
                            <!--Metric Card-->
                            <div
                                class="bg-gradient-to-b from-red-200 to-red-100 border-b-4 border-red-500 rounded-lg shadow-xl p-5">
                                <div class="flex flex-row items-center">
                                    <div class="flex-shrink pr-4">
                                        <div class="rounded-full p-5 bg-red-600"><i
                                                class="fas fa-inbox fa-2x fa-inverse"></i></div>
                                    </div>
                                    <div class="flex-1 text-right md:text-center">
                                        <h2 class="font-bold uppercase text-sm text-gray-600">Total Finalizados</h2>
                                        <p class="font-bold text-lg">{{ $finalizados }} <span class="text-red-500"><i
                                                    class="fas fa-caret-up"></i></span></p>
                                    </div>
                                </div>
                            </div>
                            <!--/Metric Card-->
                        </div>
                    </div>

                    <?php
                    $data = $results;
                    $decodedData = json_decode($data, true);
                    
                    $labels = [];
                    $data = [];
                    
                    foreach ($decodedData as $item) {
                        $labels[] = $item['tipo'];
                        $data[] = $item['contador'];
                    }


                    $data2 = $results2;
                    $decodedData2 = json_decode($data2, true);
                    
                    $labels2 = [];
                    $data2 = [];
                    
                    foreach ($decodedData2 as $item) {
                        $labels2[] = $item['departamento'];
                        $data2[] = $item['contador'];
                    }


                    $data3 = $results3;
                    $decodedData3 = json_decode($data3, true);
                    
                    $labels2 = [];
                    $data3 = [];
                    
                    foreach ($decodedData3 as $item) {
                        $labels3[] = $item['soporte'];
                        $data3[] = $item['contador'];
                    }

                    $data4 = $results4;
                    $decodedData4 = json_decode($data4, true);
                    
                    $labels4 = [];
                    $data4 = [];
                    
                    foreach ($decodedData4 as $item) {
                        $labels4[] = $item['name'];
                        $data4[] = $item['contador'];
                    }
                    ?>

                    <div class="flex flex-row flex-wrap flex-grow mt-2">

                        <div class="w-full md:w-1/2 p-6">
                            <!--Graph Card-->
                            <div class="bg-white border-transparent rounded-lg shadow-xl">
                                <div
                                    class="bg-gradient-to-b bg-primary uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                    <h class="font-bold uppercase text-sm text-white">Cantidad de mensajeria por tipo</h>
                                </div>
                                <div class="p-5">
                                    <canvas id="chartjs-7" class="chartjs" width="undefined" height="undefined"></canvas>
                                    <script>
                                        new Chart(document.getElementById("chartjs-7"), {
                                            "type": "bar",
                                            "data": {
                                                "labels": <?php echo json_encode($labels); ?>,
                                                "datasets": [{
                                                    "label": "Contador",
                                                    "data": <?php echo json_encode($data); ?>,
                                                    "backgroundColor": "rgba(255, 99, 132, 0.2)",
                                                    "borderColor": "rgb(255, 99, 132)",
                                                    "borderWidth": 1
                                                }]
                                            },
                                            "options": {
                                                "scales": {
                                                    "yAxes": [{
                                                        "ticks": {
                                                            "beginAtZero": true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                            <!--/Graph Card-->
                        </div>

                        <div class="w-full md:w-1/2  p-6">
                            <!--Graph Card-->
                            <div class="bg-white border-transparent rounded-lg shadow-xl">
                                <div
                                    class="bg-gradient-to-b bg-primary uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                    <h2 class="font-bold uppercase text-sm text-white">Mensajeria por departamento</h2>
                                </div>
                                <div class="p-5">
                                    <canvas id="chartjs-0" class="chartjs" width="undefined" height="undefined"></canvas>
                                    <script>
                                        new Chart(document.getElementById("chartjs-0"), {
                                            "type": "line",
                                            "data": {
                                                "labels": <?php echo json_encode($labels2); ?>,
                                                "datasets": [{
                                                    "label": "Views",
                                                    "data": <?php echo json_encode($data2); ?>,
                                                    "fill": false,
                                                    "borderColor": "rgb(75, 192, 192)",
                                                    "lineTension": 0.1
                                                }]
                                            },
                                            "options": {}
                                        });
                                    </script>
                                </div>
                            </div>
                            <!--/Graph Card-->
                        </div>

                        <div class="w-full md:w-1/2  p-6">
                            <!--Graph Card-->
                            <div class="bg-white border-transparent rounded-lg shadow-xl">
                                <div
                                    class="bg-gradient-to-b bg-primary uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                    <h2 class="font-bold uppercase text-sm text-white">Nro de solicitud por soporte</h2>
                                </div>
                                <div class="p-5">
                                    <canvas id="chartjs-1" class="chartjs" width="undefined" height="undefined"></canvas>
                                    <script>
                                        new Chart(document.getElementById("chartjs-1"), {
                                            "type": "bar",
                                            "data": {
                                                "labels": <?php echo json_encode($labels3); ?>,
                                                "datasets": [{
                                                    "label": "Likes",
                                                    "data": <?php echo json_encode($data3); ?>,
                                                    "fill": false,
                                                    "backgroundColor": ["rgba(255, 99, 132, 0.2)", "rgba(255, 159, 64, 0.2)",
                                                        "rgba(255, 205, 86, 0.2)", "rgba(75, 192, 192, 0.2)", "rgba(54, 162, 235, 0.2)",
                                                        "rgba(153, 102, 255, 0.2)", "rgba(201, 203, 207, 0.2)"
                                                    ],
                                                    "borderColor": ["rgb(255, 99, 132)", "rgb(255, 159, 64)", "rgb(255, 205, 86)",
                                                        "rgb(75, 192, 192)", "rgb(54, 162, 235)", "rgb(153, 102, 255)",
                                                        "rgb(201, 203, 207)"
                                                    ],
                                                    "borderWidth": 1
                                                }]
                                            },
                                            "options": {
                                                "scales": {
                                                    "yAxes": [{
                                                        "ticks": {
                                                            "beginAtZero": true
                                                        }
                                                    }]
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                            <!--/Graph Card-->
                        </div>

                        <div class="w-full md:w-1/2  p-6">
                            <!--Graph Card-->
                            <div class="bg-white border-transparent rounded-lg shadow-xl">
                                <div
                                    class="bg-gradient-to-b bg-primary uppercase text-gray-800 border-b-2 border-gray-300 rounded-tl-lg rounded-tr-lg p-2">
                                    <h5 class="font-bold uppercase text-sm text-white">Nro de mensajeria por categoria</h5>
                                </div>
                                <div class="p-5"><canvas id="chartjs-4" class="chartjs" width="undefined"
                                        height="undefined"></canvas>
                                    <script>
                                        new Chart(document.getElementById("chartjs-4"), {
                                            "type": "doughnut",
                                            "data": {
                                                "labels": <?php echo json_encode($labels4); ?>,
                                                "datasets": [{
                                                    "label": "Issues",
                                                    "data": <?php echo json_encode($data4); ?>,
                                                    "backgroundColor": ["rgb(255, 99, 132)", "rgb(54, 162, 235)", "rgb(255, 205, 86)"]
                                                }]
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                            <!--/Graph Card-->
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </main>




    <script>
        /*Toggle dropdown list*/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        /*Filter dropdown options*/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>
@endsection
