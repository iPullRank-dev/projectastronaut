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


var data1 = {
    labels: gdate,
    datasets: [
    
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

window.myLineChart = new Chart(document.getElementById("contactChart1").getContext("2d")).Line(data1, {
        responsive: true,
        tooltipCornerRadius: 0
      });

var data2 = {
    labels: gdate,
    datasets: [
    
        {
            label: "My Second dataset",
            fillColor: "rgba(151,187,205,0.2)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(151,187,205,1)",
            data: gSessions
        }
    ]
};
    
    
window.myLineChart = new Chart(document.getElementById("contactChart2").getContext("2d")).Line(data2, {
        responsive: true,
        tooltipCornerRadius: 0
      });
    


//table functions

    
    

//add row

    
} )