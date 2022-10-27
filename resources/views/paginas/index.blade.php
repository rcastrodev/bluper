@extends('paginas.partials.app')
@section('content')
@if(count($sliders))
	<div id="sliderHero" class="carousel slide" data-bs-ride="carousel">
		<div class="carousel-indicators">
			@foreach ($sliders as $k => $item)
				<button type="button" data-bs-target="#sliderHero" data-bs-slide-to="{{$k}}" class="@if(!$k) active @endif"  aria-current="true" aria-label="Slide {{$k}}"></button>			
			@endforeach
		</div>
		<div class="carousel-inner" style="box-shadow: -1px -1px 14px #00000014;">
			@foreach ($sliders as $key => $slider)
				<div class="carousel-item @if(!$key) active @endif" style="background-image: url({{$slider->image}}); background-repeat: no-repeat; background-size: cover; background-position: center;">
					<div class="container mx-auto contentHero">
						<div class="mt-sm-2 text-start text-black mx-auto" style="max-width: 400px !important;">
							<h1 class="font-size-48 text-center text-white hero-content-slider mb-sm-2 mb-md-5" style="font-weight: 700;">{{ $slider->content_1 }}</h1>
						</div>
					</div>
				</div>			
			@endforeach
		</div>	
	</div>	
@endif
@isset($categories)
	@if (count($categories))
		<div class="py-5" style="overflow-x: hidden;">
			<div class="row container mx-auto">
				<h3 class="text-dark text-center fw-bold font-size-32 mb-5 col-sm-12 mb-5">Categorías</h3>
				@foreach ($categories as $c)
					<div class="col-sm-12 col-md-3 mb-4">
						@includeIf('paginas.partials.categoria', ['c' => $c])
					</div>
				@endforeach		
			</div>
		</div>
	@endif
@endisset
@isset($products)
	@if (count($products))
		<div class="py-5" style="overflow-x: hidden;">
			<div class="row container mx-auto">
				<h3 class="text-dark text-center fw-bold font-size-32 mb-5 col-sm-12 mb-5">Productos destacados </h3>
				@foreach ($products as $p)
					<div class="col-sm-12 col-md-3 mb-4">
						@includeIf('paginas.partials.producto', ['p' => $p])
					</div>
				@endforeach		
			</div>
		</div>
	@endif
@endisset
@isset($news)
	@if (count($news))
		<div class="py-5">
			<div class="row container mx-auto mb-5">
				<div class="col-sm 12-col-md-6">
					<h3 class="text-dark fw-bold font-size-30 text-center text-uppercase" style="font-weight: 500;">Novedades</h3>
				</div>
			</div>
			<div class="row container mx-auto mb-5">
				@foreach ($news as $n)
					<div class="col-sm-12 col-md-6 col-lg-4 mb-sm-4 mb-md-0">
						@includeIf('paginas.partials.novedad', ['e' => $n])
					</div>			
				@endforeach
			</div>
		</div>
	@endif
@endisset
@endsection
@push('head')

@endpush

