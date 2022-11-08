<div class="fixed-top bg-purple header-full">
    <header class="header d-sm-none d-lg-block">
        <div class="container d-flex justify-content-between align-items-center py-2">
            <div class="d-flex align-items-center font-size-14">
                @if ($data->facebook)
                    <a href="{{$data->facebook}}" class="me-3" style=""><i class="fab fa-facebook-f text-white"></i></a>
                @endif
                @if ($data->instagram)
                    <a href="{{$data->facebook}}" class="me-3" style=""><i class="fab fa-instagram text-white"></i></a>
                @endif
            </div>
            <div class="">
                <a href="{{ route('productos') }}" class="" style=""><i class="fal fa-search text-white"></i></a>
            </div>
        </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-light w-100 py-lg-4 py-sm-1">
        <div class="container">
            <a class="navbar-brand d-sm-flex d-lg-none" href="{{ route('index') }}">
                <img src="{{ asset($data->logo_header) }}" class="img-fluid logo-header d-block me-2">
            </a>
            <button class="navbar-toggler d-sm-flex d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav position-relative align-items-center justify-content-between w-100">
                    <li class="nav-item text-md-start @if(Request::is('/')) position-relative @endif">
                        <a class="nav-link font-size-16 text-white @if(Request::is('/')) active @endif" href="{{ route('index') }}">Inicio</a>
                    </li>
                    <li class="nav-item text-md-start @if(Request::is('productos') || Request::is('producto/*') || Request::is('categoria/*')) position-relative @endif">
                        <a class="nav-link font-size-16 text-white @if(Request::is('productos') || Request::is('producto/*') || Request::is('categoria/*')) active @endif" href="{{ route('productos') }}">Productos</a>
                    </li>
                    <li class="nav-item text-md-start @if(Request::is('novedades') || Request::is('novedad/*')) position-relative @endif">
                        <a class="nav-link font-size-16 text-white @if(Request::is('novedades') || Request::is('novedad/*')) active @endif" href="{{ route('novedades') }}" >Novedades</a>
                    </li> 
                    <li class="nav-item position-relative d-sm-none d-lg-block">
                        <a class="nav-link font-size-16 text-white position-absolute" href="{{ route('index') }}" style="top:-40px;">
                            <img src="{{ asset($data->logo_header) }}" class="img-fluid logo-header d-block me-2" style="max-width:100%;"></a>
                    </li> 
                    <li class="nav-item text-sm-start text-md-end @if(Request::is('distribuidores')) position-relative @endif">
                        <a class="nav-link font-size-16 text-white @if(Request::is('distribuidores')) active @endif" href="#" >Distribuidores</a>
                    </li>
                    <li class="nav-item text-sm-start text-md-end @if(Request::is('nosotros')) position-relative @endif">
                        <a class="nav-link font-size-16 text-white @if(Request::is('nosotros')) active @endif" href="{{ route('empresa') }}" >nosotros</a>
                    </li>
                    <li class="nav-item text-sm-start text-md-end @if(Request::is('contacto')) position-relative @endif">
                        <a class="nav-link font-size-16 text-white @if(Request::is('contacto')) active @endif" href="{{ route('contacto') }}" >Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>  
</div>
<div class="espacio-nav"></div>


