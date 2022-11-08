<footer class="font-size-14 text-sm-center text-md-start pt-sm-2 pt-lg-5">
    <div class="row justify-content-between container mx-auto py-sm-2 py-md-5">
        <div class="col-sm-12 col-md-3" style="">
            @if (Storage::disk('public')->exists($data->logo_footer))
                <div class="d-sm-none d-md-block">
                    <img src="{{ asset($data->logo_footer) }}" class="d-block img-fluid" style="width: 295px;">
                </div>
            @endif
        </div>
        <div class="col-sm-12 col-md-3 d-sm-none d-md-block">
            <div class="row justify-content-between">
                <div class="col-sm-12">    
                    <div class="row">
                        <h6 class="text-uppercase text-white fw-bold mb-4 text-sm-start pe-5 pb-2 w-100 font-size-16">secciones</h6>
                        <div class="col-sm-12 col-md-6">
                            <a href="{{ route('empresa') }}" class="d-block text-decoration-none text-white mb-2 underline font-size-16">Nosotros</a>
                            <a href="{{ route('productos') }}" class="d-block text-decoration-none text-white mb-2 underline font-size-16">Productos</a>
                            <a href="{{ route('novedades') }}" class="d-block text-decoration-none text-white mb-2 underline font-size-16">Novedades</a>
                        </div>
                        <div class="col-sm-12 col-md-6">

                            <a href="#" class="d-block text-decoration-none text-white mb-2 underline font-size-16">Distribuidores</a>
                            <a href="{{ route('empresa') }}" class="d-block text-decoration-none text-white mb-2 underline font-size-16">Nosotros</a>
                            <a href="{{ route('contacto') }}" class="d-block text-decoration-none text-white mb-2 underline font-size-16">Contacto</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 font-size-13 px-sm-3 px-md-0">
            <h6 class="text-uppercase text-white fw-bold mb-4 text-sm-start pe-5 pb-2 font-size-16">DATOS DE CONTACTO</h6>
            <div class="row">
                <div class="col-sm-12">
                    @if ($data->address)
                        <div class="d-flex mb-3 text-start">
                            <i class="fas fa-map-marker-alt text-white d-block me-2" style="font-size: 20px;"></i>
                            <address class="d-block text-white m-0"> {{ $data->address }}</address>
                        </div>             
                    @endif
                    @if($data->email)
                        <div class="d-flex align-items-center mb-3">
                            <i class="fas fa-envelope text-white d-block me-2" style="font-size: 20px;"></i><span class="d-block"></span>
                            <div class="text-start">
                                <a href="mailto:{{ $data->email }}" class="text-white text-decoration-none underline">{{ $data->email }}</a>        
                            </div>     
                        </div>
                    @endif
                    @if($data->phone1)
                        @php $phone = Str::of($data->phone1)->explode('|') @endphp
                        <div class="d-flex align-items-center mb-3">
                            <i class="fal fa-phone-alt text-white d-block me-2" style="font-size: 20px;"></i>
                            @if(count($phone) == 2)
                                <a href="tel:{{$phone[0]}}" class="text-white text-decoration-none underline">{{ $phone[1] }}</a>
                            @else
                                <a href="tel:{{$data->phone1}}" class="text-white text-decoration-none underline">{{ $data->phone1 }}</a>
                            @endif
                        </div>          
                    @endif
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="text-white py-3 bg-purple">
    <div class="container d-flex justify-content-between">
        <span>Todos los derechos reservados por Bluper</span>
        <a href="https://osole.com.ar/" class="text-white text-decoration-none underline text-white">by OSOLE</a>
    </div>
</div>
@if($data->phone3)
    <a href="https://wa.me/{{$data->phone3}}" class="position-fixed" style="background-color: #0DC143; color: white; font-size: 40px; padding: 0px 13px; border-radius: 100%; bottom: 30px; right: 40px;">
        <i class="fab fa-whatsapp"></i>
    </a>
@endif
