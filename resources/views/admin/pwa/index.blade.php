@extends('layouts.master')
@section('title',__('All PWA'))
@section('maincontent')
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('PWA') }}
@endslot
@slot('menu1')
{{ __('PWA') }}
@endslot
@endcomponent
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">{{ __('ProgressiveWebAppSetting') }}</h5>
      </div>
      <div class="card-body">
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
              aria-controls="pills-home" aria-selected="true">{{ __("Https") }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
              aria-controls="pills-profile" aria-selected="false">{{ __("StartURL") }}</a>
          </li>

        </ul>
        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <form action="{{ route('pwa.setting.update') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <div class="form-group">

                <div class="form-group make-switch pwa-switch custom-switch">
                  <h5 class="bootstrap-switch-label">{{__('EnablePWA')}}</h5>
                  <div class="pwa-switch-input">
                    <input type="checkbox" id="switch" class="custom-control-input" value="1"
                      {{ env("PWA_ENABLE") =='1' ? "checked" : "" }} data-on-text="{{__('On')}}"
                      data-off-text="{{__('OFF')}}" name="PWA_ENABLE">
                    <label class="custom-control-label" for="switch"></label>
                  </div>

                </div>
              </div>

              <div class="form-group">
                <label>{{__('AppName')}}: </label>
                <input class="form-control" type="text" name="app_name" value="{{ env("PWA_NAME")}}" />
              </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>{{__('ThemeColorForHeader')}}: </label>
                    <input name="PWA_THEME_COLOR" class="form-control" type="color"
                      value="{{env('PWA_THEME_COLOR') ?? '' }}" />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">{{__('BackgroundColor')}}:</label>
                    <input name="PWA_BG_COLOR" class="form-control" type="color"
                      value="{{ env('PWA_BG_COLOR') ?? '' }}" />
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-5">

                  <div class="form-group">
                    <label for="">{{__('ShortcutIconForHome')}}: <span class="text-danger">*</span> </label>
                    <div class="custom-file">
                      <input name="shorticon_1" type="file"
                        class="custom-file-input @error('shorticon_1') is-invalid @enderror" id="shorticon_1">
                      <label class="custom-file-label"
                        for="shorticon_1">{{ __("Select icon for login (96 x 96)") }}</label>
                    </div>

                    @error('shorticon_1')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                @if(env('SHORTCUT_ICON1') != NULL)
                <div class="col-md-1 card text-center">
                  @if(env('SHORTCUT_ICON1') != NULL)
                  <div class="card-body">
                    <img class="img-responsive" src="{{ url('images/icons/'.env('SHORTCUT_ICON1'))}}"
                      alt="{{ 'shorticon_1' }}">
                  </div>
                  @endif
                </div>
                @endif
                <div class="col-md-5">
                  <div class="form-group">
                    <label for="">{{__('ShortcutIconForLogin')}}: <span class="text-danger">*</span> </label>

                    <div class="custom-file">
                      <input name="shorticon_2" type="file"
                        class="custom-file-input @error('shorticon_2') is-invalid @enderror" id="shorticon_2">
                      <label class="custom-file-label"
                        for="shorticon_2">{{ __("Select icon for home (96 x 96)") }}</label>
                    </div>

                    @error('shorticon_2')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                @if(env('SHORTCUT_ICON2') != NULL)
                <div class="col-md-1 card text-center">

                  <div class="card-body">
                    <img class="img-responsive" src="{{ url('images/icons/'.env('SHORTCUT_ICON2'))}}"
                      alt="{{ 'shorticon_2' }}">
                  </div>

                </div>
                @endif
               </div>
                <button data-loading-text="<i class='fa fa-spinner fa-spin'></i> Saving..." type="submit"
                class="btn btn-default btn-add">
                {{__('SaveChanges')}}
              </button>
            </form>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <form action="{{ route('pwa.icons.update') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                     <label>{{__('PWAIcon')}} (512x512): <span class="text-danger">*</span> </label>
                       <div class="custom-file">
                      <input name="icon_512" type="file"
                        class="custom-file-input @error('icon_512') 'is-invalid' @enderror" id="icon_512">
                      <label class="custom-file-label" for="icon_512">{{ __("Select icon (512 x 512)") }}</label>
                    </div>

                    @error('icon_512')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <button data-loading-text="<i class='fa fa-spinner fa-spin'></i> Updating..." type="submit"
                    class="btn btn-default btn-add">
                    {{__('UpdateIcon')}}
                  </button>
                </div>

              </div>
              <br>

              <h4>{{__('SplashScreens')}}:</h4>

              <div class="row">

                <div class="col-md-6">

                  <div class="form-group">


                    <label>{{__('PWASplashScreen')}}{{ __(" (2048x2732): ") }}<span class="text-danger">*</span> </label>

                    <div class="custom-file">
                      <input name="splash_2048" type="file"
                        class="custom-file-input @error('splash_2048') 'is-invalid' @enderror" id="splash_2048">
                      <label class="custom-file-label"
                        for="splash_2048">{{ __("Select splash screen (2048x2732)") }}</label>
                    </div>

                    @error('splash_2048')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <button data-loading-text="<i class='fa fa-spinner fa-spin'></i> Updating..." type="submit"
                    class="btn btn-default btn-add">
                    {{__('UpdateScreen')}}
                  </button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
