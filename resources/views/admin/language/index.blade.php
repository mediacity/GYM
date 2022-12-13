@extends('layouts.master')
@section('title',__('All Language'))
@section('maincontent')
<!-- Start Breadcrumbbar -->                    
@component('components.breadcumb',['secondaryactive' => 'active'])
@slot('heading')
{{ __('Language') }}
@endslot
@slot('menu1')
{{ __('Language') }}
@endslot
@endcomponent
<div class="row">
    <div class="col-md-12">
        <!-- card started -->
        <div class="card">
          <!-- ========= -->
            <!-- to show add button start -->
            <div class="card-header">
            <div class="row align-items-center">
                <div class="col-md-7">
                <div class="card-header">
                    <h5 class="card-title">{{ __('Language') }}</h5>
                </div>  
                </div> 
                <div class="col-md-5">
                <div class="widgetbar">
               <a href="{{ action('LanguageController@create') }}" class="float-right btn btn-primary-rgba mr-2"><i class="feather icon-plus mr-2"></i>{{ __('Add Language') }}</a>
                
           
                </div>
                </div>
            </div>
            </div>
            <!-- to show add button end -->
            <!-- card body started -->
            <div class="card-body">
            <div class="table-responsive">

                    <!-- table to display language start -->
                    <table id="datatable-buttons" class="table table-striped table-bordered">
                    <thead>
                        <th>
                            <input id="checkboxAll" type="checkbox" class="filled-in" name="checked[]"
                            value="all" />
                            <label for="checkboxAll" class="material-checkbox"></label>   # 
                        </th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Language') }}</th>
                        <th>{{ __('Default') }}</th>
                        <th>{{ __('Action') }}</th>
                    </thead>
                    @if ($languages)
                    <tbody>
                      @foreach ($languages as $key => $language)
                        <tr>
                            <td>   {{$key+1}}</td>
                        <td>{{$language->name}}</td>
                        <td>{{$language->language}}</td>
                        <td>
                          @if($language->def ==1)
                            <i class="text-success fa fa-check"></i>
                          @else
                            <i class="text-danger fa fa-times"></i>
                          @endif
                        </td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-round btn-outline-primary" type="button" id="CustomdropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-more-vertical-"></i></button>
                                <div class="dropdown-menu" aria-labelledby="CustomdropdownMenuButton1">

                                    <a class="dropdown-item" href="{{route('language.edit', $language->id)}}"><i class="feather icon-edit mr-2"></i>{{ __('Edit') }}</a>

                                    @if($language->def !=1)

                                    <a class="dropdown-item btn btn-link" data-toggle="modal" data-target="#delete{{ $language->id }}" >
                                        <i class="feather icon-delete mr-2"></i>{{ __("Delete") }}
                                    </a>
                                    @endif
                                </div>
                            </div>

                            <!-- delete Modal start -->
                            <div class="modal fade bd-example-modal-sm" id="delete{{ $language->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleSmallModalLabel">{{ __('Delete') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                <h4>{{ __('Are You Sure ?')}}</h4>
                                                <p>{{ __('Do you really want to delete')}} <b>{{$language->name}}</b> ? {{ __('This process cannot be undone.')}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form method="post" action="{{route('language.destroy', $language->id)}}" class="pull-right">
                                                {{csrf_field()}}
                                                {{method_field("DELETE")}}
                                                <button type="reset" class="btn btn-secondary" data-dismiss="modal">{{ __('No') }}</button>
                                                <button type="submit" class="btn btn-primary">{{ __('Yes') }}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- delete Model ended -->

                        </td>
                            
                        </tr> 
                        @endforeach
                    </tbody>
                    @endif
                    </table>                  
                    <!-- table to display language data end -->                
                </div><!-- table-responsive div end -->
            </div><!-- card body end -->
        </div><!-- card end -->
    </div><!-- col end -->
</div>
@endsection
<!-- End Breadcrumbbar -->