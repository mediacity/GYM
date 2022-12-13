/*
---------------------------------------
    : Custom - js :
---------------------------------------
*/
"use strict";
$(document).ready(function() {
// $(".toggle-password").click(function() {
    // $(this).toggleClass("fa-eye fa-eye-slash");
    // var input = $($(this).attr("toggle"));
    // console.log(input.attr("type"));
    // if (input.attr("type") == "password") {
    //   input.attr("type", "text");
    // } else {
    //   input.attr("type", "password");
    // }
// });

    $('.datetimepicker').datepicker({
      language: 'en',     
      dateFormat: 'yyyy-mm-dd',
      timeFormat: 'hh:ii:00',
      timepicker: true,
      dateTimeSeparator: ' '
    });
    $('.select2').select2();
    /* --- Form - Datepicker -- */
    $('#autoclose-date').datepicker({
	    language: 'en',
	    autoclose:true,
	    dateFormat: 'yyyy-mm-dd',
		});
	  $('.alert').addClass('active');
	  $('.alert').addClass('z-depth-1');
	  $('div.alert').not('.alert-important').delay(3000).fadeOut(350);  
	  $('#flash-overlay-modal').modal(); 
	  $('#checkboxAll').on('change', function(){
	    if($(this).prop("checked") == true){
	      $('.filled-in').attr('checked', true);
	    }
	    else if($(this).prop("checked") == false){
	      $('.filled-in').attr('checked', false);
	    }
	  });
	  $('.tag-select').select2({
	    tags: true,
	    tokenSeparators: [',', ' '],
	    createTag: function(newTag) {
	      return {
	        id: 'new:' + newTag.term,
	        text: newTag.term,
	        newOption: true
	      };
	    }
	  });

	});  
	$(function () {   
    var table = $('#datatable-buttons').DataTable({
        lengthChange: true,
        responsive: true,
        dom:
        "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" +
        "<'row'<'col-sm-12 m-t-15'tr>>" +
        "<'row'<'col-sm-5'i><'col-sm-7'p>>", 
        buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
    });
	});
 	$(function () { 
     $('.summernote').summernote({
        height: 200,
        minHeight: null,
        maxHeight: null,
        focus: true 
    });
    $('#reset').click(function() {
      	// alert('dfdf');
    $(".summernote").summernote('code','');
  });
	});

 	$(function () { 
    $('.hide-block').hide();
    $("#hide").click(function() {
      $(".add-form").hide(400);
    });
    $("#show").click(function() {
      $(".add-form").show(400);
    });
	});

  $('.deletemodal').on("click",function(){
    var id = $(this).data('id');
    var url = $(this).data('url');
    if(typeof url != "undefined"){
      var action = url + '/' + id;
    }
    else{
      var action = $("#deleteform").attr('action') + '/' + id;    
    }
    $("#deleteform").attr('action', action);
  });

  $('.ticketeditmodal').on("click",function(){
    var id = $(this).data('id');
    var reply = $(this).data('reply');
    console.log(reply);
    $(".summernote").summernote('code',reply);
    var action = $("#ticketedit-form").attr('action') + '/' + id;
    $("#ticketedit-form").attr('action', action);
  });

