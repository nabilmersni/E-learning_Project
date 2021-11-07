let lineGraph = document.querySelector(".line-graph");

// Options
const lineGrapOptions = {
  aspectRatio: 2.5,
  scales: {
    yAxes: [
      {
        gridLines: {
          display: false,
        },
        ticks: {
          beginAtZero: false,
          padding: 12,
          callback: function (value) {
            return value + " TND";
          },
        },
      },
    ],
    xAxes: [
      {
        ticks: {
          padding: 12,
        },
        gridLines: {
          display: false,
        },
      },
    ],
  },
  legend: {
    display: false,
  },
};
const myChart = new Chart(lineGraph, {
  type: "line",
  data: {
    labels: [
      "Jan",
      "Feb",
      "Mar",
      "Apr",
      "May",
      "June",
      "jul",
      "Aug",
      "Sep",
      "Oct",
      "Nov",
      "Dec",
    ],
    datasets: [
      {
        data: [
          650, 710, 420, 230, 950, 1250, 2550, 1200, 1300, 850, 1550, 1200,
        ],
        borderColor: "rgba(255,117,92,1)",
        pointBorderColor: "rgba(255,255,255,1)",
        pointBackgroundColor: "rgba(255,255,255,1)",
        borderWidth: 3,
        fill: false,
      },
    ],
  },
  options: lineGrapOptions,
});
