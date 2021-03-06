@extends('layouts.app')

@section('body-class', 'profile-page')

@section('title',"Registrar producto")

@section('users')
    @if (auth()->user()->admin)
    <form style="margin-left:30px;color:black;" class="form-inline my-2 my-lg-0" method="get" action="{{url('admin/search')}}">
        <input style="color:#b3bdce;" class="form-control mr-sm-2" type="text" placeholder="Nombre del usuario" class="form-control" name="queryus" id="search3">
        <button class="btn btn-primary btn-just-icon" type="submit">
            <i class="material-icons">
                search
            </i>
        </button>
    </form>
    @endif
@endsection

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
                <a title="Cambiar imagen de perfil" href="{{url('/user/edit')}}">
                  <img src="{{asset('images/users/'. Auth::user()->avatar)}}" alt="Circle Image" class="img-raised rounded-circle img-fluid">
                </a>
              </div>
              <br>
              <div class="name">
                <div style="display: flex;justify-content: center;" class="row">
                    <div class="col-12 col-sm-8">
                        <div class="card">
                            <div class="card-header card-header-text card-header-primary">
                                <h4 class="card-title">{{ Auth::user()->name }}</h4>
                            </div>
                            <div class="card-body">
                                <h5 class="title">@if (auth()->user()->admin) ADMIN @else Cliente @endif</h5>
                                @if (session('notification'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('notification') }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>          
                </div>
              </div>
            </div>
          </div>
        </div>
<!--         <div class="description text-center">
  <p>Como administrador puede gestionar nuestros productos</p>
</div> -->
        <div class="tab-content tab-space text-center">
            <div class="team">
                <div style="display: flex;justify-content: center;" class="row">
                    <div class="col-12 col-sm-8">
                        <div class="card">
                            <div class="card-header card-header-text card-header-primary">
                                <h4 class="card-title">Registrar Productos</h4>
                                <p class="category">Datos del producto</p>
                            </div>
                            <div class="card-body">
                                @if ($errors->any())
                                   <div class="alert alert-danger">
                                       <ul>
                                           @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                           @endforeach
                                       </ul>
                                   </div> 
                                @endif
                                <form method="POST" action="{{ url('/admin/products') }}">
                                    @csrf
                                      <div class="form-group">
                                        <label for="name">Nombre</label>
                                        <input type="text" class="form-control" name="name" value="{{old('name')}}">
                                      </div>
                                      <div class="form-group">
                                        <label for="description">Descripción corta</label>
                                        <input type="text" class="form-control" name="description" value="{{old('description')}}">
                                      </div>
                                      
                                      <div class="row">
                                        <div class="col-6 col-md-6">
                                          <div class="form-group">
                                            <label for="price">Precio</label>
                                            <input type="text" class="form-control" name="price" value="{{old('price')}}">
                                          </div>
                                        </div>
                                        <div class="col-6 col-sm-6">
                                          <div class="form-group">
                                            <label for="category_id">Categoría del Producto</label>
                                            <select class="form-control form-control-sm" name="category_id" id="category_id">
                                              <option value="0">General</option>
                                              @foreach ($categories as $category)
                                              <option value="{{$category->id}}">{{$category->name}}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                        </div>
                                      </div> 
                                      <div class="form-group">
                                        <label for="long_description">Descripcion completa</label>
                                        <textarea class="form-control" name="long_description" rows="5" placeholder="">{{old('long_description')}}</textarea>
                                      </div>
                                      <button class="btn btn-primary">
                                          Registrar
                                      </button>&nbsp;&nbsp;&nbsp;
                                      <a href="{{url('/admin/products')}}" type="button" class="btn btn-danger">Cancelar</a>  
                                </form>
                            </div>
                        </div>
                    </div>          
                </div>
            </div>
                 
        </div>    
      </div>
    </div>
</div>

@endsection