$(".toggle-password").on('click', function() {
  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if(input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
});

$(".set-rating").rateYo({
    starWidth: "16px",
    spacing: "3.2px",
    normalFill: "#717983",
    ratedFill: "#FFAE00",
    fullStar: true,
    onChange: function (rating, rateYoInstance) { 
    $(this).next().val(rating);
    }
});

 
$(document).bind('ajaxStart', function(){
    $('.loading-image').show();
}).bind('ajaxComplete', function(){
    $('.loading-image').hide();
});
$('.servermodal').on('click', function (event) {
  var id = $(this).data('id'); 
  var buyer = $(this).data('buyer');
  var type = $(this).data('type');
  if(type == 't'){
    type = 'f';
    if(!id){
      id = $('#product_id').val();
    }
  }
  if(id){
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"GET",
      url: baseUrl+'/fetchserver/'+id+'/'+buyer+'/'+type,
      success:function(data){   
        // console.log(data);
        $(".server-modal").html(data);
        $('#serverModal').modal('show');
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest);
      }
    });
  }
  else if($(this).data('type') == 't'){
    alert('Select Product First');
  }
  // var modal = $(this);
  // modal.find("input[name=day]").val(button.data('day'));
  // modal.find("input[name=period]").val(button.data('period'));
});
$('body').on('submit','.serverformsubmit', function (e) {
  e.preventDefault();
  var form = $(this).serialize(); 
  console.log(form);
  if(form){
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"POST",
      url: baseUrl+'/serverupdate',
      data: form,
      success:function(data){  
          $('#serverModal').modal('hide'); 
          $(".messages").append("<div class='alert alert-success active z-depth-1'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button>Server Detail Updated</div>");
      },
      error: function(xhr, status, error) {
        console.log(xhr);
          $.each(xhr.responseJSON.errors, function(key, val){
            $(".messages").append("<div class='alert alert-danger active z-depth-1'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button>"+val+"</div>");
          });
      }
    });
  }
});
$('.vertical-menu-detail').slimscroll({
    height: '100vh',
    position: 'right',
    size: "7px",
    color: '#CFD8DC'
});
// $('.notifybar .dropdown-menu ul').slimscroll({
//     // height: '230',
//     position: 'right',
//     size: "7px",
//     color: '#CFD8DC'
// });
$('.add-task-btn').on("click",function(){
  $(this).closest('.task-block').find('.add-task-block').show(400);
  $(this).hide('fast');
});

// $('.add-task-btn').on("click",function(){
//   var a = $('.add-task-block').clone(true).removeClass('hide-block');
//   console.log(a);
//   $(this).closest('.task-block').html(a);
// });

$('.todo-editbtn').on('click', function (event) {
  var id = $(this).data('id'); 
  // console.log(id);
  if(id != null){
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"GET",
      url: baseUrl+'/admin/todo/'+id+'/edit',
      success:function(data){   
        $(".todo-edit-modal").html(data);
        $("#todoeditModal").modal('show');
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest);
      }
    });
  }
});

