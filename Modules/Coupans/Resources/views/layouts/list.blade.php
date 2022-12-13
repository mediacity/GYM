@if(Module::has('Coupans') && Module::find('Coupans')->isEnabled())
    <li class="{{ Nav::isResource('coupans') }}">
        <a class="nav-link" href="{{ route('coupans.index')}}">
            {{ __('Coupans') }}
        </a>
    </li>
@endif