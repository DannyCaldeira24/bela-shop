@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Lista de productos")

@section('content')
<div class="page-header header-filter" data-parallax="true" style="background-image: url('{{asset('img/city-profile.jpg')}}')">
</div>
<div class="main main-raised">
    <div class="profile-content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto mr-auto">
            <div class="profile">
              <div class="avatar">
                <img src="{{asset('images/users/'. Auth::user()->avatar)}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
              </div>
              <div class="name">
                <h3 class="title">{{ Auth::user()->name }}</h3>
                <h6>Admin</h6>
              </div>
            </div>
          </div>
        </div>
<!--         <div class="description text-center">
  <p>Como administrador puede gestionar nuestros productos</p>
</div> -->
        <div class="tab-content tab-space text-center">
            <a href="{{url('/admin/products/create')}}" type="button" class="btn btn-primary">Agregar producto</a>
            <h2 class="title">Listado de productos</h2>
            <div class="team">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <table class="table">
                            <thead>
                                <tr id="miTablaPersonalizada">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nombre</th>
                                    <th class="text-center">Descripción</th>
                                    <th class="text-center">Categoría</th>
                                    <th class="text-center">Precio</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <td class="text-center">{{$product->id}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->category_name}}</td>
                                    <td class="text-center">&euro; {{$product->price}}</td>
                                    <td class="td-actions text-right">
                                        <form method="post" action="{{url('/admin/products/'.$product->id.'/delete')}}">
                                            @csrf
                                            <a href="{{url('/products/'.$product->id)}}" type="button" rel="tooltip" title="Ver producto" class="btn btn-info btn-simple btn-xs" target="_blank">
                                                <i class="fa fa-info"></i>
                                            </a>
                                            <a href="{{url('/admin/products/'.$product->id.'/images')}}" type="button" rel="tooltip" title="Imagenes del producto" class="btn btn-primary btn-simple btn-xs">
                                                <i class="material-icons">add_photo_alternate</i>
                                            </a>
                                            <a href="{{url('/admin/products/'.$product->id.'/edit')}}" rel="tooltip" title="Editar producto" class="btn btn-success btn-simple btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <button type="submit" rel="tooltip" title="Eliminar producto" class="btn btn-danger btn-simple btn-xs">
                                            <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-12">
                        <div style="display: flex;justify-content: center;">
                            {{$products->links()}}
                        </div>
                    </div>               
                </div>
            </div>    
        </div>    
      </div>
    </div>
</div>

@endsection
