@extends('layouts.master')
<!-- Start Breadcrumbbar -->
@section('title',__('Add Todo'))
@section('maincontent')
@component('components.breadcumb',['thirdactive' => 'active'])
@slot('heading')
{{ __('Todo') }}
@endslot
@slot('menu1')
{{ __('Board') }}
@endslot
@slot('menu2')
{{ __('All Board') }}
@endslot
@slot('button')
@if(Auth::user()->roles->first()->name == 'Trainer' || Auth::user()->roles->first()->name == 'Super Admin' )
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="{{\Request::is('admin/todo') ? '#' : url('admin/todo')}}" class="btn btn-primary-rgba mr-2"
        id="show"><i class="feather icon-plus mr-2"></i>{{ __("Add Board") }}</a>
        <a href="{{url('admin/todoboard')}}" class="btn btn-danger-rgba mr-2"><i
        class="feather icon-list mr-2"></i>{{ __("All Boards") }}</a>
    </div> 
</div>
@endif
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start Contentbar -->
<div class="contentbar">
    <div class="row add-form {{\Request::is('admin/todo') ? 'hide-block' : ''}}">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="close-sign"><a href="{{request()->is('admin/todoboard/*') ? url('admin/todo') : '#'}}"
                            class="btn btn-info btn-sm pull-right" id="hide"><i class="fa fa-close"></i></a></div>
                    @if(isset($todoboard))
                    <h5 class="card-title">{{ __("Edit Board") }}</h5>
                    {!! Form::model($todoboard, ['method' => 'PATCH', 'route' => ['todoboard.update',
                    $todoboard->id],'files'=>'true']) !!}
                    @else
                    <h5 class="card-title">{{ __("Add Board") }}</h5>
                    {!! Form::open(['method' => 'POST', 'route' => 'todoboard.store','files'=>'true']) !!}
                    @endif
                    {!! Form::hidden('created_by', $auth->id, ['class' => 'form-control','required']) !!}
                    <div class="row">
                        <div class="{{$auth->role_id == 'Super Admin' ? 'col-lg-4' : 'col-lg-8'}} col-sm-12">
                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                {!! Form::label('title', 'Title',['class'=>'required']) !!}
                                {!! Form::text('title', null, ['class' =>
                                'form-control','required','placeholder'=>'Enter Title']) !!}
                                <small class="text-danger">{{ $errors->first('title') }}</small>
                            </div>
                        </div>
                         <div class="col-lg-4 col-sm-12">
                            <div class="form-group{{ $errors->has('assigned_to') ? ' has-error' : '' }}">
                                {!! Form::label('assigned_to', 'Assigned To') !!}
                                {!! Form::select('assigned_to', $users, null, ['class' => 'select2
                                form-control','placeholder' => 'Please Select']) !!}
                                <small class="text-danger">{{ $errors->first('assigned_to') }}</small>
                            </div>
                        </div>
                      </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group{{ $errors->has('is_public') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-lg-5 col-5">
                                        {!! Form::label('is_public', 'If Public Board') !!}
                                    </div>
                                    <div class="col-lg-2 col-5 custom-switch">
                                        {!! Form::checkbox('is_public', 1, isset($todoboard) ? $todoboard->is_public :
                                        0, ['class' => 'custom-control-input']) !!}
                                        <label class="custom-control-label" for="is_public"></label>
                                    </div>
                                </div>
                                <small class="text-info">{{ __("** If public, this board will show to everyone.") }}</small>
                                <small class="text-danger">{{ $errors->first('is_public') }}</small>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-12">
                            <div class="form-group{{ $errors->has('todo_active') ? ' has-error' : '' }}">
                                <div class="row">
                                    <div class="col-lg-5 col-5">
                                        {!! Form::label('todo_active', 'Status') !!}
                                    </div>
                                    <div class="col-lg-2 col-2 custom-switch">
                                        {!! Form::checkbox('todo_active', 1, isset($todoboard) ? $todoboard->is_active :
                                        1, ['class' => 'custom-control-input']) !!}
                                        <label class="custom-control-label" for="todo_active"></label>
                                    </div>
                                </div>
                                <small class="text-danger">{{ $errors->first('todo_active') }}</small>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            <div class="form-group">
                                @if(isset($todoboard))
                                <button type="submit" class="btn btn-success">{{ __("Update") }}</button>
                                @else
                                <button type="reset" class="btn btn-danger-rgba"><i class="fa fa-ban"></i> {{ __("Reset") }}</button>
                                <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle"></i>
                                    {{ __("Create") }}</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @if(isset($boards))
        @foreach($boards as $item)
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="header-info inline">
                        @if(isset($item) && $item->created_by == $auth->id || $auth->role_id == 1)
                        <div class="inline pull-right">
                            <a href="{{route('todoboard.edit', $item->id)}}" class="text-success mr-2"
                                title="Edit {{ $item->title }}"><i class="feather icon-edit-2"></i></a>
                            <a href="#" class="deletemodal text-danger" data-toggle="modal" data-target="#deleteModal"
                                data-id="{{$item->id}}" data-url="{{ url('/admin/todoboard') }}" title="Delete"><i
                                    class="feather icon-trash"></i></a>
                        </div>
                        @endif
                        <h5 class="card-title mb-0"><b>{{ucfirst($item->title)}}</b>
                            @if($item->is_public == 1)
                            <span class="badge badge-info font-10 m-l-5">{{ __("Public") }}</span>
                            @endif
                        </h5>
                         @if($item->assigned_to != null)
                        <small class=""><i class="fa fa-user mr-2"></i>{{ucfirst($item->user->name)}},</small>
                        <small class="">{{ucfirst($item->assignedto->name ?? '-')}}</small>
                        @endif
                        @if($item->is_public == 1)
                        <small class=""><i class="fa fa-user mr-2"></i>{{ __("By") }} {{ucfirst($item->user->name)}}</small>
                        @endif
                    </div>
                    
                 </div>
                <div class="card-body todo-board">
                    <div id="kanban-board-{{$item->id}}">
                        @forelse($item->cards as $card)
                        <div class="card bg-primary-rgba m-b-20">
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <div class="todo-cursor" data-toggle="modal"
                                            data-target="#tasksModal{{ $card->id }}">
                                            <div class="kanban-tag">
                                                <h5 class="mb-0">
                                                    {{ $card->name }}
                                                </h5>
                                                <small>
                                                    <i class="feather icon-eye"></i>
                                                    ({{$card->tasks()->where('is_complete','1')->count()}}/{{$card->tasks()->count()}})
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="kanban-menu">
                                            <div class="dropdown">
                                                <button class="btn btn-link p-0 m-0 border-0 l-h-20 font-16"
                                                    type="button" id="KanbanBoardButton2" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false"><i
                                                        class="feather icon-more-vertical-"></i></button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    aria-labelledby="KanbanBoardButton2">

                                                    <a data-card_detail="{{ $card->detail }}"
                                                        data-cardtitle="{{ $card->name }}" data-cardid="{{ $card->id }}"
                                                        data-toggle="modal" data-target="#editcard"
                                                        class="dropdown-item" href="#"><i
                                                            class="feather icon-edit-2 mr-2"></i>{{ __("Edit") }}</a>

                                                    <a data-cardid="{{ $card->id }}" data-cardtitle="{{ $card->name }}"
                                                        data-toggle="modal" data-target="#deleteModalForCard"
                                                        class="dropdown-item" href="#"><i
                                                            class="feather icon-trash mr-2"></i>{{ __("Delete") }}</a>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div id="tasksModal{{ $card->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="my-modal-title" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="my-modal-title">
                                                    {{ $card->name }} ({{$card->tasks()->where('is_complete','1')->count()}}/{{$card->tasks()->count()}})
                                                    <br>
                                                    <small>{{ __("in list ") }}{{ $card->board->title }}</small>
                                                </h5>
                                                <button class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @if($card->detail != '')
                                                <div class="bg-secondary-rgba p-3 text-dark">
                                                    {{ $card->detail }}
                                                </div>
                                                <br>
                                                @endif
                                                @forelse($card->tasks as $todo)
                                                <div class="card border-light bg-white-rgba m-b-20">
                                                    <div class="card-body">
                                                        <div class="float-right kanban-menu">
                                                            @if($todo->created_by == $auth->id || $auth->role_id == 1)
                                                            <div class="dropdown">
                                                                <button class="btn btn-link p-0 m-0 border-0 font-14"
                                                                    type="button" id="KanbanBoardButton1"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false"><i
                                                                        class="feather icon-more-vertical-"></i></button>
                                                                <div class="dropdown-menu dropdown-menu-right font-14"
                                                                    aria-labelledby="KanbanBoardButton1">
                                                                    <a href="#" class="dropdown-item todo-editbtn"
                                                                        data-toggle="modal" data-id="{{$todo->id}}"
                                                                        title="Edit"><i
                                                                            class="feather icon-edit-2 mr-2"></i>{{ __("Edit") }}</a>
                                                                    <a href="#" class="dropdown-item deletemodal"
                                                                        data-toggle="modal" data-dismiss="modal" data-target="#deleteModal"
                                                                        data-id="{{$todo->id}}" title="Delete"><i
                                                                            class="feather icon-trash mr-2"></i>{{ __("Delete") }}</a>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <div class="kanban-tag inline p-20">
                                                            <p>{{$todo->task}}</p>
                                                        </div>

                                                        <div class="kanban-footer-block m-t-5">
                                                            <div class="row g-0">
                                                                <div class="col-lg-3 kanban-left-footer">

                                                                    @if($todo->priority == 'h')
                                                                    <span class="badge badge-danger-inverse font-10">{{ __("High") }}</span>
                                                                    @elseif($todo->priority == 'm')
                                                                    <span class="badge badge-success-inverse font-10">{{ __("Medium") }}</span>
                                                                    @elseif($todo->priority == 'l')
                                                                    <span class="badge badge-info-inverse font-10">{{ __("Low") }}</span>
                                                                    @endif
                                                                </div>
                                                                <div class="col-lg-6 kanban-center-footer">
                                                                    @if($todo->is_checked != 1 && $todo->due_on != null)
                                                                    <small class="text-danger">{{ __("Due :") }}
                                                                        {{date('jS M Y', strtotime($todo->due_on))}}</small>
                                                                    @endif
                                                                </div>
                                                                @if($item->is_public != 1)
                                                                <div class="col-lg-3 kanban-footer text-right">
                                                                    {!! Form::open(['method' => 'POST', 'route' =>
                                                                    ['todo.status', $todo->id]])
                                                                    !!}
                                                                    <input type="hidden" name="type" value="1">
                                                                    <div class="custom-control custom-checkbox"
                                                                        data-toggle="tooltip"
                                                                        data-original-title="Complete">
                                                                        {!! Form::checkbox('is_complete', 1,
                                                                        $todo->is_complete == 1 ? 1 : 0,
                                                                        ['id' => 'complete'.$todo->id, 'class' =>
                                                                        'todo-status
                                                                        custom-control-input']) !!}
                                                                        <label class="custom-control-label"
                                                                            for="complete{{$todo->id}}"></label>
                                                                    </div>
                                                                    {!! Form::close() !!}
                                                                    @if($item->assigned_to != null)
                                                                    {!! Form::open(['method' => 'POST', 'route' =>
                                                                    ['todo.status', $todo->id]])
                                                                    !!}
                                                                    <input type="hidden" name="type" value="2">
                                                                    <div class="custom-control custom-checkbox"
                                                                        data-toggle="tooltip"
                                                                        data-original-title="Checked & Complete">
                                                                        {!! Form::checkbox('is_checked', 1,
                                                                        $todo->is_checked == 1 ? 1 : 0,
                                                                        ['id' => 'checked'.$todo->id, 'class' =>
                                                                        'todo-status
                                                                        custom-control-input', $auth->id !=
                                                                        $item->created_by && $auth->role_id
                                                                        != 1 ? 'disabled' : '']) !!}
                                                                        <label
                                                                            class="custom-control-label complete-checkbox"
                                                                            for="checked{{$todo->id}}"></label>
                                                                    </div>
                                                                    {!! Form::close() !!}
                                                                    @endif
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @empty
                                                <div class="card bg-warning-rgba m-b-20">
                                                    <div class="card-body">
                                                        <div class="text-center kanban-tag inline p-20">
                                                            <h6 class="mt-2"> <i class="feather icon-github"></i>
                                                                {{__("No Tasks in this card  ")}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforelse
                                                <div class="task-block">
                                                    <div class="p-1 add-task-block hide-block border">
                                                        {!! Form::open(['method' => 'POST', 'route' => 'todo.store']) !!}
                                                        <input type="hidden" name="board_id" value="{{$item->id}}">
                                                        <input type="hidden" name="created_by" value="{{$auth->id}}">
                                                        <input type="hidden" name="is_active" value="1">
                                                        <div class="row">
                                                           
                                                            <div class="col-sm-12">
                                                                <div
                                                                    class="form-group {{ $errors->has('task') ? ' has-error' : '' }} m-b-10">
                                                                    {!! Form::label('task', 'Add Task',['class'=>'required font-13']) !!}
                                                                    {!! Form::text('task', null, ['class' => 'form-control','required']) !!}
                                                                    <small class="text-danger">{{ $errors->first('task') }}</small>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-7 col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="text-dark" for="calendar">{{ __("Due On") }}</label>
                                                                    <div class="input-group">
                                                                        <input value="{{ old('due_on') }}" class="form-control calendar" type="text"
                                                                            id="" name="due_on">
                                                                        <div class="input-group-append">
                                                                            <span class="input-group-text" id="basic-addon2"><i
                                                                                    class="feather icon-calendar"></i></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-5 col-sm-12">
                                                                <div
                                                                    class="form-group{{ $errors->has('priority') ? ' has-error' : '' }} m-b-10">
                                                                    {!! Form::label('priority', 'Priority',['class'=>'required font-13'])
                                                                    !!}
                                                                    {!! Form::select('priority', ['h' => 'high', 'm' => 'Medium', 'l' =>
                                                                    'Low'],
                                                                    'm', ['required' => 'required','class' => 'form-control','placeholder'
                                                                    =>
                                                                    'Please Select']) !!}
                                                                    <small class="text-danger">{{ $errors->first('priority') }}</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" value="{{ $card->id }}" name="card_id">
                                                        <button type="submit" class="btn btn-info-rgba btn-block btn-lg font-16"><i
                                                                class="fa fa-check-circle mr-2"></i>{{ __("Add Task") }}</button>
                                                        {!! Form::close() !!}
                                                    </div>
                                                    @if($item->cards()->count())
                                                    <button type="button"
                                                        class="add-task-btn btn btn-primary-rgba btn-block btn-lg font-16"><i
                                                            class="feather icon-plus mr-2"></i>{{ __("Add Task") }}</button>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" data-dismiss="modal" class="btn btn-dark-rgba btn-md">
                                                    {{__("Close")}}
                                                </button>
                                                <button data-cardid="{{ $card->id }}" data-cardtitle="{{ $card->name }}" data-toggle="modal" data-target="#deleteModalForCard" type="button" data-dismiss="modal" class="btn btn-danger-rgba btn-md">
                                                    {{__("Delete Card")}}
                                                </button>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="task-block">
                                <div class="p-1 add-task-block hide-block border">
                                    {!! Form::open(['method' => 'POST', 'route' => 'todo.store']) !!}
                                    <input type="hidden" name="board_id" value="{{$item->id}}">
                                    <input type="hidden" name="created_by" value="{{$auth->id}}">
                                    <input type="hidden" name="is_active" value="1">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div
                                                class="form-group {{ $errors->has('task') ? ' has-error' : '' }} m-b-10">
                                                {!! Form::label('task', 'Add Task',['class'=>'required font-13']) !!}
                                                {!! Form::text('task', null, ['class' => 'form-control','required']) !!}
                                                <small class="text-danger">{{ $errors->first('task') }}</small>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-sm-12">
                                            <div class="form-group">
                                                <label class="text-dark" for="calendar">{{ __("Due On") }}</label>
                                                <div class="input-group">
                                                    <input value="{{ old('due_on') }}" class="form-control calendar" type="text"
                                                        id="calendar1" name="due_on">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="basic-addon2"><i
                                                                class="feather icon-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-sm-12">
                                            <div
                                                class="form-group{{ $errors->has('priority') ? ' has-error' : '' }} m-b-10">
                                                {!! Form::label('priority', 'Priority',['class'=>'required font-13'])
                                                !!}
                                                {!! Form::select('priority', ['h' => 'high', 'm' => 'Medium', 'l' =>
                                                'Low'],
                                                'm', ['required' => 'required','class' => 'form-control','placeholder'
                                                =>
                                                'Please Select']) !!}
                                                <small class="text-danger">{{ $errors->first('priority') }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" value="{{ $card->id }}" name="card_id">
                                    <button type="submit" class="btn btn-info-rgba btn-block btn-lg font-16"><i
                                            class="fa fa-check-circle mr-2"></i>{{ __("Add Task") }}</button>
                                    {!! Form::close() !!}
                                </div>
                                @if($item->cards()->count())
                                <button type="button"
                                    class="add-task-btn btn btn-primary-rgba btn-block btn-lg font-16"><i
                                        class="feather icon-plus mr-2"></i>{{ __("Add Task") }}</button>
                                @endif
                            </div>
                         </div>
                           @empty
                        <div class="card bg-warning-rgba m-b-20">
                            <div class="card-body">
                                <div class="text-center kanban-tag inline p-20">
                                    <p>{{__("This Board is empty add some cards to fill it ☺ ")}}</p>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <button type="button" data-toggle="modal" data-target="#add_cards" 
                        data-boardname="{{ $item->title }}" data-boardid="{{ $item->id }}"
                        class="add_card_btn mt-2 btn btn-primary-rgba btn-block btn-lg font-16"><i
                            class="feather icon-layout mr-2"></i>{{ __("Add Card") }}</button>
                        </div>
            </div>
        </div>
        @endforeach
        @endif
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
                {!! Form::open(['method' => 'DELETE', 'url' => url('admin/todo'),'id' => 'deleteform']) !!}
                <button type="reset" class="btn btn-dark" data-dismiss="modal">{{ __("No") }}</button>
                <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
<div id="deleteModalForCard" class="delete-modal modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __("Title") }}}</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="delete-icon"></div>
            </div>
            <div class="modal-body text-center">
                <h4 class="modal-heading">{{ __("Are You Sure ?") }}</h4>
                <p>{{ __("Do you really want to delete these card? This process cannot be undone.") }}</p>
            </div>
            <div class="modal-footer">
                <form action="{{ route('todocard.delete') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" value="" name="card_id" id="delete_card_id">
                    <button type="reset" class="btn btn-dark" data-dismiss="modal">{{ __("No") }}</button>
                    <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="add_cards" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="add_modal_title"></h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('todocard.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                         <label>{{ __("Title:") }} <span class="text-danger">*</span></label>
                        <input type="text" required class="form-control" name="name" value="{{ old("name") }}">
                    </div>
                    <div class="form-group">
                        <label>{{ __("Description:") }} </label>
                        <textarea class="form-control" rows="5" name="detail">{{ old('detail') }}</textarea>
                    </div>
                     <input type="hidden" name="board_id" value="" id="board_id">
                      <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary-rgba">
                            {{ __("Create") }}
                        </button>
                         <button type="button" data-dismiss="modal" class="btn btn-md btn-danger-rgba">
                            {{ __("Cancel") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div id="editcard" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">{{ __("Title") }}</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('todocard.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>{{ __("Title: ") }}<span class="text-danger">*</span></label>
                        <input id="card_name" type="text" required class="form-control" name="name"
                            value="{{ old("name") }}">
                    </div>

                    <div class="form-group">
                        <label>{{ __("Description:") }} </label>
                        <textarea id="card_detail" class="form-control" rows="5"
                            name="detail">{{ old('detail') }}</textarea>
                    </div>

                    <input type="hidden" name="card_id" value="" id="card_id">
                    <div class="form-group">
                        <button type="submit" class="btn btn-md btn-primary-rgba">
                            {{ __("Update") }}
                        </button>
                         <button type="button" data-dismiss="modal" class="btn btn-md btn-danger-rgba">
                            {{ __("Cancel") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Contentbar -->
@endsection
@section('script')
    <script>
        $('.add_card_btn').on('click',function(){

            var boardid = $(this).data('boardid');
            var boardname = $(this).data('boardname');

            $('#board_id').val(boardid);
            $('#add_modal_title').text(boardname);

        })
    </script>
    <script>
        $('.calendar').each(function () {
            $(this).datepicker({
                dateFormat: 'yy-mm-dd',
                minDate: 0
            });
        });
    
    </script>
@endsection
