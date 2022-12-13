/*Admin JS*/
/*Developer : Ankit*/
/* ☺ 2020 */

'use strict';

// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('form');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();


$('.country').on('change',function(){
    $.ajax({
       type : 'GET',
       data : {countryid : $(this).val()},
       url  : stateurl,
       success : function(response){

          $('.states').empty();
          $('.states').append('<option value="">Please select state</option>');

          $('.cities').empty();
          $('.cities').append('<option value="">Please select city</option>');

          $.each(response, function(key,value) {
              $('.states').append('<option value='+value.id+'>'+value.name+'</option>');
          });

       },
       error: function(XMLHttpRequest, textStatus, errorThrown) { 
          console.log(XMLHttpRequest);
       }
    })
});

$('.states').on('change',function(){
  $.ajax({
     type : 'GET',
     data : {stateid : $(this).val()},
     url  : cityurl,
     success : function(response){

        $('.cities').empty();
        $('.cities').append('<option value="">Please select city</option>');

        $.each(response, function(key,value) {
            $('.cities').append('<option value='+value.id+'>'+value.name+'</option>');
        });

     },
     error: function(XMLHttpRequest, textStatus, errorThrown) { 
        console.log(XMLHttpRequest);
     }
  })
});
