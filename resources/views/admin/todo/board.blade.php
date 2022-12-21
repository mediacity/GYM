@extends('layouts.master')
@section('title',__('All Todo Boards'))
@section('breadcum')
<div class="breadcrumbbar breadcrumbbar-one">
    <div class="row align-items-center">
        <div class="col-lg-4 col-md-6">
            <h4 class="page-title">{{ __("Dashboard") }}</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ __('Dashboard') }}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        {{ __('All Board') }}
                    </li>
                </ol>
            </div>
        </div>
        <div class="col-lg-8 col-md-6">
            <div class="top-btn-block text-right">
				<a href="{{url('admin/todo')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-list mr-2"></i>{{ __("My Boards") }}</a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('maincontent')
<!-- Start Contentbar -->    
<div class="">  
	<div class="row">
		<div class="col-lg-12">
			<div class="card m-b-30">
				<div class="card-header">                                
					<div class="row align-items-center">
						<div class="col-6">
							<h5 class="card-title mb-0">{{ __("All Todo Boards") }}</h5>
						</div>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table id="datatable-buttons" class="table table-borderless">
							<thead>
								<tr>
									<th> 
									  #</th>
									<th>{{ __("Title") }}</th>
									<th>{{ __("Owner") }}</th>
									<th>{{ __("Assigned To") }}</th>
									<th>{{ __("Tasks") }}</th>
									<th>{{ __("Completed") }}</th>
									<th>{{ __("Checked") }}</th>
									<th>{{ __("Status") }}</th>
									<th>{{ __("Action") }}</th>
									</tr>
								  </thead>
								  @if (isset($boards))
									<tbody>
									  @foreach($boards as $key => $list)
										<tr>
										  <td>
										  {{$key+1}}
										  </td>
										  <td><a href="{{url('admin/todoboard/list/'.$list->id)}}">{{ucfirst($list->title)}}</a>
												@if($list->is_public == 1)
													<span class="badge badge-info font-10 m-l-5">{{ __("Public") }}</span>
												@endif
											</td>
										  <td>
											{{ucfirst($list->user->name ?? '')}}
										</td>
										@if(isset($list->assigned_to->name))
										  <td>{{$list->assigned_to != null ? ucfirst($list->assigned_to->name) : ''}}</td>
										  @endif
										  <td>{{$list->todos->count()}}</td>
										  <td>{{$list->todos->where('is_complete','1')->count()}}</td>
										  <td>{{$list->todos->where('is_checked','1')->count()}}</td>
										  <td>
										  	@if($list->is_active == 1)
										  		<span class="badge badge-success">{{ __("Active") }}</span>
										  	@else
										  		<span class="badge badge-success">{{ __("Inactive") }}</span>
										  	@endif
										  </td>
										  <td>
											<div class="button-list">
												<a href="{{url('admin/todoboard/list/'.$list->id)}}" class="text-info mr-2" title="Edit"><i class="fa fa-eye"></i></a>
												<a href="{{route('todoboard.edit', $list->id)}}" class="text-success mr-2" title="Edit"><i class="feather icon-edit-2"></i></a>
												<a href="#" class="deletemodal text-danger mr-5" data-toggle="modal" data-target="#deleteModal" data-id="{{$list->id}}"  title="Delete"><i class="feather icon-trash"></i></a>
												</div>
									  </td>
									</tr>
								  @endforeach
								</tbody>
						  @endif  
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="deleteModal" class="delete-modal modal fade" role="dialog">
	<div class="modal-dialog modal-sm">
	  <!-- Modal content-->
	  <div class="modal-content">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <div class="delete-icon"></div>
		</div>
		<div class="modal-body text-center">
		  <h4 class="modal-heading">{{ __("Are You Sure ?") }}</h4>
		  <p>{{ __("Do you really want to delete these records? This process cannot be undone.") }}</p>
		</div>
		<div class="modal-footer">
		  {!! Form::open(['method' => 'DELETE', 'url' => 'admin/todoboard','id' => 'deleteform']) !!}
			  <button type="reset" class="btn btn-dark" data-dismiss="modal">{{ __("No") }}</button>
			  <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
		  {!! Form::close() !!}
		</div>
	  </div>
	</div>
</div>
<!-- End Contentbar -->
@endsection 
@section('script')
@endsection 
