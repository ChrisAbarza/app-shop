@extends('layouts.app')

@section('title', 'Crear categoría')

@section('body-class', 'product-page')

@section('content')
<div class="wrapper">
        <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
        </div>

        <div class="main main-raised">
            <div class="container">

                <div class="section">
                    <h2 class="title text-center">Ingresar Categoría</h2>

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>


                    @endif

                    <form method="post" action="{{ url('/admin/categories') }}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre de la categoría</label>
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>

                        <textarea class="form-control" placeholder="Descripción de la categoría" rows="5" name="description">{{ old('description') }}</textarea>

                        <button class="btn btn-primary">Registrar categoría</button>
                        <a href="{{ url('/admin/categories') }}" class="btn btn-default">Cancelar</a>
                    </form>

                </div>
            </div>

        </div>

        @include('includes.footer')  

    </div>
@endsection
