@extends('adminlte::page')
@section('title', 'Contenido empresa')
@section('content')
@if ($errors->any())
    @include('administrator.partials.mensaje-error')
@endif
@includeIf('administrator.partials.mensaje-exitoso')
@isset($section1)
    <section>
        <form action="{{ route('company.content.updateInfo') }}" method="post" class="row mt-5 mb-5" data-sync="no" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$section1->id}}">
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    <input type="text" name="content_1" value="{{$section1->content_1}}" placeholder="Título" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="content_2" cols="30" rows="10" class="ckeditor">{{$section1->content_2}}</textarea>
                </div>
            </div>
            <div class="col-sm-12 col-md-6">
                <div class="form-group">
                    @if (Storage::disk('public')->exists($section1->image))
                        <img src="{{ asset($section1->image) }}" class="img-fluid d-block mb-3 w-100">
                    @endif
                    <small>la imagen debe ser al menos 603x442px</small>
                    <input type="file" name="image" class="form-control-input">
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" name="content_3" value="{{$section1->content_3}}" placeholder="Iframe video" class="form-control">
                </div>
            </div>
            <div class="text-right col-sm-12">
                <button type="submit" class="btn btn-primary w-100">Actualizar</button>
            </div>
        </form>
    </section>
@endisset
@isset($section2)
    <section>
        <form action="{{ route('company.content.updateInfo') }}" method="post" class="row mt-5 mb-5" data-sync="no">
            @csrf
            <input type="hidden" name="id" value="{{$section2->id}}">
            <div class="col-sm-12 col-md-10">
                <div class="form-group">
                    <input type="text" name="content_1" value="{{$section2->content_1}}" placeholder="Título" class="form-control">
                </div>
            </div>
            <div class="text-right col-sm-12 col-md-2">
                <button type="submit" class="btn btn-primary w-100">Actualizar</button>
            </div>
        </form>
    </section>
@endisset
<div class="row mb-5">
    <div class="col-sm-12">
        <div class="d-flex align-items-center">
            <h2 class="mr-2 mb-0">Características</h2>
            <button type="button" class="btn btn-sm btn-primary mb" data-toggle="modal" data-target="#modal-create-element">crear</button>
        </div>
        <table id="page_table_slider" class="table">
            <thead>
                <tr>
                    <th>Order</th>
                    <th>Título</th>
                    <th>Contenido</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@includeIf('administrator.company.modals.create')
@includeIf('administrator.company.modals.update')
@stop
@section('css')
    <meta name="_token" content="{{csrf_token()}}">
    <meta name="url" content="{{route('company.content')}}">
    <meta name="content_find" content="{{route('content')}}">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
@stop

@section('js')
    <script src="{{ asset('/vendor/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('js/axios.js') }}"></script>
    <script src="{{ asset('js/admin/index.js') }}"></script>
    <script src="{{ asset('js/admin/company/index.js') }}"></script>
@stop

