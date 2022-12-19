@extends('layouts.master')
@section('title',__('All Blogs'))
@section('breadcum')
	<div class="breadcrumbbar breadcrumbbar-one">
        <div class="row align-items-center">
            <div class="col-md-4 col-lg-5">
                <h4 class="page-title">{{ __("Blogs") }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                        	{{ __('Blogs') }}
                        </li>
                    </ol>
                </div>
            </div>
        </div>          
    </div>
@endsection
@section('maincontent')
<!-- Start Contentbar -->
<div class="row">
    <div class="col-md-5 col-lg-4">
        <form action="" method="get">
            <div class="input-group mb-4">
                <input type="search" for="search" id="search" onsearch="OnSearch(this)" name="search"
                    value="{{ app('request')->input('search') }}" class="form-control" placeholder="{{ __("Search") }}">
                <span class="input-group-prepend">
                    <button type="submit" class="btn btn-primary"><i
                            class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        @if(app('request')->input('search') != '')
        <a role="button" title="Back" href="{{ route('blog.index') }}" name="clear" value="search" id="clear_id"
            class="btn btn-warning btn-xs">
            {{ __("Clear Search") }}
        </a>
        @endif
    </div>
    <div class="col-md-7 col-lg-8">
        <div class="top-btn-block text-right">
            <a href="{{route('blog.create')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>{{ __("Add blog") }}</a>
            <a href="{{ route('blo.index') }}" class="btn btn-success-rgba mr-2"><i class="feather icon-download-cloud mr-2"></i>{{ __("Recycle") }}</a>
            <br><br>
        </div>
    </div>
</div>
<div class="blog-admin-main-block">
    <div class="row">
        @foreach($blogs as $key => $item)
        <div class="col-md-6 col-lg-6 col-xl-4">
            <div class="card m-b-30">
                <div class="blog-admin-img">
                    @if($item->image != '' &&
                    file_exists(public_path().'/image/blog/'.$item->image))
                    <img title="{{ $item->title }} " class="img-rounded img-fluid blog-img" src="{{url('/image/blog/'.$item->image)  }}"
                    >
                    @else
                    <img class="rounded img-fluid blog-img" title="{{ $item->name }} " src="{{ url('/image/default/default.jpg') }}"
                        alt="No Photo">
                    @endif
                </div>
                <div class="blog-admin-badge">
                    <p class="text-center mb-3"><span class="badge badge-danger text-uppercase">{{ $item->title}}</span></p>
                </div>
                <div class="card-body">
                    <h5 class="card-title font-18">{{ $item->category['title'] }}</h5>
                    <p class="read-more">{!! str_limit(strip_tags($item->detail) , 50) !!}
                        @if( strlen(strip_tags($item->detail)) > 50)
                        @endif
                    </p>
                </div>
                <div class="card-footer blog-footer">
                    <div class="row align-items-center">
                        <div class="col-md-7">
                            <div class="blog-meta">
                                <ul class="list-inline mb-0">
                                    <li class="list-inline-item">{{ __("By") }} <a href="{{route('users.index') ,$item->id }}"><strong>{{ $item->user?$item->user->name:'' }}</strong></a></li>
                                    <li class="list-inline-item">|</li>
                                    <li class="list-inline-item">{{ $item->created_at->format('Y-m-d')}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="blog-link">
                                <div class="admin-table-action-block">
                                    <a href="{{route('blog.edit', $item->id)}}" class="btn btn-xm btn-success-rgba"><i
                                            class="feather icon-edit-2"></i></a>
                                            <button type="button" class="btn btn-xm btn-danger-rgba" data-toggle="modal"
                                        data-target="#deleteModal{{$item->id}}"><i class="feather icon-trash"></i></button>

                                    <div id="deleteModal{{$item->id}}" class="delete-modal modal fade" role="dialog">
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
                                                    {!! Form::open(['method' => 'DELETE', 'route' =>
                                                    ['blog.destroy', $item->id]]) !!}
                                                    <button type="reset" class="btn btn-dark"
                                                        data-dismiss="modal">{{ __("No") }}</button>
                                                    <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="mx-auto card-pagination">
    {{ $blogs->appends(request()->except('page'))->links() }}
</div>
<!-- End Contentbar -->
@endsection
@section('script')

@endsection