@extends('layouts.master')
@section('title',__('All Trainers List'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Trainer list') }}
@endslot
@slot('menu1')
{{ __('Trainer List') }}
@endslot
@slot('button')
@if(auth()->user()->can('trainer_list.add'))
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="{{route('trainerlist.create',['id' => app('request')->input('id')])}}" class="btn btn-primary-rgba mr-2"><i
                class="feather icon-plus mr-2"></i>{{ __("Add Trainer List") }}</a>
        <button type="button" class=" btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
                class="feather icon-trash"></i>{{ __(" Delete Selected") }}</button>
        <a href="{{ route('blo.index') }}" class="btn btn-success-rgba mr-2"><i
            class="feather icon-download-cloud"></i>{{ __("Recycle") }}</a>
    </div>
</div>
@endif
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title"><span class="ml-13">
                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" />
                <label for="checkboxAll" class="material-checkbox"></label>
                {{ __('   All Trainerlist') }}</span></h5>
    </div>
</div>
<!-- Start Row -->
<div class="row">
    @foreach($trainerlist as $key => $trainerlist)
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <td>
                                    <div class='inline'>
                                        <input type='checkbox' form='bulk_delete_form'
                                            class='check filled-in material-checkbox-input' name='checked[]'
                                            value={{ $trainerlist->id }} id='checkbox{{ $trainerlist->id }}'>
                                        <label for='checkbox{{ $trainerlist->id }}' class='material-checkbox'></label>
                                    </div>
                                    <div id="bulk_delete" class="delete-modal modal fade" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                    <div class="delete-icon"></div>
                                                </div>
                                                <div class="modal-body text-center">
                                                    <h4 class="modal-heading">{{ __("Are You Sure ?") }}</h4>
                                                    <p>{{ __("Do you really want to delete selected item names here? This process cannot be undone.") }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="bulk_delete_form" method="post"
                                                        action="{{ route('trainerlist.bulk_delete') }}">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="reset" class="btn btn-gray translate-y-3"
                                                            data-dismiss="modal">{{ __("No") }}</button>
                                                        <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td>{{ $key+1 }}</td>

                                <td>

                                    <p class="mb-1 font-14">{{ __("Member names") }}</p>
                                    <h5> {{ucfirst($trainerlist-> user['name']) }}</h5>
                                </td>
                                <td>
                                    <p class="mb-1 font-14">{{ __("Trainer name") }}</p>
                                    <h5> {{App\User::whereId($trainerlist->trainer_name)->value('name') }}</h5>
                                </td>
                                <td>
                                    <p class="mb-1 font-14">{{ __("Trainer type") }}</p>
                                    <h5> {{str_limit($trainerlist-> personaltrainer , 10) }}</h5>
                                </td>
                                <td>
                                    <p class="mb-1 font-14">{{ __("Description") }}</p>
                                    <h5> {{str_limit($trainerlist-> description , 20) }}</h5>
                                </td>

                                <td>

                                    <p class="mb-1 font-14">{{ __("From") }}</p>
                                    <h5>{{$trainerlist-> from }}</h5>
                                </td>
                                <td>
                                    <p class="mb-1 font-14">{{ __("To") }}</p>
                                    <h5>{{$trainerlist-> to }}</h5>
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'PUT', 'route' =>
                                    ['trainerlist.status',$trainerlist->id]]) !!}
                                    <div class="custom-switch">
                                        <p class="mb-1 font-14 ml--40 mt--15">{{ __("Status") }}</p>
                                        {!! Form::checkbox('is_active', 1, $trainerlist->is_active == 1 ? 1 : 0, ['id'
                                        => 'switch'.$trainerlist->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]) !!}
                                        <label class="custom-control-label" for="switch{{$trainerlist->id}}"></label>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <p class="mb-1 font-14 mt--10">{{ __("Action") }}</p>
                                    <a class="btn btn-xm btn-success-rgba"
                                        href="{{ route('trainerlist.edit',$trainerlist->id)  }}"><i
                                            class="feather icon-edit-2"></i>
                                    </a>

                                    <form method="POST" id="delete-form-{{ $trainerlist->id }}"
                                        action="{{route ('trainerlist.destroy',$trainerlist->id) }}"
                                        style="display:none;">

                                        {{ csrf_field() }}
                                        {{ method_field('delete')}}
                                    </form>
                                    <button type="button" class="btn btn-danger-rgba  btn btn-xm" data-toggle="modal"
                                        data-target="#deleteModal{{$trainerlist->id}}">
                                        <i class="feather icon-trash"></i>
                                    </button>
                                </td>
                                <div id="deleteModal{{$trainerlist->id}}" class="delete-modal modal fade" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <!-- Modal content-->
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
                                                <button type="reset" class="btn btn-dark"
                                                    data-dismiss="modal">{{ __("No") }}</button>
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['trainerlist.destroy',
                                                $trainerlist->id]]) !!}
                                                <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                                                {!! Form::close() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    </tbody>
</table>
</div>
</div>
<!-- End Row -->
@endsection
@section('script')
<script>
    $("#checkboxAll").on('click', function () {
        $('input.check').not(this).prop('checked', this.checked);
    });
</script>
@endsection
