@extends ('layout')

@section ('contenu')
<div class="chart-container">
  <div class="pie-chart-container">
    <canvas id="pie-chart" height="280" width="600"></canvas>
  </div>
</div>

<p> Coucou </p>

<div id="app">
  @{{ message }}
</div>
@php 
//dd($chart_data);
@endphp

@endsection