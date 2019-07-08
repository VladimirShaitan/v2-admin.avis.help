/* globals Chart:false, feather:false */


  feather.replace();

  var ctx = document.getElementById('myChart')
  var myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: [
        ''
      ],
      datasets: [{
        data: [
          0
        ],
        lineTension: 0.4,
        backgroundColor: 'transparent',
        borderColor: '#ce5e5e',
        borderWidth: 4,
        pointBackgroundColor: '#ce5e5e'
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: false
          }
        }]
      },
      legend: {
        display: false
      }
    }
  })