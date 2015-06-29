<?php  $users = Auth::user(); // dd($users);?>
@extends('layout.masterHome')

@section('title')
Password Reset
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
                <a class="dropdown-toggle " data-toggle="dropdown" href="{{ URL::to('media') }}" id="download"> <span >Media</span><span class="caret"></span></a>
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
    <h2>Password Reset</h2> 
    
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
      
    
    
     {{ Form::open( array('url' => '/password-reset') )}}


        {{ Form::label( 'title','Email ( enter the email you used to register)')}}
                                    {{ $errors->first('email', "<p class='text-yellow'>:message</p>");}}
        {{ Form::email( 'email','', array('class' => 'form-control','placeholder'=>'Enter Email') ) }} 

        
        




   
                <label class="control-label" for="inputLarge">Enter Code </label><small>  (Not case sensitive)</small> <b>:</b><br />
                            {{ $errors->first('captcha', "<p class='text-yellow'>:message</p>");}}  
                {{  HTML::image(Captcha::img(), 'Captcha image') }}
                <input name="captcha"  class="margin-top-10 form-control"id="captcha" type="text">     

                       
     {{ Form::submit( 'RESET PASSWORD',array('class' =>'btn  btn-warning margin-top-15'))}} 

        
        {{ Form::close()}}   
    
    
    
    
    
    
    
    
    
    
    
    
</div>

@stop	