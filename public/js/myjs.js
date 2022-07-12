$(document).ready(function() {
    // Runs after the DOM is loaded.
  //  alert('DOM fully loaded!');
    console.log("la street");


    $("select.selectname").change(function(){
        var selectedCountry = $(this).children("option:selected").val();
        alert("You have selected the country - " + selectedCountry);
    });


    if (!$("#checkboxID").is(":checked")) {
     // alert('Merci de selectionner un produit');
  }


 

  // Section Chart JS
  const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };


  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );



  });



