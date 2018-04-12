@extends('layouts.app')

@section('htmlheader_title')
	Perfil de usuario
@endsection
@section('content-wrapper')
<div class="content-wrapper">

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        @yield('contentheader_title', 'Perfil de usuario')
        <small></small>
    </h1>
    <div class="col-md-12">
            <!-- mensaje flash -->
    </div>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Perfil de usuario</a></li>
        <li class="active">Lista</li>
    </ol>
</section>
<!-- Main content -->
<section class="content spark-screen">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-heading">Perfil de usuario

          <div class="btn-group pull-right" style="margin: 15px 0px 15px 15px;">
              
          </div>
        
        </div>
      
		    <div class="col-md-10 col-md-offset-1">
			     @include('flash::message')
    		</div>   
    		<div class="panel-body">
			    <div class="box-body">
				   <div class="panel-body">
              @include('admin.profile.partials.index-fields')
            </div>
				  </div> 
        </div>
		  </div>
    </div>
  </div>
</section>


@endsection
