$(document).ready(function() {
//chart functions

Chart.defaults.global.maintainAspectRatio = false;


var data = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
    
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [28, 48, 40, 19, 86, 27, 90]
        }
    ]
};

window.myLineChart = new Chart(document.getElementById("contactChart1").getContext("2d")).Line(data, {
        responsive: true,
        tooltipCornerRadius: 0
      });

var data = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
    
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: [11, 12, 18, 21, 22, 27, 35]
        }
    ]
};
    
    
window.myLineChart = new Chart(document.getElementById("contactChart2").getContext("2d")).Line(data, {
        responsive: true,
        tooltipCornerRadius: 0
      });
    


//table functions

    
    

//add row

    
} )