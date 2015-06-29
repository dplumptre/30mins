<?php  $users = Auth::user();?>
<?php  //$row = Shout::with('users')->orderBy('id', 'DESC')->get();?>
<?php  $row = Media::orderBy('id', 'DESC')->get();?>
@extends('layout.masterHome')

@section('title')
Media
@stop


@section('nav')

    <style>
        
        h1 span.gfont,h3 { font-family: 'Petit Formal Script'; font-weight: 400; }
        .video-container{
            position: relative;
            padding-bottom: 56.25%;
            padding-top: 30px;
            height: 0px;
            overflow: hidden;
        }
        
       .video-container iframe,
       .video-container object,
       .video-container embed{
 position: absolute;
 top:0;
 left:0;
 width:100%;
 height: 100%;
           
       }
    </style>










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
         <li>{{HTML::link('/about-us','About')}}</li>  
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



<div class=" col-lg-12 ">
  <h2>Media</h2>  
</div>









@if(isset($therows)) 
<div class="col-lg-offset-4 col-md-4 col-lg-offset-4">      
<!--<h3>Wednesday LIve Prayer Meeting </h3>-->
<h3 class="text-info">{{ $therows->title }}</h3>
<div class="video-container"> 
{{ $therows->mediacontent }}
</div>
</div>
@endif






<div class=" margin-top-30 col-lg-12 ">


    <table cellpadding="0"  cellspacing="0" border="0" class="table " id="example2">
	<thead>
		<tr >
			<th style="border:#023332 thin solid"  >sn</th>
			<th style="border:#023332 thin solid" >Date</th>
                        <th style="border:#023332 thin solid" >Title</th>
			<th  width='12%' style="border:#023332 thin solid" >Action</th>

		</tr>
	</thead>
	<tbody>
  @foreach($row as $key => $news)
  		<tr class="odd gradeX">
			<td style="border:#023332 thin solid" >{{ $key +1 }}</td>
			<td style="border:#023332 thin solid" >{{ $news->thedate }} </td>                        
			<td style="border:#023332 thin solid" >{{ $news->title }} </td>
                        <td style="border:#023332 thin solid" > <a style="text-decoration: none"  class="btn btn-warning" href="{{ URL::to('media/'.$news->id)}}"> view </a></td>
		</tr>
        
        
        @endforeach

		
	</tbody>
</table>





</div>

@stop	