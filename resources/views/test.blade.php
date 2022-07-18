

@extends ('layout')


@section ('contenu')


<p> Page de test </p>
<canvas id="bar-chart" width="400" height="400"></canvas>


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

  var datajson = '<?php echo $data;?>';

  console.log(datajson.label);

  const variabletest = {
    'React': 185134,
    'Vue': 195514,
    'Angular': 80460,
    'Svelte': 57022,
    'Ember.js': 22165,
    'Backbone.js': 27862
};



  //console.log(Object.values(datajson))
 
  for(let i = 0; i < variabletest.length; i++) {
    let obj = variabletest[i];

    console.log(obj.id);
}




  new Chart(document.getElementById("bar-chart"), {
      type: 'bar',
      data: {
        labels: datajson.label,
        datasets: [
          {
            label: "Population (millions)",
            backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
            data: Object.values(variabletest),
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
