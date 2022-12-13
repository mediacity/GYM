<div class="button-list">
    <a href="{{route('cos.restore',$id)}}"
        class="btn btn-xm btn-success-rgba"><i class="fa fa-cloud-download"></i></a>
    <button type="button" class="btn btn-xm btn-danger-rgba" data-toggle="modal"
        data-target="#deleteModal{{$id}}"><i
            class="feather icon-trash"></i></button>
    <!-- Modal -->
    <div id="deleteModal{{$id}}" class="delete-modal modal fade"
        role="dialog">
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
                    <p>{{ __("Do you really want to delete these records? This process
                        cannot be undone.") }}</p>
                </div>
                <div class="modal-footer">
                    {!! Form::open(['method' => 'DELETE', 'route' =>
                    ['cos.delete', $id]]) !!}
                    <button type="reset" class="btn btn-dark"
                        data-dismiss="modal">{{ __("No") }}</button>
                    <button type="submit" class="btn btn-danger">{{ __("Yes") }}</button>
                    {!! Form::close() !!}
                </div>
             </div>
        </div>
    </div>
</div>