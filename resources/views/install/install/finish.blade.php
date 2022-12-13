<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('installer::css/install.css') }}">
    <title>{{ __('Installtion Finished !') }}</title>
</head>

<body>

    <div class="display-none preL">
        <div class="display-none preloader3"></div>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="m-3 text-center text-dark ">
                    {{ __('Installation Successfull') }}
                </h3>
            </div>
            <div class="card-body" id="stepbox">
                 <h5>
                    {{__("This are the test details for initial login you can change it later from admin panel.")}}
                 </h5>
                 <hr>
                 
                    <ul class="w-75 list-unstyled">
                        @foreach($users as $user)

                            <li class="shadow-sm media">
                                <img src="{{ url('images/user/profile.jpg') }}" width="100px" class="align-self-start mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-1">{{ filter_var($user->email) }}</h5>
                                    <p>{{ __("Password : ") }}{{ __("12345678") }}</p>
                                </div>
                            </li>
                            

                        @endforeach
                    </ul>

                    <div class="text-center">
                        <a role="button" class="btn btn-md btn-outline-primary" href="{{ url('/login') }}">
                            <i class="fas fa-rocket"></i> {{__("Explore something amazing !")}}
                        </a>
                    </div>
                 
            </div>
        </div>
        <p class="text-center m-3 text-white">&copy;{{ date('Y') }} | <a class="text-white"
                href="http://mediacity.co.in">{{ __('Media City') }}</a></p>
    </div>

    <div class="corner-ribbon bottom-right sticky green shadow">{{ __('FINISH') }} </div>
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>

</html>