@extends('layouts.master')
@section('title',__('All Trainers'))
@section('maincontent')
<!-- Start Breadcrumbbar -->
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Trainer') }}
@endslot
@slot('menu1')
{{ __('Trainer') }}
@endslot
@slot('button')
<div class="col-md-12 col-lg-6 text-right">
    <div class="top-btn-block">
        <a href="{{route('trainer.create')}}" class="btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>{{ __("Add
            Trainer") }}</a>
        <button type="button" class="btn btn-danger-rgba mr-2 " data-toggle="modal" data-target="#bulk_delete"><i
                class="feather icon-trash"></i> {{ __("Delete Selected") }}</button>
        <br>
        <br>
        <div class="col-md-12">
            <form action="" method="get">
                <div class="input-group">
                    <input type="search" for="search" id="search" onsearch="OnSearch(this)" name="search"
                        value="{{ app('request')->input('search') }}" class="form-control" placeholder="Search">
                    <span class="input-group-prepend">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
            @if(app('request')->input('search') != '')
            <a role="button" title="Back" href="{{ route('trainer.index') }}" name="clear" value="search" id="clear_id"
                class="btn btn-warning btn-xs">
                {{ __(" Clear Search") }}
            </a>
            @endif
        </div> 
    </div> 
</div>
@endslot
@endcomponent
<!-- End Breadcrumbbar -->
<!-- Start Card -->
<div class="card">
    <div class="card-header">
        <h5 class="card-title"><span class="ml-13">
                <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]" value="all" />
                <label for="checkboxAll" class="material-checkbox"></label>
                {{ __('   All Trainer') }}</span></h5>
    </div>
