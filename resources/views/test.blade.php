

@extends ('layout')


@section ('contenu')


<p> Page de test </p>
<canvas id="myChart" width="400" height="400"></canvas>
@php
$variable = "Mountaidzdan";
echo json_encode($best3Seller); 

echo "</br> </br> **";

foreach($best3Seller as $value => $data)
{
  echo " </br> VALUE : " . $value;
  
  foreach($data as $test => $test2)
  {
    echo $test . " : " . $test2 . "</br>";
  }
}
@endphp

<script>
  var test = '<?php echo $best3Seller;?>'
  var variable = '<?php echo $variable; ?>'
  console.log(test)
  console.log(variable);
  </script>

  @endsection
