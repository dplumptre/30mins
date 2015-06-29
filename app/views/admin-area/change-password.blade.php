<?php  $users = Auth::user();
//$row = Shout::orderBy('id', 'DESC')->where('user_id','=', $users->id )->get();
?>
@extends('layout.masterHome')

@section('title')
Admin-area
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
<div class="col-lg-6 ">


<ul class="nav nav-pills">
    <li >{{ HTML::link('/admin-area/','All Users')}} </li>
      <li  >{{ HTML::link('/admin-area/view-prayers','All Prayers')}} </li>
  <li class="active">{{ HTML::link('/admin-area/change-password','Change Password')}} </li>
</ul>    
    
   <!--    
   flash messages 
    -->
  @if(Session::has('message'))
<div class="margin-top-10 text-center alert alert-danger">
<span class="fa-stack fa-lg">
  <i class="fa fa-circle-o fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x"></i>
</span>
    &nbsp;<strong>{{ Session::get('message')}} ! </strong>   
</div>
@endif  
    
  @if(Session::has('success-message'))
<div class="margin-top-10  text-center alert alert-success">
<span class="fa-stack fa-lg">
  <i class="fa fa-circle-o fa-stack-2x"></i>
  <i class="fa fa-check fa-stack-1x"></i>
</span>
    &nbsp;<strong>{{ Session::get('success-message')}} ! </strong>   
</div>
@endif   
    
    
    
    

    <h2>Change Password</h2> 



                        
        {{ Form::open( array('url' => '/admin-area/change-password') )}}
        
        {{ Form::label( 'name','Enter Password')}}
        {{ Form::password( 'password', array('class' => 'form-control','placeholer' => 'Enter Password') ) }}
            {{ $errors->first('password', "<p class='text-info'>:message</p>");}}
            
          {{ Form::label( 'name','Enter New Password')}}
        {{ Form::password( 'new-password',array('class' => 'form-control','placeholer' => 'Enter Password') ) }}
            {{ $errors->first('new-password', "<p class='text-info'>:message</p>");}}      
        
         {{ Form::label( 'name','Confirm New Password')}}
        {{ Form::password( 'confirm-new-password',array('class' => 'form-control','placeholer' => 'Enter Password') ) }}
            {{ $errors->first('confirm-new-password', "<p class='text-info'>:message</p>");}}         
        
        
        
         <br />
        {{ Form::submit( 'Change Password',array('class' =>'btn  btn-warning'))}}  
             

        
        {{ Form::close()}}   


</div>

@stop	