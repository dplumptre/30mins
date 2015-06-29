<?php  $users = Auth::user(); // dd($users);?>
@extends('layout.masterHome')

@section('title')
Login
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
                <li>{{HTML::link('/','Home')}}</li>          
         <li>{{HTML::link('about-us','About Us')}}</li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="download">Prayer Category<span class="caret"></span></a>
            <ul class="dropdown-menu" aria-labelledby="download">
            <?php
            $drop = new MyCode();
            $count = count($drop::$menuOptions[1]); 
            ?> 
            <?php for($i=0;$i<$count;$i++) :    ?>
            <li><a href=" <?php  echo $drop::$menuOptions[1][$i]['route'] ; ?>"> <?php  echo $drop::$menuOptions[1][$i]['title'] ;  ?></a></li>     
            <?php endfor;    ?>                    
            </ul>
            </li>
           <li>{{HTML::link('shout-of-praise','Shout Of Praise')}}</li>
               <li class="dropdown">
                <a class="dropdown-toggle " data-toggle="dropdown" href="{{ URL::to('media') }}" id="download"> <span >Media</span><span class=" caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download">
                     <li>{{HTML::link('media','Prayer achive')}}</li>  
                <li>{{HTML::link('live','Live Prayer')}}</li>        
              </ul>
               </li>
          @if(!Auth::check()) 
<!--           <li>{{HTML::link('register','Register')}}</li>           -->
           <li>{{HTML::link('login','Login')}}</li>  
          @else 
           
            <li class="dropdown">
                <a class="dropdown-toggle " data-toggle="dropdown" href="#" id="download"> <span class="text-warning">{{ $users->username   }}</span><span class="text-warning caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download">
                <li><a href="#">Profile</a></li>
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
<div class="col-lg-4 col-lg-offset-4 col-sm-12 ">
 
    
    
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
    

    
    
    
    <div class="alert alert-orange">
        
        {{ Form::open( array('url' => '/login') )}}

        {{ Form::label( 'user','Username')}}
        {{ Form::text( 'username','', array('class' => 'form-control','placeholer' => 'Enter username') ) }} 
<!--            {{ $errors->first('username', '<p>:message</p>');}}-->
        
        {{ Form::label( 'pass','Password')}}
        {{ Form::password( 'password', array('class' => 'form-control') ) }} 
<!--            {{ $errors->first('password', '<p>:message</p>');}}        -->
 
        <div class="margin-top-10">
        {{ Form::submit( 'sign in',array('class' =>'btn  btn-default'))}} 
        &nbsp;&nbsp;
        {{HTML::link('register','New? Register')}}  
        </div> 

        <div class="margin-top-10">
        {{HTML::link('password-reset','Forgot Password')}}
        </div>

        {{ Form::close()}} 
    
  </div>  
</div>

@stop	