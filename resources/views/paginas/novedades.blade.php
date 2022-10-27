@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.jumbotron', ['text' => 'Novedades'])
<div class="py-5 bg-light">
    <div class="row container mx-auto">
        @foreach ($news as $n)
            <div class="col-sm-12 col-lg-4 mb-4">
                @includeIf('paginas.partials.novedad', ['e' => $n])
            </div>			
        @endforeach
    </div>
</div>
@endsection
@push('head')

@endpush
@push('scripts')	
@endpush
       
