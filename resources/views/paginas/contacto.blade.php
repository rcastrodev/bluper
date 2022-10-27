@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.jumbotron', ['text' => 'Contacto'])
<div class="py-5">
    <div class="container mx-auto">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            @foreach ($errors->all() as $error)
                <span class="d-block">{{$error}}</span>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>  
        @endif
        @if (Session::has('mensaje'))
            <div class="alert alert-{{Session::get('class')}} alert-dismissible fade show" role="alert">
                <strong>{{ Session::get('mensaje') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>                    
        @endif
        <form action="{{ route('send-contact') }}" method="post" class="mb-5">
            @csrf
            <div class="row justify-content-between">
                <div class="col-sm-12 col-md-3 font-size-14">
                    <div class="font-size-16 fw-light mb-4">Para mayor información, no dude en contactarse mediante el siguiente formulario, o a través de nuestras vías de comunicación.</div> 
                    <div class="d-flex mb-4">
                        <i class="fas fa-map-marker-alt text-purple d-block me-3"></i><span class="d-block"> {{ $data->address }}</span>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-envelope text-purple d-block me-3"></i><span class="d-block"></span>  
                        <div class="">
                            <a href="mailto:{{ $data->email }}" class="underline text-dark text-decoration-none">{{ $data->email }}</a><br> 
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-4">
                        <i class="fas fa-phone-alt text-purple d-block me-3"></i>
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                        @if (count($phone) == 2)
                            <a href="tel:{{ $phone[0] }}" class="underline text-dark text-decoration-none">{{ $phone[1] }}</a>
                        @else 
                            <a href="tel:{{ $data->phone1 }}" class="underline text-dark text-decoration-none">{{ $data->phone1 }}</a>
                        @endif        
                    </div> 
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="row">
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="d-block mb-2" style="font-weight: 400;">Nombre y apellido*</label>
                                <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="d-block mb-2" style="font-weight: 400;">E-Mail*</label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="d-block mb-2" style="font-weight: 400;">Teléfono</label>
                                <input type="tel" name="telefono" value="{{ old('telefono') }}" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-3">
                            <div class="form-group">
                                <label class="d-block mb-2" style="font-weight: 400;">Empresa</label>
                                <input type="text" name="company" value="{{ old('company') }}" class="form-control font-size-14 input-fondo">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3 mb-sm-3">
                            <div class="form-group">
                                <label class="d-block mb-2" style="font-weight: 400;">Mensaje *</label>
                                <textarea name="mensaje" class="form-control font-size-14 input-fondo" cols="30" rows="5">
                                    {{ old('mensaje') }}
                                </textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 mb-sm-3">
                            <div class="form-group pt-4">{!! app('captcha')->display() !!}</div>
                        </div>
                        <div class="col-sm-12 mb-sm-3 mb-sm-3 text-sm-center text-md-end">
                            <span class="me-3" style="color: #454545;">*Campos Obligatorios</span>
                            <button type="submit" class="btn bg-footer rounded-pill font-size-14 py-2 mb-sm-3 mb-md-0 text-white px-5">Enviar mensaje</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3282.475380270171!2d-58.61385428497523!3d-34.642695580449455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb89d4d6e8873%3A0xb755ae2888684cd5!2sLa%20Cant%C3%A1brica%20Parque%20Industrial%20UIO!5e0!3m2!1ses!2sve!4v1660663268324!5m2!1ses!2sve" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-100" style="height:450px;"></iframe>
    </div>
</div>
@endsection
@push('head')
@endpush
@push('scripts')	
@endpush
       

