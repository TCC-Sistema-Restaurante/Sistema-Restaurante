google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ["Task", "Hours per Day"],
    ["Work", 11],
    ["Eat", 2],
    ["Commute", 2],
    ["Watch TV", 2],
    ["Sleep", 7],
  ]);

  var options = {
    // title: "My Daily Activities",
    legend: "bottom",
    width: 800,
    height: 400,
    responsive: true,
    // backgroundColor: {
    //     fill:'gray'
    //     }
  };

  var chart = new google.visualization.PieChart(
    document.getElementById("piechart")
  );

  var barchart_options = {
    // title: "Barchart: How Much Pizza I Ate Last Night",
    width: 800,
    height: 400,
    responsive: true,
    legend: "none",
  };
  var barchart = new google.visualization.BarChart(
    document.getElementById("barchart")
  );
  barchart.draw(data, barchart_options);

  chart.draw(data, options);
}