$('.todo-status').on('change', function (e) {
  var a = $(this).attr('name');
  $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type:"POST",
    url: $(this).closest('form').attr('action'),
    data: $(this).closest('form').serialize(),
    context: this,
    success:function(data){
      console.log(data);
      if(a == 'is_complete' && data.checked == 1)
        $(this).closest('.kanban-footer').find('input[name="is_checked"]').prop('checked',true);
      else if(a == 'is_complete' && data.checked == 0)
        $(this).closest('.kanban-footer').find('input[name="is_checked"]').prop('checked',false);
      if(a == 'is_checked' && data.complete == 1)
        $(this).closest('.kanban-footer').find('input[name="is_complete"]').prop('checked',true);
      else if(a == 'is_checked' && data.complete == 0)
        $(this).closest('.kanban-footer').find('input[name="is_complete"]').prop('checked',false);
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      console.log(XMLHttpRequest);
    }
  });
});
$('.ticket-block input[name="type"]').on("change", function(e) {
  if($("#product_id,#subject_id,#service_id").filter(function() { return $(this).val(); }).length > 0) {
    // sessionStorage.setItem('chosentype',$('input[name="type"]').val());
    location.reload();
  }  
  else{    
    if($('input[name="type"]:checked').val() == '0'){
      $("#service-block").show('fast');
      $("#service-block").find('#service_id').attr('required',true);  
    }
    else{
      $("#service-block").hide();
      $("#service-block").find('#service_id').attr('required',false).val('');  
    }
  }
});
$('#subject_id').on("change", function(e) {
  if($(this).val() == '7'){
    $("#subject").show('fast');
    $("#subject").find('#subject').attr('required',true);  
  }
  else{
    $("#subject").hide();
    $("#subject").find('#subject').attr('required',false).val(''); 
    check_product();
  }
});
$('.fetch-services').on("change", function(e) {
  var id = $(this).val();
  $('#purchase_code').val('');  
  $('input[type=hidden][name=verify]').val('0');
  // if($('input[name="type"]:checked').val() == '1' && $('#subject_id').val() != '1' && $('#subject_id').val() != ''){
  if($('input[name="type"]:checked').val() == '0'){
    fetchservices(id);  
  } 
  else{
    check_product();
  }
});
function check_product(){
  var flag = 0;
  var product = $('#product_id').val();
  if(product){
    $.when(check_product_ajax(product)).then(function(data){ 
      console.log(data);
      flag = data; 
      // console.log(flag);
      if(flag == 0 && $('#subject_id').val() != '1' && $('#subject_id').val() != ''){
        $("#purchasecode").show('fast');
        $("#purchasecode").find('#purchase_code').attr('required',true);
      }
      else{
        if(flag == 2){
          $(".messages").append("<div class='alert alert-danger active z-depth-1'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button>Your product support is expired.</div>");
          $("button[type=submit]").attr('disabled',true);
        }
        $("#purchasecode").hide();
        $("#purchasecode").find('#purchase_code').attr('required',false).val('');  
      }
    });
  }
}
function check_product_ajax(product){  
  return $.ajax({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    type:"GET",
    url: baseUrl+'/check_product/'+product,
    success:function(data){
      console.log(data);
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      console.log(XMLHttpRequest);
    }
  });
}
function fetchservices(id){
  // console.log(id);
  var service = $('#service_id').empty();
  if(id){
    $.ajax({
      headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:"GET",
      url: baseUrl+'/fetch_services/'+id,
      success:function(data){  
        if(data){ 
          service.append('<option value="0">Please Select</option>');
          $.each(data, function(id, name) {
          service.append($('<option>', {value:id, text:name}));
          });
          $("#service-block").show('fast');
          $("#service-block").find('#service_id').attr('required',true);
        }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log(XMLHttpRequest);
      }
    });
  }
}
var checktimeout;
$('.checkcode').on("keyup", function(e) {
  if(checktimeout)
    clearTimeout(checktimeout);
  var check = 1;
  var type = $(this).data('type');
  var code = $(this).val();
  var product = $('#product_id').val();
  if(type == 'service' && $('#subject_id').val() != '1' && $('#subject_id').val() != ''){
    check = 0;
  }
  if(code && product && check == 1){
    $('input[type=hidden][name=verify]').val('0');
    checktimeout = setTimeout(function(){
      $.ajax({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:"GET",
        url: baseUrl+'/check_expiry/'+type+'/'+product+'/'+code,
        success:function(data){
          // console.log(data);  
          if(data != 1){ 
            $(".messages").append("<div class='alert alert-danger active z-depth-1'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button>"+data+"</div>");
            $("button[type=submit]").attr('disabled',true);
          }
          else{  
            if(type == 'product'){            
              $(".messages").append("<div class='alert alert-success active z-depth-1'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>x</button>Code Verified</div>");
            } 
            $('input[type=hidden][name=verify]').val('1');
            $("button[type=submit]").attr('disabled',false);
          }
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log(XMLHttpRequest);
        }
      });
    }, 1000);
  }
});
$('.server-block #server').on("change", function(e) {
  if($(this).val() == 'cpanel'){
    $("#port-block").hide();
    $("#port-block").find('#port').attr('required',false).val('');  
    $("#url-block").show();
    $("#url-block").find('#url').attr('required',true);
  }
  else{
    $("#port-block").show();
    $("#port-block").find('#port').attr('required',true);
    $("#url-block").hide();
    $("#url-block").find('#url').attr('required',false).val('');  
  }
});

