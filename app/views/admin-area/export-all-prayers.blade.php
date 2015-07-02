<?php  $users = Auth::user();
$row = User::where('username','!=','Anonynmous')->orderBy('id', 'DESC')->get();
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
            <a href="{{ asset('/')}}" class="navbar-brand">#just30minutes </a>
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
<div class="col-lg-12 ">
    
    
    
    
    
    
    
    

<div id="holla"></div>

    

<!--    
   flash messages 
    -->
  @if(Session::has('message'))
<div class="text-center alert alert-danger">
<span class="fa-stack fa-lg">
  <i class="fa fa-circle-o fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x"></i>
</span>
    &nbsp;<strong>{{ Session::get('message')}} ! </strong>   
</div>
@endif  
    
  @if(Session::has('success-message'))
<div class="text-center alert alert-success">
<span class="fa-stack fa-lg">
  <i class="fa fa-circle-o fa-stack-2x"></i>
  <i class="fa fa-check fa-stack-1x"></i>
</span>
    &nbsp;<strong>{{ Session::get('success-message')}} ! </strong>   
</div>
@endif   




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
    


    

    <h2>Export Prayers</h2> 
    
    
    
    
                            
                           
        {{ Form::open( array('url' => '/admin-area/export-all-prayers') )}}
         
        
        {{ Form::label( 'title','Number of prayer to be downloaded')}}<br />
        {{ Form::text( 'prayernumber','', array('class' => 'form-control-small','placeholder'=>'e.g 10') ) }} 
                       {{ $errors->first('prayernumber', "<p class='text-yellow'>:message</p>");}}
    
         <br /><br />
        {{ Form::submit( 'Edit',array('class' =>'btn  btn-warning'))}}  
             

        
        {{ Form::close()}}  
        
        
        
        
        <h3>Current No of prayers to download: {{ $prayernumber }}</h3>
        <h4>Total Number of prayers : {{ $p }}</h4>
        
        <a class="btn btn-lg btn-danger" href="{{   asset('/admin-area/export')  }}">download <i class="fa fa-download"></i></a>
        
        


</div>

@stop	