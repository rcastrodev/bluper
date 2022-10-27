@extends('paginas.partials.app')
@section('content')
<div aria-label="breadcrumb" class="py-2 font-size-14 mb-3" style="background-color: #21B7F3;">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('index') }}" class="text-decoration-none text-white">Inicio</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('productos') }}" class="text-decoration-none text-white">Productos</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('categoria', ['slug' => $producto->category->slug]) }}" class="text-decoration-none text-white">{{ $producto->category->name }}</a>
            </li>
            <li class="breadcrumb-item active text-white" aria-current="page">{{ $producto->name }}</li>
        </ol>
    </div>
</div>
<div class="py-5">
    <div class="row justify-content-between container mx-auto mb-5">
        <div class="col-sm-12 col-md-5">
            <div class="mb-2" style="border: 1px solid #CCCCCC; border-radius:24px;">
                @if (count($producto->images))
                    <img src="{{ asset($producto->images()->first()->image) }}" id="imagen-actual" class="img-fluid w-100 img-product" style="min-height:463px;max-height:463px;">
                @else
                    <img src="{{ asset('images/default.jpg') }}" id="imagen-actual" class="img-fluid w-100 img-product" style="min-height:463px;max-height:463px;">
                @endif  
            </div>
            @if (count($producto->images))
                <ul class="p-0 d-flex flex-wrap" style="list-style:none">
                    @foreach ($producto->images as $i)
                        <li class="p-1 me-1" style="border: 1px solid #CCCCCC; border-radius:8px;">
                            <img src="{{ asset($i->image) }}" alt="{{ $producto->name }}" class="imagenes" style="width:55px; height:59px;">
                        </li>
                    @endforeach
                </ul>   
            @endif
        </div>
        <div class="col-sm-12 col-md-6">
            <span class="font-size-18 text-uppercase mb-4 d-block" style="color: {{ ($producto->category->color) ? $producto->category->color : '#333333'}}; font-weight:700;">{{ $producto->category->name }}</span>
            <h1 class="font-size-36 mt-2 mb-4 text-purple" style="font-weight: 600">{{ $producto->name }}</h1>
            <div class="ul-style mb-4">{!! $producto->description !!}</div>
            @if (count($producto->variableProducts))
                <div class="row">
                    @foreach ($producto->variableProducts()->orderBy('order', 'ASC')->get() as $vp)
                        <div class="col-sm-12 col-md-6 mb-4">
                            <div class="text-uppercase font-size-18 mb-1" style="color: #AAAAAA;">{{ $vp->title }}</div>
                            <div class="font-size-20">{{ $vp->content }}</div>
                        </div>
                    @endforeach
                </div>
            @endif
            <a href="{{ route('contacto') }}" class="bg-footer text-white py-2 px-5 btn text-uppercase d-inline-block mt-4" style="border-radius: 40px">Contactar</a>
        </div>
    </div>
    @if(count($producto->category->products->where('id', '<>', $producto->id)))
        <div class="row container mx-auto mb-5">
            <h4 class="font-size-24 col-sm-12 mb-4" style="font-weight:500">Productos relacionados</h4>
            @foreach ($producto->category->products->where('id', '<>', $producto->id) as $k => $rp)
                <div class="col-sm-12 col-md-3 mb-4">
                    @includeIf('paginas.partials.producto', ['p' => $rp])
                </div>
                @if ($k == 3) @break @endif
            @endforeach
        </div>  
    @endif
</div>
@endsection
@push('head')
@endpush
@push('scripts')
    <script>
        $('.imagenes').click(function (e){
            e.preventDefault()
            $('#imagen-actual').attr('src', e.target.src)
        })
    </script>
@endpush


       
