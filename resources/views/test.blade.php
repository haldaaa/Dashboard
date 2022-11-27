

@extends ('layout')


@section ('contenu')


<p> Page de test </p>

<div class="container">
  <div class="row">
    <div class="col-md-5">
    <canvas id="bar-chart" width="400" height="400"> Les plus gros clients </canvas>
    </div>
  </div>
</div>





<!-- ChartJS -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

      var labels =  {{ Js::from($record_key) }};
      var users =  {{ Js::from($record_values) }};

    //console.log(Object.values(users));



console.log(typeof nom_commercial);
console.log('va tu afficher');
console.log('testgit');
console.log(typeof variabletest);


  new Chart(document.getElementById("bar-chart"), {
      type: 'bar',
      data: {
        labels: Object.values(users),
        datasets: [
          {
            label: "Bénéfices (Euros)",
            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
            data: Object.values(labels),
          }
        ]
      },
      options: {
        legend: { display: false },
        title: {
          display: true,
          text: 'Predicted world population (millions) in 2050'
        }
      }
  });

  </script>

  @endsection