$( function(){
    if ($('#razorpay_check').is(':checked')){
       $('#razorpay_box').show('fast');
    }else{
      $('#razorpay_box').hide('fast');
    }
    if ($('#paypal_check').is(':checked')){
       $('#paypal_box').show('fast');
    }else{
      $('#paypal_box').hide('fast');
    }
    if ($('#bt_check').is(':checked')){
       $('#bt_box').show('fast');
    }else{
      $('#bt_box').hide('fast');
    }
    if ($('#captcha_check').is(':checked')){
       $('#captcha_box').show('fast');
    }else{
      $('#captcha_box').hide('fast');
    }
    if ($('#g_check').is(':checked')){
       $('#g_box').show('fast');
    }else{
      $('#g_box').hide('fast');
    }
    if ($('#fb_check').is(':checked')){
       $('#fb_box').show('fast');
    }else{
      $('#fb_box').hide('fast');
    }
    if ($('#git_check').is(':checked')){
       $('#git_box').show('fast');
    }else{
      $('#git_box').hide('fast');
    }
    if ($('#envato_check').is(':checked')){
       $('#envato_box').show('fast');
    }else{
      $('#envato_box').hide('fast');
    }
});
$('#captcha_check').on('change',function(){
  if ($('#captcha_check').is(':checked')){
       $('#captcha_box').show('fast');
    }else{
      $('#captcha_box').hide('fast');
    }
}); 
$('#razorpay_check').on('change',function(){
  if ($('#razorpay_check').is(':checked')){
       $('#razorpay_box').show('fast');
    }else{
      $('#razorpay_box').hide('fast');
    }
}); 
$('#paypal_check').on('change',function(){
  if ($('#paypal_check').is(':checked')){
       $('#paypal_box').show('fast');
    }else{
      $('#paypal_box').hide('fast');
    }
});
$('#bt_check').on('change',function(){
  if ($('#bt_check').is(':checked')){
       $('#bt_box').show('fast');
    }else{
      $('#bt_box').hide('fast');
    }
}); 
$('#g_check').on('change',function(){
  if ($('#g_check').is(':checked')){
       $('#g_box').show('fast');
    }else{
      $('#g_box').hide('fast');
    }
});
$('#fb_check').on('change',function(){
  if ($('#fb_check').is(':checked')){
       $('#fb_box').show('fast');
    }else{
      $('#fb_box').hide('fast');
    }
}); 
$('#git_check').on('change',function(){
  if ($('#git_check').is(':checked')){
       $('#git_box').show('fast');
    }else{
      $('#git_box').hide('fast');
    }
});  
$('#envato_check').on('change',function(){
  if ($('#envato_check').is(':checked')){
       $('#envato_box').show('fast');
    }else{
      $('#envato_box').hide('fast');
    }
}); 
function readnote(id) {
  var count = $('.notify-count').text();
  $.ajax({
    url: baseUrl + '/notifications/' + id,
    type: "GET",
    success: function(data) {
      if(count > 0) {
        var ncount = count - 1;
        if(ncount > 0) {
          $('.notify-count').text(ncount);
          $('#notify'+id).removeClass('bg-light-gradient');
        } else {
          $('.notifybar dropdown-menu').hide('fast');
        }
      }
    },
    error: function(XMLHttpRequest, textStatus, errorThrown) {
      console.log(XMLHttpRequest);
    }
  });
}

$('body').on('change',"input[type=file]",function(){ 
    if($(this).hasClass('sql-file')){
      var fileExtension = ['sql', 'zip'];
    }
    if ($(this) != '' && $.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
      alert("Only formats are allowed : "+fileExtension.join(', '));
      $(this).val('');
    }
});

$("#rateus").rateYo({ 
  starWidth: "20px",
  spacing: "4.5px",
  normalFill: "#717983",
  ratedFill: "#fb7430",
  fullStar: true,
  onChange: function (rating, rateYoInstance) { 
    $(this).next().val(rating);
  }
});

$('#add_card').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipientid = button.data('board') // Extract info from data-* attributes
  var recipient = button.data('boardname') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Add new card in ' + recipient+ '\'s board')
  modal.find('.modal-body #board_id').val(recipientid)
});


$('#editcard').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipientid = button.data('cardid') // Extract info from data-* attributes
  var cardtitle = button.data('cardtitle') // Extract info from data-* attributes
  var card_detail = button.data('card_detail')
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-title').text('Edit card ' + cardtitle)
  modal.find('.modal-body #card_id').val(recipientid);
  modal.find('.modal-body #card_name').val(cardtitle);
  modal.find('.modal-body #card_detail').val(card_detail);
  
});

$('#deleteModalForCard').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipientid = button.data('cardid') // Extract info from data-* attributecs
  var cardtitle = button.data('cardtitle') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this);
  modal.find('.modal-title').text('Delete card ' + cardtitle)
  modal.find('.modal-footer #delete_card_id').val(recipientid);
  
});