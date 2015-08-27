$(document).ready(function() {
//chart functions


console.log(gadata);
var n = gadata.rows.length;
var gdate = [];
var gConversion = [];
var gSessions = [];
    
for(var i = 0; i < n; i++){
    gdate[i] = gadata.rows[i][0];
    gConversion[i] = gadata.rows[i][1];
    gSessions[i] = gadata.rows[i][2];  
};

console.log(gdate);
console.log('aaa' + n);    
    
Chart.defaults.global.responsive = true;
Chart.defaults.global.maintainAspectRatio = false;

var data = {
    labels: gdate,
    datasets: [
        {
            label: "My First dataset",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: gSessions
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: gConversion
        }
    ]
};

window.myLineChart = new Chart(document.getElementById("myChart").getContext("2d")).Line(data, {
        responsive: true,
        tooltipCornerRadius: 0
      });
    


//table functions


  $('#table-newcontact').dataTable( {
        "ordering": false,
        "info":     false,
      "filter":   false,
      "bLengthChange": false,
        "scrollY":        "200px",
        "scrollCollapse": true,
        "paging":         false
      
  } );
    
    

//add row

    
} )