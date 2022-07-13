$(document).ready(function() {
    // Runs after the DOM is loaded.
  //  alert('DOM fully loaded!');
    console.log("la street");


    $("select.selectname").change(function(){
        var selectedCountry = $(this).children("option:selected").val();
        alert("You have selected the country - " + selectedCountry);
    });





  var app = new Vue({
    el: '#app',
    data: {
      message: 'Hello Vue !'
    }
    
  })

  
 
  });




