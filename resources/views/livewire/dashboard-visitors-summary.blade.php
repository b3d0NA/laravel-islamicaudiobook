<div class="flex flex-row col-span-2 p-0 my-10 overflow-hidden card lg:col-span-1 lg:flex-col">

    <!-- right -->
    <div class="w-8/12 lg:w-full lg:mb-5">

        <!-- top -->
        <div class="flex flex-row flex-wrap items-center justify-between p-5">
            <h2 class="text-lg font-bold">Visitors Summary</h2>
            <div class="flex flex-row items-center justify-center">
            <button wire:click="$set('filter', 'today')" @class([
                "block py-2 mr-4 text-sm btn",
                    "btn-shadow" => $filter == 'today'
                ])>today</button>
                <button wire:click="$set('filter', 'month')" @class([
                    "block py-2 mr-4 text-sm btn",
                        "btn-shadow" => $filter == 'month'
                    ])>month</button>
                <button wire:click="$set('filter', 'year')" @class([
                    "block py-2 mr-4 text-sm btn",
                        "btn-shadow" => $filter == 'year'
                    ])>year</button>

            </div>
        </div>
        <!-- end top -->

        <!-- chart -->
        <div id="SummaryChart"></div>
        <!-- end chart -->

    </div>
</div>


@push("custom-scripts")
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
window.addEventListener("DOMContentLoaded", function() {
    Livewire.emit("jsLoaded");
});
window.addEventListener('summaryUpdate', response => {
    chartValue = JSON.parse(response.detail)
    var options = {
    chart: {
    //   height: 280,
      width: '100%',
      type: "area",
      toolbar: {
        show: false,
       },
    },
    grid: {
        show: false,
        padding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
        }
    },
    dataLabels: {
      enabled: false
    },
    legend: {
        show: false,
    },
    series: [
    {
        name: "Visitors",
        data: chartValue.values,
    }
    ],
    fill: {
      type: "gradient",
      gradient: {
        shadeIntensity: 1,
        opacityFrom: 0.9,
        opacityTo: 0.7,
        stops: [0,90, 100]
      },
      colors: ['#4fd1c5'],
    },
    stroke:{
        colors: ['#4fd1c5'],
        width: 3
    },
    yaxis: {
        show: false,
    },
    xaxis: {
      categories: chartValue.categories,
      axisBorder: {
        show: true,
      },
      tooltip: {
          enabled: false,
      },

    },

  };

    var SummaryChart =  document.getElementById("SummaryChart");

  if (SummaryChart != null && typeof(SummaryChart) != 'undefined') {
    var chart = new ApexCharts(document.querySelector("#SummaryChart"), options);
    chart.render();
  }
})
</script>
@endpush
