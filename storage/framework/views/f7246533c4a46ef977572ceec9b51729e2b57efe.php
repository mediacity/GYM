<script src="<?php echo e(url('assets/js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/moment/moment.js')); ?>"></script>

<!-- Datatable js -->
<script src="<?php echo e(url('assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/dataTables.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/buttons.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/jszip.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/buttons.print.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/buttons.colVis.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/dataTables.responsive.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/datatables/responsive.bootstrap4.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/bootstrap.min.js')); ?>"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
<!-- Apex js -->

<script src="<?php echo e(url('assets/plugins/apexcharts/irregular-data-series.js')); ?>"></script>
<!-- Slick js -->
<script src="<?php echo e(url('assets/plugins/slick/slick.min.js')); ?>"></script>
<!-- Vector Maps js -->
<script src="<?php echo e(url('assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')); ?>"></script>
<!-- Custom Dashboard js -->
<script src="<?php echo e(url('assets/js/custom/custom-dashboard.js')); ?>"></script>

<!-- Core js -->
<!-- Tagsinput js -->
<script src="<?php echo e(url('assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/bootstrap-tagsinput/typeahead.bundle.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/modernizr.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/detect.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/jquery.slimscroll.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/vertical-menu.js')); ?>"></script>

<!-- Apex js -->
<script src="<?php echo e(url('assets/plugins/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/apexcharts/irregular-data-series.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/custom/custom-chart-apex.js')); ?>"></script>
<!-- Core js -->






<!-- Apex js -->
<script src="<?php echo e(url('assets/plugins/apexcharts/apexcharts.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/apexcharts/irregular-data-series.js')); ?>"></script>
<!-- Slick js -->
<script src="<?php echo e(url('assets/plugins/slick/slick.min.js')); ?>"></script>
<!-- Pnotify js -->
<script src="<?php echo e(url('assets/plugins/pnotify/js/pnotify.custom.min.js')); ?>"></script>
<!-- Select2 js -->
<script src="<?php echo e(url('assets/plugins/select2/select2.min.js')); ?>"></script>


<script src="<?php echo e(url('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js')); ?>"></script>
<script src="<?php echo e(url('assets/plugins/toolbar/jquery.toolbar.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/custom/custom-toolbar.js')); ?>"></script>


<script src="<?php echo e(url('assets/plugins/switchery/switchery.min.js')); ?>"></script>
<script src="<?php echo e(url('assets/js/custom/custom-switchery.js')); ?>"></script>

<script src="<?php echo e(url('assets/js/core.js')); ?>"></script>
<script src="<?php echo e(url('js/admin.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/jquery.rateyo.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/customjs.js')); ?>"></script>
<script>
  var baseUrl = <?php echo json_encode(url('/'), 15, 512) ?>;
</script>
<script>
  PNotify.desktop.permission();
  <?php if(session('warning')): ?>
  var warning = new PNotify({
    title: 'Warning',
    text: '<?php echo e(session('
    warning ')); ?>',
    type: 'primary',
    desktop: {
      desktop: true,
      icon: 'feather icon-thumbs-down'
    }
  });
  warning.get().click(function () {
    warning.remove();
  });
  <?php endif; ?>

  <?php if(session('success')): ?>
  var success = new PNotify({
    title: 'Success',
    text: '<?php echo e(session('
    success ')); ?>',
    type: 'success',
    desktop: {
      desktop: true,
      icon: 'feather icon-thumbs-up'
    }
  });

  success.get().click(function () {
    success.remove();
  });
  <?php endif; ?>

  <?php if(session('updated')): ?>
  var info = new PNotify({
    title: 'Updated',
    text: '<?php echo e(session('
    updated ')); ?>',
    type: 'success',
    desktop: {
      desktop: true,
      icon: 'feather icon-info'
    }
  });

  info.get().click(function () {
    info.remove();
  });
  <?php endif; ?>

  <?php if(session('deleted')): ?>
  var deleted = new PNotify({
    title: 'Deleted',
    text: '<?php echo e(session('
    deleted ')); ?>',
    type: 'error',
    desktop: {
      desktop: true,
      icon: 'feather icon-trash-2'
    }
  });

  deleted.get().click(function () {
    deleted.remove();
  });
  <?php endif; ?>

  $('.select2').select2();


  $(function () {
    $("#datepicker").datepicker({
      changeMonth: true,
      changeYear: true,
      yearRange: '1950:<?php echo e(date('
      Y ')); ?>',
      dateFormat: "yy-mm-dd",
    });
  });

  // #timeyours
  function startTime() {
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    m = checkTime(m);
    s = checkTime(s);
    var date = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
    var n = today.toLocaleString([], {
      hour: '2-digit',
      minute: '2-digit',
      second: '2-digit'
    });
    document.getElementById('timeyours').innerHTML = date + ' | ' + n;
    var t = setTimeout(startTime, 1000);
  }



  function checkTime(i) {
    if (i < 10) {
      i = "0" + i
    }; // add zero in front of numbers < 10
    return i;
  }
</script>
<?php if($setting->right_click == '1'): ?>
<script>
  $(function () {
    $(document).bind("contextmenu", function (e) {
      return false;
    });
  });
</script>
<?php endif; ?>
<?php if($setting->inspect_element == '1'): ?>
<script>
  $(function () {
    document.onkeydown = function (e) {
      if (e.keyCode == 123) {
        return false;
      }

      if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
        return false;
      }

      if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
        return false;
      }

      if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
        return false;
      }

      if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
        return false;
      }
    };
  });
</script>
<?php endif; ?>
<?php if(strlen( env('ONESIGNAL_APP_ID',""))>4): ?>
<script>
  var ONESIGNAL_APP_ID = <?php echo json_encode(env('ONESIGNAL_APP_ID'), 15, 512) ?>;
  var USER_ID = '<?php echo e(auth()->user()?auth()->user()->id:""); ?>';
</script>
<script src="<?php echo e(url('js/onesignal.js')); ?>"></script>
<script src="<?php echo e(url('/OneSignalSDK/OneSignalSDK.js')); ?>"></script>
<?php endif; ?>
<script src="<?php echo e(url('js/admintable.js')); ?>"></script>

<?php echo $__env->yieldContent('script'); ?>
<?php echo toastr_js(); ?>
<?php echo app('toastr')->render(); ?><?php /**PATH C:\xampp\htdocs\media_city\GYM\gym\gym\resources\views/layouts/scripts.blade.php ENDPATH**/ ?>