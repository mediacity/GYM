<p class="text-dark"> <i class="feather icon-user"></i><b> {{ $name }}</b> </p>
<p> <i class="feather icon-mail"></i> <a class="text-dark" href="email:{{ $email }}">{{ $email }}</a></p>
@if($mobile != '')
	<p> <i class="feather icon-phone"></i> <a class="text-dark" href="tel:{{ $mobile }}">{{ $mobile }}</a></p>
@endif