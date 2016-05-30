
$(document).ready(function(){

  $.ajax({
    url: 'ajax/getDataOfTacheChart.php',
    method: 'GET',
    dataType: 'json',
    success: function(data){
      var dataSet = {
        labels: [
        "A venir",
        "En retard"
        ],
        datasets: [
        {
          data: [data.current, data.unfinished],
          backgroundColor: [
          "#FF6384",
          "#36A2EB"
          ],
          hoverBackgroundColor: [
          "#FF6384",
          "#36A2EB"
          ]
        }]
      };

      var myPieChart = new Chart($('#tache_chart')[0].getContext('2d'),{
        type: 'pie',
        data: dataSet
      });
    }
  });

});