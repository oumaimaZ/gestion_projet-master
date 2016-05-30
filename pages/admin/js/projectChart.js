
$(document).ready(function(){

  $.ajax({
    url: 'ajax/getDataOfProjectChart.php',
    method: 'GET',
    dataType: 'json',
    success: function(data){
      var dataSet = {
        labels: ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "août", "septembre", "octobre", "novembre", "decembre"],
        datasets: [
        {
          label: "Mes projets",
          backgroundColor: "rgba(255,99,132,0.2)",
          borderColor: "rgba(255,99,132,1)",
          borderWidth: 1,
          hoverBackgroundColor: "rgba(255,99,132,0.4)",
          hoverBorderColor: "rgba(255,99,132,1)",
          data: data,
        }
        ]
      };

      var myBarChart = new Chart($('#projects_chart')[0].getContext('2d'), {
        height:300,
        type: 'bar',
        data: dataSet
      });
    }
  });

});