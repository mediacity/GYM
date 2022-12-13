<!DOCTYPE html>
<html lang="en">
<head>
  <title>{{ __("Bootstrap Example") }}</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
 .mt40{
 margin-top: 40px;
 }
  </style>
</head>
<body> 
 <div class="container">
 <div class="row">
 <div class="col-lg-12 mt40">
 <div class="card-header" style="background: #0275D8;">
 <h2>{{ __("Register for Event") }}</h2>
 </div>
 </div>
 </div>
 <form action="{{ url('payment') }}" method="POST" name="add_note">
 {{ csrf_field() }}
 <div class="row">
 <div class="col-md-12">
 <div class="form-group">
 <strong>{{ __("Name") }}</strong>
 <input class="form-control" name="name" type="text" placeholder="Enter Name" />
 </div>
 </div>
 <div class="col-md-12">
 <div class="form-group">
 <strong>{{ __("Mobile Number") }}</strong>
 <input class="form-control" name="mobile_number" type="text" placeholder="Enter Mobile Number" />
 </div>
 </div>
 <div class="col-md-12">
 <div class="form-group">
 <strong>{{ __("Email Id") }}</strong>
 <input class="form-control" name="email" type="text" placeholder="Enter Email id" />
 </div>
 </div>
 <div class="col-md-12">
 <div class="form-group">
 <strong>{{ __("Event Fees") }}</strong>
 <input class="form-control" name="amount" readonly="readonly" type="text" value="100" placeholder="" /></div>
 </div>
 <div class="col-md-12">
 <button class="btn btn-primary" type="submit">{{ __("Submit") }}</button></div>
 </div>
 </div>
 </form>
 </div>
</body>
</html>