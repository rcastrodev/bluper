@extends('paginas.partials.app')
@section('content')
@includeIf('paginas.partials.jumbotron', ['text' => 'Productos'])
@isset($productos)
    <div class="py-5">
        <div class="container row mx-auto">
			<aside class="col-sm-12 col-md-3">
                @includeIf('paginas.partials.form-productos')
				<h4 class="font-size-15 pb-3" style="color:#9F9F9F; font-weight:300; border-bottom:1px solid #D9D9D9;">CATEGORIAS</h4>
                <ul class="p-0" style="list-style: none;">
                    @foreach ($categorias as $c)
                        <li class="py-2"> 
                            <a href="{{ route('categoria', ['slug'=> $c->slug]) }}" class="d-block p-2 text-decoration-none text-uppercase font-size-16 position-relative @if($c->id == $categoria->id) text-purple @else text-dark @endif"
                            style="@if($c->id == $categoria->id) font-weight: 500; @endif">{{$c->name}}</a>
                        </li>              
                    @endforeach
                </ul>             
            </aside>
            <div class="col-sm-12 col-md-9">
                @if ($productos->count())
                    <section class="row font-size-14 my-3">
                        @foreach ($productos as $p)
                            <div class="col-sm-12 col-md-6 col-lg-4 mb-3">
                                @includeIf('paginas.partials.producto', ['p' => $p])
                            </div>
                        @endforeach                
                    </section>    
                @else
                    <h2 class="text-center my-5">No tenemos productos cargados en la actualidad</h2>
                @endif
            </div>
        </div>
    </div>
@endisset
@endsection


       
