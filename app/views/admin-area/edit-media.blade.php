<?php  $users = Auth::user();
$mycode = new MyCode();
?>
@extends('layout.masterHome')

@section('title')
Admin Area
@stop


@section('nav')
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
            <a href="{{ asset('/')}}" class="navbar-brand">Just30minutes </a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
       
            <li>
<!--              <a href="http://news.bootswatch.com">Blog</a>-->
            </li>

          </ul>

          <ul class="nav navbar-nav navbar-right">

          @if(!Auth::check()) 
<!--           <li>{{HTML::link('register','Register')}}</li>           -->
           <li>{{HTML::link('login','Login')}}</li>  
          @else 
           
            <li class="dropdown">
                <a class="dropdown-toggle " data-toggle="dropdown" href="#" id="download"> <span class="text-warning">{{ $users->username   }}</span><span class="text-warning caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download">
                <li>{{HTML::link('user-area','Profile')}}</li>
                @if($users->access == 2)
                <li>{{HTML::link('admin-area','Admin')}}</li>
                @endif
                <li>{{HTML::link('logout','Logout')}}</li>
              </ul>
            </li>
            @endif
          </ul>

        </div>
      </div>
    </div>
@stop

@section('content')
<div class="col-lg-6 ">


<?php 
if(!isset($cat)){
    $cat = null;
}
?>        
         
<ul class="nav nav-pills">
@foreach($mycode::$menu_admin as $menu)
@if( in_array($cat, $menu['value']))
<li class="active"><a href="{{ asset($menu['route'])}}">{{ $menu['title']}}</a></li>
@else
<li><a href="{{ asset($menu['route'])}}">{{ $menu['title']}}</a></li>
@endif
@endforeach
</ul>  
    
    
    
    
    <h2>Edit Media</h2> 
    
   @if( $errors->count() > 0 )

<div class='alert alert-danger'>
<button type='button' class='close' data-dismiss='alert'>&times;</button>  
<strong>The following errors have occurred:</strong>
@foreach( $errors->all() as $message )
<div>{{ $message }}</div>
@endforeach
</div>
@endif   
    
    

{{ Form::model($specshout, array('route' => array('admin-area.update-media', $specshout->id), 'method' => 'PUT')) }}

        
        
        {{ Form::label( 'title','Title')}}
        {{ Form::text( 'title',null, array('class' => 'form-control','placeholder'=>'Enter Title') ) }} 
   

        
        {{ Form::label( 'user','Prayer Meeting Date')}}
        {{ Form::text( 'thedate',null, array('class' => 'form-control','placeholer' => 'Enter Date','id'=>'datepicker') ) }} 

 
        
        {{ Form::label( 'media','Enter Media')}}
        {{ Form::textarea( 'mediacontent',null, array('class' => 'form-control','placeholer' => 'Enter Media') ) }}
 
            
            
         <br />
        {{ Form::submit( 'Edit Media',array('class' =>'btn  btn-info'))}}  
             

        
        {{ Form::close()}}           
        
        
        
        
        
        
        
        
        

</div>

@stop	