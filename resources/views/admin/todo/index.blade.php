@section('title') 
@endsection 
@extends('layouts.master')
@section('rightbar-content')
<!-- Start Breadcrumbbar -->                    
<div class="breadcrumbbar">
	<div class="row align-items-center">
		<div class="col-md-12 col-lg-6">
			<h4 class="page-title">{{ __("Todos") }}</h4>
			<div class="breadcrumb-list">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{url('admin')}}">{{ __("Dashboard") }}</a></li>
					<li class="breadcrumb-item"><a href="{{url('admin/todoboard')}}">{{ __("all boards") }}</a></li>
					<li class="breadcrumb-item"><a href="#">{{ __("all todos") }}</a></li>
				</ol>
			</div>
		</div>
	</div>          
</div>
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->    
<div class="contentbar">  
	<div class="row">
		<div class="col-lg-12">
			<div class="card m-b-30">
				<div class="card-header">                                
					<div class="row align-items-center">
						<div class="col-6">
							<h5 class="card-title mb-0">{{ __("All Todos") }}</h5>
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
									<th>{{ __("Created By") }}</th>
									<th>{{ __("Date") }}</th>
									<th>{{ __("Complete Status") }}</th>
									<th>{{ __("Status") }}</th>
									<th>{{ __("Action") }}</th>
									</tr>
								  </thead>
								  @if (isset($todos))
									<tbody>
									  @foreach($todos as $key => $list)
										<tr>
										  <td>
										  {{$key+1}}
										  </td>
										  <td>{{ucfirst(str_limit($list->task,20))}}
										  	<br><span class="badge badge-secondary font-10 m-r-5">{{ucfirst($list->board->title)}}</span>
												@if($list->priority == 'h')
													<span class="badge badge-danger-inverse font-10">{{ __("High") }}</span>
												@elseif($list->priority == 'm')
													<span class="badge badge-success-inverse font-10">{{ __("Medium") }}</span>
												@else
													<span class="badge badge-info-inverse font-10">{{ __("Low") }}</span>
												@endif
											</td>
										  <td>{{ucfirst($list->user->name)}}</td>
										  <td>{{ __("Assigned On:") }} <b>{{$list->assigned_on != null ? date('d M Y',strtotime($list->assigned_on)) : ''}}</b>
										  		<br> {{ __("Due On:") }} <b>{{$list->due_on != null ? date('d M Y',strtotime($list->due_on)) : ''}}</b>
										  </td>
										  <td>{{ __("Completed On:") }} <b>{{$list->completed_on != null ? date('d M Y',strtotime($list->completed_on)) : ''}}</b>
										  		<br>{{ __("Checked On: ") }}<b>{{$list->checked_on != null ? date('d M Y',strtotime($list->checked_on)) : ''}}</b>
										  </td>
										  <td>{{$list->is_checked == 1 ? 'Checked & Complete' : ($list->is_complete == 1 ? 'Complete' : 'Not Complete')}}</td>
										  <td>
											<div class="button-list">
												<a href="#" class="btn btn-sm btn-success-rgba mr-2 todo-editbtn" data-toggle="modal" data-id="{{$list->id}}" title="Edit"><i class="feather icon-edit-2"></i></a>
												<a href="#" class="deletemodal btn btn-sm btn-danger-rgba mr-5" data-toggle="modal" data-target="#deleteModal" data-id="{{$list->id}}"  title="Delete"><i class="feather icon-trash"></i></a>
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
<!-- Modal -->
<div id="todoeditModal" class="edit-modal modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
	  <div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">{{ __("Edit Task") }}</h5>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <div class="delete-icon"></div>
			</div>
			<div class="todo-edit-modal modal-body">
				 @include('admin.todo.edit') 
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
		  {!! Form::open(['method' => 'DELETE', 'url' => 'admin/todo','id' => 'deleteform']) !!}
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
