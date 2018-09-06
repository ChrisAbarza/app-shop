@extends('layouts.app')

@section('title', 'Categorias')

@section('body-class', 'profile-page')

@section('styles')

<style>
    .team {
        padding-bottom: 50px;
    }
    .team .row .col-md-4 {
        margin-bottom: 5em;
    }
    .team .row {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display:         flex;
      flex-wrap: wrap;
    }
    .team .row > [class*='col-'] {
      display: flex;
      flex-direction: column;
    }
</style>

@endsection

@section('content')

<div class="header header-filter" style="background-image: url('/img/examples/city.jpg');"></div>

<div class="main main-raised">
    <div class="profile-content">
        <div class="container">
            <div class="row">
                <div class="profile">
                    <div class="avatar">
                        <img src="https://bentleyrealtyinc.com/wp-content/uploads/sites/548/2014/10/active-search-512-300x300.gif" alt="busqueda" class="img-circle img-responsive img-raised">
                    </div>
                    <div class="name">
                        <h3 class="title">Resultados de la busqueda: "{{ $query }}"</h3>
                    </div>
                    
                    @if (session('notification'))
                        <div class="alert alert-success">
                        <div class="container-fluid">
                          <div class="alert-icon">
                            <i class="material-icons">check</i>
                          </div>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="material-icons">clear</i></span>
                          </button>
                          <b>Genial:</b> {{ session('notification') }}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="description text-center">
                <p>Se encontraron {{ $products->count() }} resultados.</p>
            </div>
            
            <div class="team text-center">
                        <div class="row">
                            @foreach ($products as $product)
                            <div class="col-md-4">
                                <div class="team-player">
                                    <a href="{{ url('/products/'.$product->id) }}" title="{{ $product->name }}"><img src="{{ $product->featured_image_url}}" alt="Thumbnail Image" class="img-raised img-circle"></a>
                                    <h4 class="title">
                                        <a href="{{ url('/products/'.$product->id) }}">{{$product->name}}</a>
                                        <br />
                                    </h4>
                                    
                                    <h6>$ {{ $product->price }}</h6>
                                    <p class="description">{{$product->description}}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                        {{ $products->links() }}
                    </div>

        </div>
    </div>
</div>

@include('includes.footer')    
@endsection


