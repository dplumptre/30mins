<?php  $users = Auth::user();
$row = Prayer::orderBy('id', 'DESC')->where('user_id','=', $users->id )->get();
?>
@extends('layout.masterHome')

@section('title')
User Area
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
   
@foreach($drop::$menu_user as $menu)
@if( in_array($cat, $menu['value']))
<li class="active"><a href="{{ asset($menu['route'])}}">{{ $menu['title']}}</a></li>
@else
<li><a href="{{ asset($menu['route'])}}">{{ $menu['title']}}</a></li>
@endif
@endforeach
</ul>  
    

    <h2>View Prayers</h2> 
    <table cellpadding="0"  cellspacing="0" border="0" class="table " id="example2">
	<thead>
		<tr >
			<th style="border:#023332 thin solid"  >sn</th>
                        <th style="border:#023332 thin solid"  >Category</th>
			<th style="border:#023332 thin solid" >Prayers</th>
			<th  width='12%' style="border:#023332 thin solid" >Action</th>

		</tr>
	</thead>
	<tbody>
  @foreach($row as $key => $news)
  		<tr class="odd gradeX">
			<td style="border:#023332 thin solid" >{{ $key +1 }}</td>
                        	<td style="border:#023332 thin solid" >{{$news->cat }}</td>
			<td style="border:#023332 thin solid" >{{ substr($news->message,0,110) }}</td>
			<td style="border:#023332 thin solid" >               <!-- delete the nerd (uses the destroy method DESTROY /nerds/{id} -->
    <!-- we will add this later since its a little more complicated than the other two buttons -->
{{ Form::open(array('url' => 'user-area/view-prayers/' . $news->id, 'class' => 'pull-right ')) }}
{{ Form::hidden('_method', 'DELETE') }}
<!--            {{ Form::submit('X', array('class' => 'fa fa-home btn btn-warning ')) }}-->
<button type="submit" class="btn btn-danger "
onclick="javascript:return confirm('Are you sure to delete the testimony')" >  <i class="fa fa-trash-o"></i>
</button>
{{ Form::close() }}  
    
<!--
           {{ HTML::link('user-area/'.$news->id,'',array('class'=>'btn btn-success fa fa-user'))}}
           -->
           {{ HTML::link('user-area/view-prayers/'.$news->id.'/edit-prayers','',array('class'=>'btn btn-warning fa fa-edit'))}}
           
           </td>
		</tr>
        
        
        @endforeach

		
	</tbody>
</table>





</div>

@stop	