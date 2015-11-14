$(document).ready(function() {
//chart functions

var n = gadata.rows.length;
var gdate = [];
var gConversion = [];
var gSessions = [];
    
for(var i = 0; i < n; i++){
    gdate[i] = gadata.rows[i][0];
    gConversion[i] = gadata.rows[i][1];
    gSessions[i] = gadata.rows[i][2];  
};
    
Chart.defaults.global.responsive = true;
Chart.defaults.global.maintainAspectRatio = false;
    
    
var data = {
    labels: gdate,
    datasets: [
    
        {
            label: "My Second dataset",
            fillColor: "rgba(49,157,181,0.2)",
            strokeColor: "rgba(49,157,181,1)",
            pointColor: "rgba(49,157,181,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: gadata.new
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(24,166,137,0.2)",
            strokeColor: "rgba(24,166,137,1)",
            pointColor: "rgba(24,166,137,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: gSessions
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(165,139,211,0.2)",
            strokeColor: "rgba(165,139,211,1)",
            pointColor: "rgba(165,139,211,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: gConversion
        }
    ]
};

window.myLineChart = new Chart(document.getElementById("testChart").getContext("2d")).Line(data, {
        responsive: true,
        tooltipCornerRadius: 0
      });
    


//url modal
    
  

    
    
    
    
    
} )