<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ url('installer/css/install.css') }}">
  <title>{{ __('Installing App - Server Requirement') }}</title>
</head>

<body>
  <div class="display-none preL">
    <div class="display-none preloader3"></div>
  </div>

  <div class="container">
    <div class="card">
      <div class="card-header">
        <h3 class="m-3 text-center text-dark ">
          {{ __('Server Requirements') }}
        </h3>
      </div>
      <div class="card-body" id="stepbox">
        <form autocomplete="off" action="{{ url('/install/servercheck') }}" id="step1form" method="POST"
          class="needs-validation" novalidate>
          @csrf
          @php
          $servercheck= array();
          @endphp
          <div class="form-row">
            <br>
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>{{ __('php extensions') }}</th>
                      <th>{{ __('Yours') }}</th>
                      <th>{{ __('Required') }}</th>
                      <th>{{ __('Status') }}</th>
                    </tr>
                  </thead>
    
                  <tbody>
    
                    <tr>
                      @php
                        $v = phpversion();
                      @endphp
                      <td>
                        {{ __('php version') }}
                      </td>
                      <td>
                        {{ phpversion() }}
                      </td>
                      <td>
                        {{config('installer.phpversion')}}
                      </td>
                      <td>
    
                        @if($v >= config('installer.phpversion')) <i class="text-success fas fa-check"></i>
                          @php
                            array_push($servercheck, 1);
                          @endphp
                        @else
                          @php
                            array_push($servercheck, 0);
                          @endphp
                        <i class="text-danger fas fa-times"></i>
                        <br>
                        <small>
                          {{__('Your php version is')}} <b>{{ $v }}</b> {{__('which is not supported')}}
                        </small>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>{{ __('pdo') }}</td>
                      <td>
                        {{ extension_loaded('pdo') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
                        @if (extension_loaded('pdo'))
    
                        @php
                          array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>{{ __('BCMath') }}</td>
                      <td>
                        {{ extension_loaded('BCMath') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
                        @if (extension_loaded('BCMath'))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>{{ __('openssl') }}</td>
                      <td>
                        {{ extension_loaded('openssl') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
                        @if (extension_loaded('openssl'))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>{{ __('fileinfo') }}</td>
                      <td>
                        {{ extension_loaded('fileinfo') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
                        @if (extension_loaded('fileinfo'))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>{{ __('json') }}</td>
                      <td>
                        {{ extension_loaded('json') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
                        @if (extension_loaded('json'))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>{{ __('session') }}</td>
                      <td>
                        {{ extension_loaded('session') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
    
                        @if (extension_loaded('session'))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>{{ __('gd') }}</td>
                      <td>
                        {{ extension_loaded('gd') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
                        @if (extension_loaded('gd'))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
    
    
                    <tr>
                      <td>{{ __('allow_url_fopen') }}</td>
                      <td>
                        {{ ini_get('allow_url_fopen') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
                        @if (ini_get('allow_url_fopen'))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
    
    
    
    
                    <tr>
                      <td>{{ __('xml') }}</td>
                      <td>
                        {{ extension_loaded('xml') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
                        @if (extension_loaded('xml'))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>{{ __('tokenizer') }}</td>
                      <td>
                        {{ extension_loaded('tokenizer') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
                        @if (extension_loaded('tokenizer'))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>{{ __('standard') }}</td>
                      <td>
                        {{ extension_loaded('standard') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
                        @if (extension_loaded('standard'))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>{{ __('zip') }}</td>
                      <td>
                        {{ extension_loaded('zip') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
                        @if (extension_loaded('zip'))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>{{ __('mysqli') }}</td>
                      <td>
                        {{ extension_loaded('mysqli') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
                        @if (extension_loaded('mysqli'))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>{{ __('mbstring') }}</td>
                      <td>
                        {{ extension_loaded('mbstring') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
                        @if (extension_loaded('mbstring'))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>{{ __('ctype') }}</td>
                      <td>
                        {{ extension_loaded('ctype') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
                        @if (extension_loaded('ctype'))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>{{ __('exif') }}</td>
                      <td>
                        {{ extension_loaded('exif') ? "Enabled" : "Disabled" }}
                      </td>
                      <td>
                        {{ __('Yes') }}
                      </td>
                      <td>
    
                        @if (extension_loaded('exif'))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>{{ __('max_execution_time') }} </td>
                      <td>
                        {{ ini_get('max_execution_time') }} {{__("sec.")}}
                      </td>
                      <td>
                        {{__("300 sec.")}}
                      </td>
                      <td>
                        @if ((ini_get('max_execution_time')) >= 300|| ini_get('max_execution_time') == '-1')
                          @php
                           
                            array_push($servercheck, 1);
                          @endphp
                          <i class="text-success fas fa-check"></i>
                        @else
                          @php
                            array_push($servercheck, 0);
                          @endphp
                          <i class="text-danger fas fa-times"></i>
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>
                          {{ __('memory_limit') }} 
                          
                          @php
                            $memory_limit = ini_get('memory_limit');
                            if (preg_match('/^(\d+)(.)$/', $memory_limit, $matches)) {
                                if ($matches[2] == 'M') {
                                    $memory_limit = $matches[1] * 1024 * 1024; // nnnM -> nnn MB
                                } else if ($matches[2] == 'K') {
                                    $memory_limit = $matches[1] * 1024; // nnnK -> nnn KB
                                }
                                else if ($matches[2] == 'G') {
                                    $memory_limit = $matches[1] * 1024 * 1024 * 1024; // nnnK -> nnn KB
                                }
                            }
                            
                            $ok = ($memory_limit >= 1024 * 1024 * 1024); // at least 1G?
                            
                          @endphp
                      </td>
                      <td>
                        {{ ini_get('memory_limit') }}
                      </td>
                      <td>
                        {{ __('1G') }}
                      </td>
                      <td>
                          
    
                        @if ($ok == true || ini_get('memory_limit') == '-1')
    
                        @php
                          array_push($servercheck, 1);
                        @endphp
    
                          <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                          array_push($servercheck, 0);
                        @endphp
    
                          <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>
                          {{ __('upload_max_filesize') }}
    
                          @php
    
                            $upload_max_filesize = ini_get('upload_max_filesize');
    
                            if (preg_match('/^(\d+)(.)$/', $upload_max_filesize, $matches)) {
                                if ($matches[2] == 'M') {
                                    $upload_max_filesize = $matches[1] * 1024 * 1024; // nnnM -> nnn MB
                                } else if ($matches[2] == 'K') {
                                    $upload_max_filesize = $matches[1] * 1024; // nnnK -> nnn KB
                                }
                                else if ($matches[2] == 'G') {
                                    $upload_max_filesize = $matches[1] * 1024 * 1024 * 1024; // nnnK -> nnn KB
                                }
                            }
    
                            $ok = ($upload_max_filesize >= 1024 * 1024 * 1024); // at least 1G?
                            
                          @endphp
    
                      </td>
                      <td>
                        {{ ini_get('upload_max_filesize') }}
                      </td>
                      <td>
                        {{ __('1G') }}
                      </td>
                      <td>
                          
    
                        @if ($ok == true)
    
                        @php
                          array_push($servercheck, 1);
                        @endphp
    
                          <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                          array_push($servercheck, 1);
                        @endphp
    
                          <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td>
                          {{ __('post_max_size') }}
    
                          @php
    
                            $post_max_size = ini_get('post_max_size');
    
                            if (preg_match('/^(\d+)(.)$/', $post_max_size, $matches)) {
                                if ($matches[2] == 'M') {
                                    $post_max_size = $matches[1] * 1024 * 1024; // nnnM -> nnn MB
                                } else if ($matches[2] == 'K') {
                                    $post_max_size = $matches[1] * 1024; // nnnK -> nnn KB
                                }
                                else if ($matches[2] == 'G') {
                                    $post_max_size = $matches[1] * 1024 * 1024 * 1024; // nnnK -> nnn KB
                                }
                            }
    
                            $ok = ($post_max_size >= 1024 * 1024 * 1024); // at least 1G?
                            
                          @endphp
    
                      </td>
                      <td>
                        {{ ini_get('post_max_size') }}
                      </td>
                      <td>
                        {{ __('1G') }}
                      </td>
                      <td>
                          
    
                        @if ($ok == true)
    
                        @php
                          array_push($servercheck, 1);
                        @endphp
    
                          <i class="text-success fas fa-check"></i>
    
                        @else
    
                        @php
                          array_push($servercheck, 0);
                        @endphp
    
                          <i class="text-danger fas fa-times"></i>
    
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td><b>{{storage_path()}}</b> {{ __('is writable') }}?</td>
                      @php
                        $path = storage_path();
                      @endphp
                      <td>
                        {{ is_writable($path) ? "Writable" : "Non-Writable" }}
                     </td>
                     <td>
                       {{__("Yes")}}
                     </td>
                      <td>
                       
                        @if(is_writable($path))
    
                        @php
                        array_push($servercheck, 1);
                        @endphp
                        <i class="text-success fas fa-check"></i>
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td><b>{{base_path('bootstrap/cache')}}</b> {{ __('is writable') }}?</td>
                      @php
                        $path = base_path('bootstrap/cache');
                      @endphp
                      <td>
                         {{ is_writable($path) ? "Writable" : "Non-Writable" }}
                      </td>
                      <td>
                        {{__("Yes")}}
                      </td>
                      <td>
                        
                        @if(is_writable($path))
    
                        @php
                          array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
                        @else
    
                        @php
                        array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
                        @endif
                      </td>
                    </tr>
    
                    <tr>
                      <td><b>{{storage_path('framework/sessions')}}</b> {{ __('is writable') }}?</td>
                      @php
                        $path = storage_path('framework/sessions');
                      @endphp
                       <td>
                        {{ is_writable($path) ? "Writable" : "Non-Writable" }}
                      </td>
                      <td>
                        {{__("Yes")}}
                      </td>
                      <td>
                       
                        @if(is_writable($path))
    
                        @php
                          array_push($servercheck, 1);
                        @endphp
    
                        <i class="text-success fas fa-check"></i>
                        @else
    
                        @php
                          array_push($servercheck, 0);
                        @endphp
    
                        <i class="text-danger fas fa-times"></i>
                        @endif
                      </td>
                    </tr>
    
    
                  </tbody>
                </table>
              </div>
            </div>

          </div>
          @if(!in_array(0, $servercheck))
          <button class="float-right step1btn btn btn-primary"
            type="submit">{{ __('Continue to Installation') }}...</button>
          @else
          <p class="pull-right text-danger">
            <b>{{ __('Some settings are missing. Contact your host provider for enable it.') }}</b> <a target="__blank" href="https://mediacitydocs.gitbook.io/emart-laravel-multi-vendor-ecommerce-advanced-cms/installation/server-requirements"> <b>Know more here</b> </a> </p>
          @endif
        </form>
      </div>
    </div>
    <p class="text-center m-3 text-white">&copy;{{ date('Y') }} | <a class="text-white"
        href="http://mediacity.co.in">{{ __('Media City') }}</a></p>
  </div>

  <div class="corner-ribbon bottom-right sticky green shadow">{{ __('Server Check') }} </div>
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
</body>

</html>