$(document).ready(function() {
//chart functions

var n = gadata.rows.length;
var gdate = [];
var gConversion = [];
var gSessions = [];
var gConversion2 = [];
    
//console.log(gadata.conversionRows);    
    
for(var i = 0; i < n; i++){
    gdate[i] = gadata.rows[i][0];
    gConversion[i] = gadata.conversionRows[i][1];
    gSessions[i] = gadata.rows[i][1];  
    gConversion2[i] = gadata.conversionRows2[i][1];
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
        },
        {
            label: "My Second dataset",
            fillColor: "rgba(221,104,104,0.2)",
            strokeColor: "rgba(221,104,104,1)",
            pointColor: "rgba(221,104,104,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: gConversion2
        }
    ]
};

window.myLineChart = new Chart(document.getElementById("testChart").getContext("2d")).Line(data, {
        responsive: true,
        tooltipCornerRadius: 0
      });
    


//url modal
    
  

    
    
    
    
    
} )