</div>
<!-- End Card -->
<!-- Start Row -->
<div class="row">
    @foreach($trainers as $key => $trainer)
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-borderless mb-0">
                        <tbody>
                            <tr>
                                <td>
                                    <div class='inline index-checkbox'>
                                        <input type='checkbox' form='bulk_delete_form'
                                            class='check filled-in material-checkbox-input' name='checked[]'
                                            value={{ $trainer->id }} id='checkbox{{ $trainer->id }}'>
                                        <label for='checkbox{{ $trainer->id }}' class='material-checkbox'></label>
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
                                                    <p>{{ __("Do you really want to delete selected item names here? This  process cannot be undone.") }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form id="bulk_delete_form" method="post"
                                                        action="{{ route('trainer.bulk_delete') }}">
                                                        @csrf
                                                        @method('POST')
                                                        <button type="reset" class="btn btn-gray translate-y-3"
                                                            data-dismiss="modal">{{ __("No") }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ __("Yes") }}</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$key+1}}</td>
                                <td>
                                    @if($trainer->photo != '')
                                    <img width="60px" height="60px"  class="margin-right-15 width-height"
                                        src="{{url('/image/slider/'.$trainer->photo )}}"
                                        title="{{ $trainer->trainer_name  }}">
                                    @else
                                    <img width="60px" height="60px" class="margin-right-15" title="{{ ucfirst($trainer->trainer_name) }}"
                                        src="{{ Avatar::create($trainer->trainer_name)->toBase64() }}" />
                                    @endif
                                </td>
                                <td>
                                    <p class="mb-1 font-14">{{ __("Trainer name") }}</p>
                                    <h5> {{ucfirst($trainer->trainer_name) }}</h5>
                                </td>
                                <td>
                                    <p class="mb-1 font-14">{{ __("Trainer Email") }}</p>
                                    <h5> {{ucfirst(str_limit($trainer->email , 10)) }}</h5>
                                </td>
                                <td>
                                    <p class="mb-1 font-14">{{ __("Mobile No.") }}</p>
                                    <h5> {{$trainer->phone }}</h5>
                                </td>

                                <td>
                                    <p class="mb-1 font-14">{{ __("Trainer Qualification") }}</p>
                                    <h5> {{ucfirst(str_limit($trainer->qualification , 10)) }}</h5>
                                </td>
                                <td>
                                    <p class="mb-1 font-14">{{ __("Trainer Specialization") }}</p>
                                    <h5> {{ucfirst(str_limit($trainer->specialization , 10)) }}</h5>
                                </td>

                                <td>
                                    <p class="mb-1 font-14">{{ __("Trainer Experience") }}</p>
                                    <h5>{{$trainer->experience }}</h5>
                                </td>

                                <td>
                                    <p class="mb-1 font-14">{{ __("Client Trainer Limit") }}</p>
                                    <h5>{{$trainer->trainer_limit }}</h5>
                                </td>

                                <td>
                                    <p class="mb-1 font-14">{{ __("Trainer Type") }}</p>
                                    <h5>{{ucfirst(str_limit($trainer->type , 10 ))}}</h5>
                                </td>
                                <td>
                                    <p class="mb-1 font-14">{{ __("Rating") }}</p>
                                    @for($i = 1; $i <= 5; $i++) @if($i<=$trainer->rating)
                                        <i class='fa fa-star tariner-rating'></i>
                                        @else
                                        <i class='fa fa-star tariner-rating-one'></i>
                                        @endif
                                        @endfor
                                </td>
                                <td>
                                    {!! Form::open(['method' => 'PUT', 'route' => ['trainer.status',$trainer->id]]) !!}
                                    <div class="custom-switch">
                                        <p class="mb-1 font-14 ml--40 mt--15">
                                            {{ __("Status") }}</p>
                                        {!! Form::checkbox('is_active', 1, $trainer->is_active == 1 ? 1 : 0, ['id'
                                        => 'switch'.$trainer->id, 'class' => 'custom-control-input',
                                        'onChange'=>"this.form.submit()"]) !!}
                                        <label class="custom-control-label" for="switch{{$trainer->id}}"></label>
                                    </div>
                                    {!! Form::close() !!}
                                </td>
                                <td>
                                    <div class="btn-group mr-2">
                                        <div class="dropdown">
                                            <button class="btn btn-round btn-primary-rgba" type="button"
                                                id="CustomdropdownMenuButton3" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false"><i
                                                    class="feather icon-more-vertical-"></i></button>
                                            <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton3">
                                                <a class="dropdown-item" href="{{ route('trainer.edit',$trainer->id) }}"
                                                    class="btn btn-xs btn-success-rgba"><i
                                                        class="feather icon-edit-2 mr-2"></i>{{ __("Edit") }}</a>
                                                <button class="dropdown-item" type="button" data-toggle="modal"
                                                    class="btn btn-primary-rgba"
                                                    data-target="#deleteModal{{$trainer->id}}"><i
                                                        class="feather icon-trash mr-2"></i>{{ __("Delete") }}</button>
                                            </div>
                                        </div>
                                    </div>
                                    <form method="POST" id="delete-form-{{ $trainer->id }}"
                                        action="{{route ('trainer.destroy',$trainer->id) }}" style="display:none;">
                                        {{ csrf_field() }}
                                        {{ method_field('delete')}}
                                    </form>
                                </td>
                                <div id="deleteModal{{$trainer->id}}" class="delete-modal modal fade" role="dialog">
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
                                                {!! Form::open(['method' => 'DELETE', 'route' => ['trainer.destroy',
                                                $trainer->id]]) !!}

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
    </tbody>
    @endforeach
    </table>
    <div class="mx-auto">
        {{ $trainers->appends(request()->except('page'))->links() }}
    </div>
    {!! $trainers->links() !!}
</div>
<!-- End Row -->
@endsection
@section('script')
<script>
    $('#search').on('change', function () {
        var v = $(this).val();
        if (v == 'search') {
            $('#clear_id').show();
            $('#clear').attr('required', '');
        } else {
            $('#clear_id').hide();
        }
    });

    $("#checkboxAll").on('click', function () {
        $('input.check').not(this).prop('checked', this.checked);
    });
</script>
@endsection