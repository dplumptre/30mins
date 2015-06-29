<?php  $users = Auth::user(); // dd($users);?>
@extends('layout.masterHome')

@section('title')
Register
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
           <li>{{HTML::link('shout-of-praise','Shouts Of Praise')}}</li>
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
                <a class="dropdown-toggle " data-toggle="dropdown" href="#" id="download"> <span class="text-navy">{{ $users->username   }}</span><span class="text-navy caret"></span></a>
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
<div class="col-lg-4 col-lg-offset-4 col-sm-12 ">
    
  @if(Session::has('message'))
<div class="text-center alert alert-danger">
<span class="fa-stack fa-lg">
  <i class="fa fa-circle-o fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x"></i>
</span>
    &nbsp;<strong>{{ Session::get('message')}} ! </strong>   
</div>
@endif  
    
    
    

    
    
    
    <div class="alert alert-orange">
        
        {{ Form::open( array('url' => '/register') )}}

        {{ Form::label( 'user','Username')}}
        {{ Form::text( 'username','', array('class' => 'form-control','placeholer' => 'Enter username','placeholder'=>'Enter Username') ) }} 
            {{ $errors->first('username', "<p class='text-navy'>:message</p>");}}
        
        {{ Form::label( 'email','E-mail Address')}}
        {{ Form::text( 'email','',array('class' => 'form-control','placeholder'=>'Enter Email Address') ) }} 
            {{ $errors->first('email', "<p class='text-navy'>:message</p>");}}        
 
        {{ Form::label( 'pass','Password')}}
        {{ Form::password( 'password', array('class' => 'form-control') ) }}         
            {{ $errors->first('password', "<p class='text-navy'>:message</p>");}}        
            
        {{ Form::label( 'pass','Confirm Password')}}
        {{ Form::password( 'password_confirm', array('class' => 'form-control') ) }}         
             {{ $errors->first('password_confirm', "<p class='text-navy'>:message</p>");}}               
        
        <div class="margin-top-10">
        {{ Form::submit( 'Register',array('class' =>'btn  btn-default'))}}  
                &nbsp;&nbsp;
        {{HTML::link('login','login')}}  
        </div> 



        {{ Form::close()}} 
    
  </div>  
</div>

@stop	