/*
------------------------------------
    : Custom - Form Wizards js :
------------------------------------
*/
'use strict';
$(document).ready(function() {
  var form = $("#basic-form-wizard");
  form.children("div").steps({
      headerTag: "h3",
      bodyTag: "section",
      transitionEffect: "slideLeft",
      onFinishing: function (event, currentIndex)
      {
          return form;
      },
      onFinished: function (event, currentIndex)
      {
          $("#basic-form-wizard").submit();
      }
  });
  
  $('#basic-form-wizard .steps').prepend( "<div class='form-wizard-line'></div>" );
});