@extends('layouts.master')
@section('title',__('Create a new role'))
<!-- Start Breadcrumbbar -->
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-md-12 col-lg-8">
            <h4 class="page-title">{{ __("Roles and permissions") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('roles.index') }}">{{ __('Roles & Permissions') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Add new role') }}
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
@endsection
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
@section('maincontent')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('roles.index') }}" title="Go back" role="button"
                    class="float-right btn btn-primary-rgba"><i class="feather icon-arrow-left"></i> {{ __("Back") }}</a>
                <h5 class="card-title">{{ __('Create a new role') }}</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <div class="form-group">
                        <label for="name" class="text-dark">Role name <span class="text-danger">*</span></label>
                        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="Enter role name" value="{{ old('name') }}" required autofocus>

                        <input type="hidden" name="guard" value="web">

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="invalid-feedback">
                            {{ __('Please enter role name !') }}
                        </div>
                    </div>

                    <div class="form-group">


                        <label class="text-dark">{{ __('Assign Permissions to role') }}</label>
                        <hr>

                        <table class="permissionTable table table-bordered">
                            <th>
                                {{ __("Section") }}
                            </th>

                            <th>
                                {{ __("Action") }}
                            </th>

                            <th>
                                #
                            </th>
                            <tbody>
                                <tr>
                                    <td>
                                        {{ __("Login") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'can'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('can.', '', $p['name']) }}</label>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        {{ __("Users") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'users'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('users.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        {{ __("Exercise") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'exercise'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('exercise.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __("Dashboard") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'dashboard'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('dashboard.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __("Measurements") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'measurements'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('measurements.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __("Locker") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'locker'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('locker.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __("Slider") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'slider'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('slider.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __("Faq") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'faq'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('faq.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __("Pages") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'pages'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('pages.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __("Blogs") }}}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'blogs'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('blogs.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      {{ __("  PT Subscription") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'pt'))
                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('pt.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      {{ __("Packages") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'packages'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('packages.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       {{ __("Fees") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'fees'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('fees.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      {{ __("Diet") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'diet.'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('diet.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       {{ __(" Diet Session") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'diet_session'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('diet_session.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __("Diet Content") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'diet_content'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('diet_content.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       {{ __(" Supplement") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'supplement'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('supplement.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      {{ __("  Trainer List") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'trainer_list'))
                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('trainer_list.', '', $p['name']) }}</label>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       {{ __(" Trainer Packages") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'trainerp'))
                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('trainerp', '', $p['name']) }}</label>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __("Trainer") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'trainer.'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('trainer.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      {{ __("  Member Attendance") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'member_attendance'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('member_attendance.', '', $p['name']) }}</label>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                       {{ __(" Staff Attendance") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'staff_attendance'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('staff_attendance.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                <tr>
                                    <td>
                                        {{ __("Enquiry") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'enquiry'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('enquiry.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __("Group") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'group'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('group.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __("Todo") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'todo'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('todo.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                      {{ __("Site Settings") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'settings'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('settings.', '', $p['name']) }}</label>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __("Services") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'services'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('services.', '', $p['name']) }}</label>
                                        @endif
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        {{ __("Roles") }}
                                    </td>
                                    <td>
                                        <label>
                                            <input class="selectall" type="checkbox" name="customCheckboxInline2">
                                            &nbsp;{{ __('Select all') }}
                                        </label>
                                    </td>
                                    <td>
                                        @foreach($role_permission as $p)
                                        @if(strstr($p->name, 'roles'))

                                        <input class="permissioncheckbox" type="checkbox"
                                            id="customCheckboxInline{{ $p['id'] }}" value="{{ $p['name'] }}"
                                            name="permissions[]">
                                        <label
                                            for="customCheckboxInline{{ $p['id'] }}">&nbsp;{{ str_replace('roles.', '', $p['name']) }}</label>

                                        @endif
                                        @endforeach
                                    </td>
                                </tr>


                            </tbody>
                        </table>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary">
                            <i class="feather icon-plus"></i> {{ __("Create") }}
                        </button>
                        <a role="button" href="{{ route('roles.index') }}" class="btn btn-md btn-secondary">
                            <i class="feather icon-arrow-left"></i> {{ __("Back") }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
<!-- End Contentbar -->
@section('script')
<script src="{{ url('js/checkbox.js') }}"></script>
@endsection
