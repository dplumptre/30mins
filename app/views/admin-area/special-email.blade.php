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
            <a href="{{ asset('/')}}" class="navbar-brand">#just30minutes</a>
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











<?php

//
//foreach ($row as  $value) {
//    
//    echo $value->email ."<br />";
//}


?>






    <h2>&nbsp;</h2> 
<div id="holla"></div>
    
















    
    <table cellpadding="0"  cellspacing="0" border="0" class="table " id="example2">
	<thead>
		<tr >
                    <th  width='15%' style="border:#023332 thin solid"  > S/n</th>
			<th  width='15%' style="border:#023332 thin solid"  >Date</th>
                        <th style="border:#023332 thin solid"  >Email</th>
			<th  width='12%' style="border:#023332 thin solid" >Action</th>

		</tr>
	</thead>
	<tbody>
  @foreach($row as $key => $news)
  		<tr class="odd gradeX">
                    <td style="border:#023332 thin solid" >{{ $key +1 }}</td>
			<td style="border:#023332 thin solid" >{{ $news->created_at }}</td>
                        	<td style="border:#023332 thin solid" >{{$news->email }}</td>
                                
                                
                                   
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
			<td style="border:#023332 thin solid" >               <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
    <!-- we will add this later since its a little more complicated than the other two buttons -->
{{ Form::open(array('url' => 'admin-area/special-email/' . $news->id, 'class' => 'pull-right ')) }}
{{ Form::hidden('_method', 'DELETE') }}
<!--            {{ Form::submit('X', array('class' => 'fa fa-home btn btn-warning ')) }}-->
<button type="submit" class="btn btn-danger "
onclick="javascript:return confirm('Are you sure to delete ')" >  <i class="fa fa-trash-o"></i>
</button>
{{ Form::close() }}  
    
 
           </td>
		</tr>
        
        
        @endforeach

		
	</tbody>
</table>





</div>

@stop	