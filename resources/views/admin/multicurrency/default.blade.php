 <!-- Start Form -->
<form method="post" action="{{route('multicurrency.default',$id)}}">
 @if($currencyid !=NULL)
<input data-toggle="modal" checked data-target="#curModal{{ $id }}" type="radio" name="default_currency" value="{{ $id }}"/>
@else
<input data-toggle="modal"  data-target="#curModal{{ $id }}" type="radio" name="default_currency" value="{{ $id }}"/>
@endif
<div class="modal fade" id="curModal{{ $id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{ __("Modal title") }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
      <h4 class="modal-heading">{{ __("Are You Sure ?") }}</h4>
                    <p>{{ __("Do you want to make") }} <b>{{ $code }}</b>{{ __(" default currency ?") }}</p>
                     @csrf
            @method('PUT')
            <button type="submit" class="btn btn-md btn-primary">
            <i class="fa fa-save"></i> {{ __("Change ?") }}
        </button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __("Cancel") }}</button>
        </form>
       </div>
      </div>
  </div>
</div>
<!-- End Form -->
