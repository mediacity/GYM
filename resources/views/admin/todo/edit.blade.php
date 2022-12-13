@if(isset($todo))
{!! Form::model($todo, ['method' => 'PATCH', 'route' => ['todo.update', $todo->id]]) !!}
@else
{!! Form::open(['method' => 'POST', 'route' => 'todo.store']) !!}
  <input type="hidden" name="created_by" value="{{$auth->id}}">
@endif 
  <div class="row">
    <div class="col-lg-12 col-sm-12">
      <div class="form-group{{ $errors->has('task') ? ' has-error' : '' }}">
        {!! Form::label('task', 'Task',['class'=>'required']) !!}
        {!! Form::text('task', null, ['class' => 'form-control','required']) !!}
        <small class="text-danger">{{ $errors->first('task') }}</small>
      </div>  
    </div>
    <div class="col-lg-6 col-sm-12">
      <div class="form-group{{ $errors->has('priority') ? ' has-error' : '' }}">
        {!! Form::label('priority', 'Select Priority',['class'=>'required']) !!}
        {!! Form::select('priority', ['h' => 'High', 'm' => 'Medium', 'l' => 'Low'], null, ['class' => 'form-control','placeholder'=>'Select Priority','required']) !!}
        <small class="text-danger">{{ $errors->first('priority') }}</small>
      </div>
    </div>
    <div class="col-lg-6 col-sm-12">
      <div class="form-group{{ $errors->has('due_on') ? ' has-error' : '' }}">
        {!! Form::label('due_on', 'Due On') !!}
        {!! Form::text('due_on', null, ['class' => 'datetimepicker form-control','placeholder'=>'Select Date','autocomplete' => 'off']) !!}
        <small class="text-danger">{{ $errors->first('due_on') }}</small>
      </div>
    </div>
    <div class="col-lg-12 col-sm-12">
      <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
        {!! Form::label('remark', 'Remark') !!}
        {!! Form::textarea('remark', isset($todo) ? strip_tags($todo->remark) : null, ['class' => 'form-control','rows'=>'1']) !!}
        <small class="text-danger">{{ $errors->first('remark') }}</small>
      </div>
    </div> 
    <div class="col-lg-12 col-sm-12">
      <div class="form-group{{ $errors->has('is_complete') ? ' has-error' : '' }}">
        <div class="row">
        <div class="col-lg-3">
          {!! Form::label('is_complete', 'If Completed') !!}
        </div>
        <div class="col-lg-2 custom-switch">
          {!! Form::checkbox('is_complete', 1, isset($todo) ? $todo->is_complete : 0, ['class' => 'custom-control-input']) !!}
          <label class="custom-control-label" for="is_complete"></label>
        </div>
        </div>
        <small class="text-danger">{{ $errors->first('is_complete') }}</small>
      </div>
    </div>
      <div class="col-lg-12 col-sm-12">
        <div class="form-group{{ $errors->has('is_checked') ? ' has-error' : '' }}">
          <div class="row">
          <div class="col-lg-3">
            {!! Form::label('is_checked', 'If Checked & Complete') !!}
          </div>
          <div class="col-lg-2 custom-switch">
            {!! Form::checkbox('is_checked', 1, isset($todo) ? $todo->is_checked : 0, ['class' => 'custom-control-input']) !!}
            <label class="custom-control-label" for="is_checked"></label>
          </div>
          </div>
          <small class="text-danger">{{ $errors->first('is_checked') }}</small>
        </div>
      </div>
      <div class="col-lg-12 col-sm-12">
        <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
          <div class="row">
          <div class="col-lg-3">
            {!! Form::label('is_active', 'Show On Board') !!}
          </div>
          <div class="col-lg-2 custom-switch">
            {!! Form::checkbox('is_active', 1, isset($todo) ? $todo->is_active : 1, ['class' => 'custom-control-input']) !!}
            <label class="custom-control-label" for="is_active"></label>
          </div>
          </div>
          <small class="text-danger">{{ $errors->first('is_active') }}</small>
        </div>
      </div>
      <input type="hidden" name="is_active" value="1">
    <div class="col-lg-12 m-t-10">
      <div class="form-group">            
        <button type="submit" class="btn btn-primary-rgba"><i class="fa fa-check-circle mr-2"></i>{{ __("Update") }}</button>  
      </div>
      <div class="clear-both"></div>
    </div>
  </div>
{!! Form::close() !!}
