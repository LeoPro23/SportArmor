@extends('plantilla.plantilla')

@section('contenido')
<div class="container mx-auto p-4">
    <!-- Selector de Rango de Fechas -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Inteligencia de Negocios</h2>
        <div class="relative">
            <button id="dropdownDefaultButton"
                data-dropdown-toggle="lastDaysdropdown"
                data-dropdown-placement="bottom"
                class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
                type="button">
                Selecciona rango
                <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                </svg>
            </button>
            <div id="lastDaysdropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                    <li><a href="#" data-range="all" class="range-option block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Desde el principio</a></li>
                    <li><a href="#" data-range="year" class="range-option block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Último año</a></li>
                    <li><a href="#" data-range="semester" class="range-option block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Último semestre</a></li>
                    <li><a href="#" data-range="month" class="range-option block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Último mes</a></li>
                    <li><a href="#" data-range="7days" class="range-option block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Últimos 7 días</a></li>
                    <li><a href="#" data-range="day" class="range-option block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Último día</a></li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Gráficas -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Gráfica 1: Valoraciones del Chat (Pie Chart) -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Distribución de Valoraciones</h3>
            <div id="pie-chart"></div>
        </div>

        <!-- Gráfica 2: Tiempos de Respuesta Promedio (Line Chart) -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Tiempos de Respuesta Promedio</h3>
            <div id="line-chart"></div>
        </div>

        <!-- Gráfica 3: Tasa de Conversión (Bar Chart) -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Tasa de Conversión</h3>
            <div id="bar-chart"></div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<!-- Incluir ApexCharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
    let chartValuations;
    let chartResponseTimes;
    let chartConversionRates;

    // Opciones para la Gráfica Pie (Valoraciones)
  const getPieOptions = (labels = [], series = []) => {
      return {
          series: series,
          colors: ["#1C64F2", "#16BDCA", "#9061F9", "#F59E0B", "#EF4444"],
          chart: {
              height: 350,
              type: "pie",
          },
          stroke: {
              colors: ["white"],
              width: 2,
          },
          labels: labels,
          dataLabels: {
              enabled: true,
              formatter: function (val, opts) {
                  return opts.w.globals.series[opts.seriesIndex] > 0 ? val.toFixed(1) + "%" : "";
              },
              style: {
                  fontFamily: "Inter, sans-serif",
                  colors: ['#fff']
              },
              dropShadow: {
                  enabled: false,
              }
          },
          legend: {
              position: "bottom",
              labels: {
                  colors: ['#000'],
              }
          },
          tooltip: {
              y: {
                  formatter: function (val) {
                      return val
                  }
              }
          },
          responsive: [{
              breakpoint: 600,
              options: {
                  chart: {
                      height: 300
                  },
                  legend: {
                      position: "bottom",
                      labels: {
                          colors: ['#000'],
                      }
                  }
              }
          }]
      }
  }


    // Opciones para la Gráfica de Línea (Tiempos de Respuesta)
    const getLineOptions = (labels = [], seriesData = []) => {
        return {
            chart: {
                type: 'line',
                height: 350,
                toolbar: {
                    show: true
                },
                zoom: {
                    enabled: true
                }
            },
            colors: ['#1C64F2'],
            series: seriesData,
            xaxis: {
                categories: labels,
                labels: {
                    style: {
                        colors: ['#000'],
                        fontSize: '12px',
                        fontFamily: 'Inter, sans-serif'
                    }
                },
                title: {
                    text: 'Fecha',
                    style: {
                        color: '#000',
                        fontSize: '14px',
                        fontFamily: 'Inter, sans-serif'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: ['#000'],
                        fontSize: '12px',
                        fontFamily: 'Inter, sans-serif'
                    }
                },
                title: {
                    text: 'Tiempo (segundos)',
                    style: {
                        color: '#000',
                        fontSize: '14px',
                        fontFamily: 'Inter, sans-serif'
                    }
                }
            },
            tooltip: {
                theme: 'light',
                x: {
                    format: 'dd/MM/yyyy'
                }
            },
            legend: {
                show: false
            },
            dataLabels: {
                enabled: false
            },
            responsive: [{
                breakpoint: 600,
                options: {
                    chart: {
                        height: 300
                    }
                }
            }]
        }
    }

    // Opciones para la Gráfica de Barras (Tasa de Conversión)
  const getBarOptions = (labels = [], seriesData = []) => {
      return {
          chart: {
              type: 'bar',
              height: 350,
              toolbar: {
                  show: true
              },
              zoom: {
                  enabled: true
              }
          },
          colors: ['#16BDCA'],
          plotOptions: {
              bar: {
                  horizontal: false,
                  columnWidth: '55%',
                  endingShape: 'rounded'
              },
          },
          series: seriesData,
          xaxis: {
              categories: labels,
              labels: {
                  style: {
                      colors: ['#000'],
                      fontSize: '12px',
                      fontFamily: 'Inter, sans-serif'
                  }
              },
              title: {
                  text: 'Categoría',
                  style: {
                      color: '#000',
                      fontSize: '14px',
                      fontFamily: 'Inter, sans-serif'
                  }
              }
          },
          yaxis: {
              labels: {
                  style: {
                      colors: ['#000'],
                      fontSize: '12px',
                      fontFamily: 'Inter, sans-serif'
                  }
              },
              title: {
                  text: '%',
                  style: {
                      color: '#000',
                      fontSize: '14px',
                      fontFamily: 'Inter, sans-serif'
                  }
              },
              max: 100
          },
          tooltip: {
              y: {
                  formatter: function (val) {
                      return val + "%"
                  }
              }
          },
          dataLabels: {
              enabled: true,
              formatter: function (val) {
                  return val + "%";
              },
              style: {
                  colors: ['#000'],
                  fontSize: '12px',
                  fontFamily: 'Inter, sans-serif'
              }
          },
          legend: {
              show: false
          },
          responsive: [{
              breakpoint: 600,
              options: {
                  chart: {
                      height: 300
                  },
                  plotOptions: {
                      bar: {
                          columnWidth: '70%',
                      }
                  },
              }
          }]
      }
  }


    // Función para cargar y renderizar la Gráfica Pie (Valoraciones)
    function fetchChartValuations(range) {
        return fetch("{{ route('graficasbi.chart.chatValuations') }}?range=" + range)
            .then(res => res.json())
            .then(data => {
                if (chartValuations) chartValuations.destroy();
                chartValuations = new ApexCharts(document.getElementById("pie-chart"), getPieOptions(data.labels, data.series));
                chartValuations.render();
            })
            .catch(error => console.error("Error al cargar Valoraciones:", error));
    }

    // Función para cargar y renderizar la Gráfica de Línea (Tiempos de Respuesta)
    function fetchResponseTimes(range) {
        return fetch("{{ route('graficasbi.chart.responseTimes') }}?range=" + range)
            .then(res => res.json())
            .then(data => {
                if (chartResponseTimes) chartResponseTimes.destroy();
                chartResponseTimes = new ApexCharts(document.getElementById("line-chart"), getLineOptions(data.labels, data.series));
                chartResponseTimes.render();
            })
            .catch(error => console.error("Error al cargar Tiempos de Respuesta:", error));
    }

    // Función para cargar y renderizar la Gráfica de Barras (Tasa de Conversión)
    function fetchConversionRates(range) {
        return fetch("{{ route('graficasbi.chart.conversionRates') }}?range=" + range)
            .then(res => res.json())
            .then(data => {
                if (chartConversionRates) chartConversionRates.destroy();
                chartConversionRates = new ApexCharts(document.getElementById("bar-chart"), getBarOptions(data.labels, data.series));
                chartConversionRates.render();
            })
            .catch(error => console.error("Error al cargar Tasa de Conversión:", error));
    }

    // Función para actualizar todas las gráficas
    function updateCharts(range) {
        Promise.all([
            fetchChartValuations(range),
            fetchResponseTimes(range),
            fetchConversionRates(range)
        ]).catch(err => console.error("Error al actualizar las gráficas:", err));
    }

    // Cargar por defecto
    updateCharts('all');

    // Evento para el selector de rango
    document.querySelectorAll('.range-option').forEach(option => {
        option.addEventListener('click', (e) => {
            e.preventDefault();
            const range = option.getAttribute('data-range');
            updateCharts(range);
        });
    });
</script>

<!-- Estilos para la leyenda -->
<style>
    .apexcharts-legend {
        background: #ffffff !important;
        padding: 10px;
        border-radius: 5px;
    }

    .apexcharts-legend-text {
        color: #000000 !important;
    }

    /* Ajustes adicionales para mejorar la legibilidad en modo oscuro */
    body.dark .apexcharts-legend {
        background: #2d3748 !important; /* Fondo más claro para contraste */
    }

    body.dark .apexcharts-legend-text {
        color: #ffffff !important;
    }
</style>
@endsection
