<?php  $users = Auth::user();
$row = Shout::orderBy('id', 'DESC')->where('user_id','=', $users->id )->get();
?>
@extends('layout.masterHome')

@section('title')
User Area
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
            <li><a href=" {{  URL::to( $drop::$menuOptions[1][$i]['route']) }}"> {{ $drop::$menuOptions[1][$i]['title'] }}</a></li>        
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


   

<?php 
if(!isset($cat)){
    $cat = null;
}
?>        
         
<ul class="nav nav-pills">
@foreach($drop::$menu_user as $menu)
@if( in_array($cat, $menu['value']))
<li class="active"><a href="{{ asset($menu['route'])}}">{{ $menu['title']}}</a></li>
@else
<li><a href="{{ asset($menu['route'])}}">{{ $menu['title']}}</a></li>
@endif
@endforeach
</ul>   
    
 
    
    

    <h2>Create Shout of praise</h2> 



                        
        {{ Form::open( array('url' => '/user-area/create-shoutout') )}}
        
        {{ Form::label( 'Testimony','Enter Testimony')}}
        {{ Form::textarea( 'testimony','', array('class' => 'input-sm form-control','placeholer' => 'Enter Testimony') ) }}

         <br />
        {{ Form::submit( 'Insert Testimony',array('class' =>'btn  btn-warning'))}}  
             

        
        {{ Form::close()}}   


</div>

@stop	