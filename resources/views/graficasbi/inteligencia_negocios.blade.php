@extends('plantilla.plantilla')

@section('contenido')
<div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6 mt-10">
  <div class="flex justify-between items-start w-full">
      <div class="flex-col items-center">
        <div class="flex items-center mb-1">
            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Valoraciones del Chat</h5>
            <svg data-popover-target="chart-info" data-popover-placement="bottom" class="w-3.5 h-3.5 text-gray-500 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white cursor-pointer ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
              <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm0 16a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3Zm1-5.034V12a1 1 0 0 1-2 0v-1.418a1 1 0 0 1 1.038-.999 1.436 1.436 0 0 0 1.488-1.441 1.501 1.501 0 1 0-3-.116.986.986 0 0 1-1.037.961 1 1 0 0 1-.96-1.037A3.5 3.5 0 1 1 11 11.466Z"/>
            </svg>
            <div data-popover id="chart-info" role="tooltip" class="absolute z-10 invisible inline-block text-sm text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                <div class="p-3 space-y-2">
                    <h3 class="font-semibold text-gray-900 dark:text-white">Distribución de Valoraciones</h3>
                    <p>Esta gráfica muestra cómo se han distribuido las valoraciones (1 a 5 estrellas) asignadas a los chats en el rango de fechas seleccionado.</p>
                    <p>Utiliza este reporte para entender la satisfacción del usuario con el chatbot a lo largo del tiempo.</p>
                </div>
                <div data-popper-arrow></div>
            </div>
        </div>
      </div>

      <!-- Aquí podrías implementar un date picker avanzado si lo deseas.
           Por simplicidad, usaremos un dropdown con opciones predefinidas. -->
      <button id="dropdownDefaultButton"
        data-dropdown-toggle="lastDaysdropdown"
        data-dropdown-placement="bottom"
        class="text-sm font-medium text-gray-500 dark:text-gray-400 hover:text-gray-900 text-center inline-flex items-center dark:hover:text-white"
        type="button">
        Selecciona rango
        <svg class="w-2.5 m-2.5 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
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

  <!-- Pie Chart -->
  <div class="py-6" id="pie-chart"></div>

</div>

@endsection

@section('scripts')
<!-- Asegúrate de incluir ApexCharts -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
  let chart;

  const getChartOptions = (labels = [], series = []) => {
    return {
      series: series,
      colors: ["#1C64F2", "#16BDCA", "#9061F9", "#F59E0B", "#EF4444"], // 5 colores
      chart: {
        height: 420,
        width: "100%",
        type: "pie",
      },
      stroke: {
        colors: ["white"],
        lineCap: "",
      },
      labels: labels,
      dataLabels: {
        enabled: true,
        style: {
          fontFamily: "Inter, sans-serif",
        },
      },
      legend: {
        position: "bottom",
        floating: false,
        fontFamily: "Inter, sans-serif",
        labels: {
          colors: ['#000'],
        }
      },
    }
  }

  function fetchChartData(range) {
  fetch("{{ route('graficasbi.chart.chatValuations') }}?range=" + range)
    .then(response => response.json())
    .then(data => {
      console.log("Data recibida:", data);
      const { labels, series } = data;

      // Destruir el gráfico si ya existe
      if (chart) {
        chart.destroy();
      }

      // Crear un nuevo gráfico con los datos recién obtenidos
      chart = new ApexCharts(document.getElementById("pie-chart"), getChartOptions(labels, series));
      chart.render();
    })
    .catch(error => console.error("Error en la petición fetch:", error));
}

  // Por defecto, mostrar "desde el principio"
  fetchChartData('all');

  document.querySelectorAll('.range-option').forEach(option => {
    option.addEventListener('click', (e) => {
      e.preventDefault();
      const range = option.getAttribute('data-range');
      fetchChartData(range);
    });
  });
</script>

<style>
  .apexcharts-legend {
    background: #ffffff !important;
    padding: 10px;
    border-radius: 5px;
  }

  .apexcharts-legend-text {
    color: #000000 !important;
  }
</style>

@endsection