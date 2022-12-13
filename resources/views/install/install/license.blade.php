<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('installer/css/install.css') }}">
    <title>{{ __('Installing App - Step - Envato Purchase Details') }}</title>
</head>

<body>

    <div class="container">
        <div class="card m-b-30">
            <div class="card-header">
                <h3 class="m-3 text-center text-dark ">
                    {{ __('Enter Your Purchase code Detail') }}
                </h3>
            </div>
            <div class="card-body" id="stepbox">
                @if(session()->has('error'))
                    
                    <div class="alert alert-danger">
                        {{ session()->get('error') }}
                    </div>
                @endif

                <form action="{{url('install/verify-license')}}" id="stepvform" method="POST" class="needs-validation"
                    novalidate>
                    @csrf
                    <h3>{{ __('Envato Purchase details') }}</h3>
                    <hr>
                    <div class="form-row">

                        <br>
                        <div class="col-md-6 mb-3">
                            <label for="validationCustom01">{{ __('Envato User Name') }}:</label>
                            <input name="user_id" type="text" class="form-control" id="validationCustom01"
                                placeholder="{{ __('Username') }}" value="" required>
                            <div class="valid-feedback">
                                {{ __('Looks good!') }}
                            </div>
                            <div class="invalid-feedback">
                                {{ __('Please fill name.') }}
                            </div>
                        </div>
                        <div class="eyeCy col-md-6 mb-3">
                            <label for="validationCustom02">{{ __('Purchase Code:') }}</label>
                            <input name="code" type="password" class="form-control" id="validationCustom02"
                                placeholder="{{ __('Please enter valid purchase code') }}" value="" required>
                            <span toggle="#validationCustom02"
                                class="eye fa fa-fw fa-eye field-icon toggle-password"></span>
                            <div class="valid-feedback">
                                {{ __('Looks good!') }}
                            </div>
                            <div class="invalid-feedback">
                            </div>
                            @if(isset($errors) && $errors->any())
                                <h6 class="text-danger alert alert-error">{{ filter_var($errors->first()) }}</h6>
                            @endif

                            <small class="text-muted font-weight-bold">
                                <i class="fa fa-question-circle"></i> <a title="{{ __('Click to know') }}"
                                    class="text-muted"
                                    href="https://help.market.envato.com/hc/en-us/articles/202822600-Where-Is-My-Purchase-Code"
                                    target="_blank">{{ __('Where Is My Purchase Code') }} ?</a>
                            </small>


                        </div>
                    </div>
                    <button class="float-right step1btn btn btn-primary"
                        type="submit">{{ __('Continue to Next Step') }}...</button>
                </form>
            </div>
        </div>
        <p class="text-center m-3 text-white">&copy;{{ date('Y') }} | <a class="text-white"
                href="http://mediacity.co.in">
                {{ __('Media City') }}
            </a></p>
    </div>

    <div class="corner-ribbon bottom-right sticky green shadow">{{ __('License') }}</div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>