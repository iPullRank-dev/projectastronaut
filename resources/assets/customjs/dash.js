$(document).ready(function() {
//chart functions

    
    
    
Chart.defaults.global.responsive = true;
Chart.defaults.global.maintainAspectRatio = false;

var data = {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [65, 59, 80, 81, 56, 55, 40]
        },
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

window.myLineChart = new Chart(document.getElementById("myChart").getContext("2d")).Line(data, {
        responsive: true,
        tooltipCornerRadius: 0
      });
    


//table functions


  $('#table-newcontact').dataTable( {
    "iDisplayLength": 4,
        "ordering": false,
        "info":     false,
      "filter":   false,
      "bLengthChange": false, 
      
  } );
    
    

//add row

    
} )