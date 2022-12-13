@extends('layouts.master')
@section('title',__('Users'))
<!-- Start Breadcrumbbar -->
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-8 col-md-6">
            <h4 class="page-title">{{ __("All Users") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('Users') }}
                    </li>
                </ol>
            </div>
        </div>
        @if(auth()->user()->can('users.add'))
        <div class="col-lg-4 col-md-6">
            <form action="" method="get">
                <div class="input-group">
                    <input type="hidden" name="filter" value="{{ app('request')->input('filter') ?? '' }}">

                    <input type="search" for="search" id="search" onsearch="OnSearch(this)" name="search"
                        value="{{ app('request')->input('search') }}" class="form-control" placeholder="{{ __("Search User") }}">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </span>
                  </div>
            </form>
            @if(app('request')->input('search') != '')
            <a role="button" title="Back" href="{{ route('users.index') }}" name="clear" value="search" id="clear_id"
                class="btn btn-warning btn-xs">
                {{ __("Clear Search") }}
            </a>
            @endif

        </div>
        @endif
    </div>
</div>
@endsection
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
@section('maincontent')
<section class="all-user-top-bar">
    <div class="row">
        <div class="col-md-4 col-12">
            <h5 class="user-card card-title">{{ __('All users') }}</h5>
        </div>
        <div class="col-md-8 col-12">
            @if(auth()->user()->can('users.add'))
            <div class="card-header text-right">
                <a title="Create a new role" href="{{ route('users.create') }}" class="btn btn-sm btn-primary-rgba mr-2">
                    {{ __("+ Add new user") }}
                </a>
                <a href="{{route('use.index')}}" class="btn btn-success-rgba mr-2"><i
                        class="feather icon-download-cloud mr-2"></i>{{ __("Recycle") }}</a>

                <form action="" method="GET" class="filter-role">
                    <select data-placeholder="{{ __("Filter by role") }}" name="roles" id="roles" class="float-left select2 rolesdrop">
                        <option value="">{{ __("Filter by role") }}</option>
                        <option value="all" {{ request()->get('roles') == 'all' ? "selected" : " "}}>{{ __("All") }}
                        </option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ request()->get('roles') == $role->name ? "selected" : " "}}>
                            {{ $role->name }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            @endif
        </div>
    </div>
</section>

<div class="all-user-block">
    <div class="table-responsive">
        <table id="userstable" class="table table-borderd">
            <tbody>
                <div class="row">
                    @foreach($users as $key => $item)
                    <div class="col-lg-6 col-xl-4 col-md-6">
                        <div class="card doctor-box m-b-50">
                            <div class="card-body text-center">

                                @if($item->membership == 'yes')

                                <div class="ribbon ribbon-top-right">
                                    <span class="badge badge-success ">
                                        <i class="ti-crown w3-xxxlarge"></i>
                                        {{ $item->membership == 'yes' ? "VIP" : "" }}</span>
                                </div>

                                @elseif($item->demo == 'yes')
                                <div class="ribbon ribbon-top-right">
                                    <span class="badge badge-success ">
                                        {{ $item->demo == 'yes' ? "Demo" : "" }}</span>
                                </div>
                                @endif
                                <div>
                                    @if($item->photo != '' &&
                                    file_exists(public_path().'/media/users/'.$item->photo))
                                    <img class="img-fluid user-img"
                                        src="{{url('media/users/'.$item->photo)}}" title="{{ $item->name }}">
                                    @else
                                    <img class="margin-top-15 user-img"
                                        title="{{ $item->name }}" src="{{ Avatar::create($item->name)->toBase64() }}" />
                                    @endif
                                </div>
                                <br>
                                <div class="card user-card-one">
                                    <div class="text-dark">

                                        {{ $item->name  }}
                                    </div>

                                    <div>
                                        {{ $item->email  }}
                                    </div>
                                    <div>
                                        {{ $item->mobile  }}
                                    </div>

                                    <br>

                                    <div class="button-list">
                                        <div class="card-footer text-center">

                                            <div class="row mb-15">
                                                <div class="col-4 border-right">
                                                    <h4><a href="{{ route('trainerlist.index',['id' => base64_encode($item->id) ]) }}"
                                                            class="text-muted"><i class="feather icon-user-plus"></i>
                                                    </h4>
                                                    <small>{{ __("Trainer") }}</small></a>
                                                </div>
                                                <div class="col-4 border-right">
                                                    <h4><a href="{{ route('exercisepackage.index',['id' => base64_encode($item->id) ]) }}"
                                                            class="text-muted"><i class="fa fa-bicycle text-muted"></i>
                                                    </h4>
                                                    <small>{{ __("Exercise") }}</small></a>
                                                </div>
                                                <div class="col-4">
                                                    <h4><a href="{{ route('dietpackage.index',['id' => base64_encode($item->id) ]) }}"
                                                            class="text-muted"><i class="feather icon-pie-chart"></i>
                                                    </h4>

                                                    <small>{{ __("Diet") }}</small></a>
                                                </div>
                                            </div>
                                            <div class="row mb-15">
                                                <div class="col-4 border-right">
                                                    <h4><a href="{{ route('measurement.index',['id' => base64_encode($item->id) ]) }}"
                                                            class="text-muted"><i
                                                                class="fa fa-balance-scale text-muted"></i>
                                                    </h4>
                                                    <small>{{ __("Measurement") }}</small></a>
                                                </div>
                                                <div class="col-4 border-right">
                                                    <h4><a href="{{ route('locker.index',['id' => base64_encode($item->id) ]) }}"
                                                            class="text-muted"><i class="	feather icon-lock"></i></h4>
                                                    <small>{{ __("Locker") }}</small></a>
                                                </div>
                                                @if( Auth::user()->roles->first()->name == 'Super Admin' )
                                                <div class="col-4">
                                                    <h4> <a href="{{ route('users.edit',$item->uuid)}}"
                                                            class="text-muted"><i class="fa fa-edit text-muted"></i>
                                                    </h4>
                                                    <small>{{ __("Edit") }}</small></a>
                                                </div>
                                                @endif

                                            </div>
                                            @if(auth()->user()->can('users.add'))

                                            <div class="row mb-15">
                                                <div class="col-4 border-right">
                                                    <h4><a href="{{ route('useraslogin',['id' => $item->id]) }}"
                                                            class="text-muted"><i class="fa fa-key text-muted"></i>
                                                    </h4>
                                                    <small>{{ __("Login As User") }}</small></a>
                                                </div>

                                                <div class="col-4 border-right">
                                                    <div class="blog-link">
                                                        <div class="admin-table-action-block">
                                                            <button type="button" class="btn btn-lg-btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#deleteModal{{$item->id}}">
                                                                <h4><i class="feather icon-trash userdelete"></i></h4>
                                                                <small class="text-muted">{{ __("Delete") }}</small>
                                                            </button>

                                                            <div id="deleteModal{{$item->id}}"
                                                                class="delete-modal modal fade" role="dialog">
                                                                <div class="modal-dialog modal-sm">

                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal">&times;</button>
                                                                            <div class="delete-icon"></div>
                                                                        </div>
                                                                        <div class="modal-body text-center">
                                                                            <h4 class="modal-heading">{{ __("Are You Sure ?") }}</h4>
                                                                            <p>{{ __("Do you really want to delete these records? This process cannot be undone.") }}</p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            {!! Form::open(['method' =>
                                                                            'DELETE', 'route' =>
                                                                            ['users.destroy', $item->id]]) !!}
                                                                            <button type="reset" class="btn btn-dark"
                                                                                data-dismiss="modal">{{ __("No") }}</button>
                                                                            <button type="submit"
                                                                                class="btn btn-danger">{{ __("Yes") }}</button>
                                                                            {!! Form::close() !!}
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
            </tbody>
        </table>
        <div class="mx-auto card-pagination">
            {{ $users->links() }}

        </div>
    </div>
</div>
@endsection
<!-- End Contentbar -->
@section('script')

<script>
    $('.rolesdrop').on('change', function () {
        var val = $(this).val();

        const urlParams = new URLSearchParams(window.location.search);

        urlParams.set('roles', val);

        window.location.search = urlParams;

    });
</script>
@endsection