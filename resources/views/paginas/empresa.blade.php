@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.jumbotron', ['text' => 'Nosotros'])
@isset($section1)
	<section class="py-5">
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-sm-12 col-md-5">
					<h3 class="font-size-30 mb-sm-3 mb-md-5">{{$section1->content_1}}</h3>
					<div class="fw-light font-size-18">{!! $section1->content_2 !!}</div>
				</div>
				<div class="col-sm-12 col-md-6 mb-sm-4 mb-md-0">
					@if (Storage::disk('public')->exists($section1->image))
						<img src="{{ asset($section1->image) }}" class="img-fluid">
					@endif
				</div>
			</div>
		</div>
	</section>	
@endisset
@isset($section1)
	@if ($section1->content_3)
		<div class="py-5 bg-light">
			<div class="container">{!! $section1->content_3 !!}</div>
		</div>	
	@endif
@endisset
@if ($section2 || count($sections3))
	<div class="py-5">
		<div class="row container mx-auto mb-5">
			<div class="col-sm-12">
				<h3 class="mb-5 font-size-30" style="font-weight:600"> {{ $section2->content_1 }} </h3>
			</div>
			@foreach ($sections3 as $s3)
				<div class="col-sm-12 col-md-4 mb-sm-4 mb-md-0">
					<div class="card-valores bg-light py-5 px-3">
						@if (Storage::disk('public')->exists($s3->image))
							<img src="{{ asset($s3->image) }}" class="img-fluid d-block mb-4" style="min-height: 54px; max-height: 54px;">
						@else
							<div class="mb-4" style="min-height: 54px; max-height: 54px;"></div>
						@endif
						<h4 class="mb-3 font-size-22 text-uppercase" style="color: #01AEF2; font-weight:600">{{ $s3->content_1 }}</h4>
						<div class="font-size-16">{!! $s3->content_2 !!}</div>
					</div>
				</div>			
			@endforeach
		</div>
	</div>
@endif
@endsection
@push('head')
	<style>
		iframe{
			min-width: 100% !important;
		}
		@media(min-width:992){
			iframe{
				height: 671px !important;
			}
		}
	</style>
@endpush
