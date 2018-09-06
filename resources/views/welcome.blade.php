@extends('layouts.app')

@section('title', 'Bienvenido a la tienda OTPP')

@section('body-class', 'landing-page')

@section('styles')
<style>
    .team .row .col-md-4{
        margin-bottom: 5em; 
    }
    .row {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display:         flex;
      flex-wrap: wrap;
    }
    .row > [class*='col-'] {
      display: flex;
      flex-direction: column;
    }
</style>
@endsection

@section('content')
<div class="wrapper">
        <div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="title">Bienvenido a la tienda OTPP.</h1>
                        <h4>Realiza tu pedido con nuestro catalogo y te contactaremos para coordinar el envio (A todo chile)</h4>
                        <br />
                        <a href="https://www.youtube.com/watch?v=4zdoXgGnKdc" class="btn btn-danger btn-raised btn-lg">
                            <i class="fa fa-play"></i> ¿Cómo comprar?
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main main-raised">
            <div class="container">
                <div class="section text-center section-landing">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="title">Nuestro compromiso</h2>
                            <h5 class="description">This is the paragraph where you can write more details about your product. Keep you user engaged by providing meaningful information. Remember that by this time, the user is curious, otherwise he wouldn't scroll to get here. Add a button if you want the user to see more.</h5>
                        </div>
                    </div>

                    <div class="features">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-primary">
                                        <i class="material-icons">chat</i>
                                    </div>
                                    <h4 class="info-title">Siempre en contacto</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-success">
                                        <i class="material-icons">verified_user</i>
                                    </div>
                                    <h4 class="info-title">Pago seguro</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="info">
                                    <div class="icon icon-danger">
                                        <i class="material-icons">fingerprint</i>
                                    </div>
                                    <h4 class="info-title">Compras secretas</h4>
                                    <p>Divide details about your product or agency work into parts. Write a few lines about each one. A paragraph describing a feature will be enough.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section text-center">
                    <h2 class="title">Categorias disponibles</h2>
                    
                    <form class="form-inline" method="get" action="{{ url('/search') }}">
                        <input type="text" placeholder="¿Qué producto buscas?" class="form-control" name="query">
                        <button class="btn btn-primary btn-just-icon" type="submit">
                            <i class="material-icons">search</i>
                        </button>
                    </form>
                    
                    <div class="team">
                        <div class="row">
                            @foreach ($categories as $category)
                            <div class="col-md-4">
                                <div class="team-player">
                                    <a href="{{ url('/categories/'.$category->id) }}" title="{{ $category->name }}"><img src="{{ $category->featured_image_url}}" alt="Thumbnail Image" class="img-raised img-circle"></a>
                                    <h4 class="title">
                                        <a href="{{ url('/categories/'.$category->id) }}">{{$category->name}}</a>
                                        <br />
                                    </h4>
                                    <p class="description">{{$category->description}}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>

                </div>


                <div class="section landing-section">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h2 class="text-center title">¿Tienes una consulta?</h2>
                            <h4 class="text-center description">Contactanos aqui, y a la brevedad te responderemos</h4>
                            <form class="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Nombre</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Correo electronico</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group label-floating">
                                    <label class="control-label">Mensaje</label>
                                    <textarea class="form-control" rows="4"></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 col-md-offset-4 text-center">
                                        <button class="btn btn-primary btn-raised">
                                            Enviar
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        </div>
@include('includes.footer')  
@endsection
