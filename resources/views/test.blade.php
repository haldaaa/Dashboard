

@extends ('layout')


@section ('contenu')


<p> Page de test </p>

<div class="container">
    <canvas id="bar-chart" width="400" height="400"></canvas>
</div>

@php

@endphp


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script src="https://unpkg.com/@popperjs/core@2"> </script>
<!-- VueJS2 et Vuetify -->

<script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.js"></script>


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
