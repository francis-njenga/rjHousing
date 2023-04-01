// SIDEBAR TOGGLE

var sidebarOpen = false;
var sidebar = document.getElementById("sidebar");

function openSidebar() {
  if(!sidebarOpen) {
    sidebar.classList.add("sidebar-responsive");
    sidebarOpen = true;
  }
}

function closeSidebar() {
  if(sidebarOpen) {
    sidebar.classList.remove("sidebar-responsive");
    sidebarOpen = false;
  }
}


// var barChartOptions = {
//   series: [{
//     data: [10, 8, 6, 4, 2]
//   }],
//   chart: {
//     type: 'bar',
//     height: 350,
//     toolbar: {
//       show: false
//     },
//   },
//   colors: [
//     "#246dec",
//     "#cc3c43",
//     "#367952",
//     "#f5b74f",
//     "#4f35a1"
//   ],
//   plotOptions: {
//     bar: {
//       distributed: true,
//       borderRadius: 4,
//       horizontal: false,
//       columnWidth: '40%',
//     }
//   },
//   dataLabels: {
//     enabled: false
//   },
//   legend: {
//     show: false
//   },
//   xaxis: {
//     categories: ["agent 1", "agent 2", "agent 3", "agent 4", "agent 5"],
//   },
//   yaxis: {
//     title: {
//       text: "Count"
//     }
//   }
// };

// var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
// barChart.render();



// var areaChartOptions = {
//   series: [{
//     name: 'registered users',
//     data: [31, 40, 28, 51, 42, 109, 100]
//   }, {
//     name: 'registered agents',
//     data: [11, 32, 45, 32, 34, 52, 41]
//   }],
//   chart: {
//     height: 350,
//     type: 'area',
//     toolbar: {
//       show: false,
//     },
//   },
//   colors: ["#4f35a1", "#246dec"],
//   dataLabels: {
//     enabled: false,
//   },
//   stroke: {
//     curve: 'smooth'
//   },
//   labels: ["registration time date" ],
//   markers: {
//     size: 0
//   },
//   yaxis: [
//     {
//       title: {
//         text: 'Registered Users',
//       },
//     },
//     {
//       opposite: true,
//       title: {
//         text: 'Registered Agents',
//       },
//     },
//   ],
//   tooltip: {
//     shared: true,
//     intersect: false,
//   }
// };

// var areaChart = new ApexCharts(document.querySelector("#area-chart"), areaChartOptions);
// areaChart.render();

