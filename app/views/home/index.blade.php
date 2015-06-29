<?php  $users = Auth::user(); // dd($users);?>
@extends('layout.masterHome')

@section('title')
Home
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
 
         <li>{{HTML::link('about-us','About Us')}}</li>
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
                <a class="dropdown-toggle " data-toggle="dropdown" href="#" id="download"> <span class="text-warning">{{ $users->username }}</span><span class="text-warning caret"></span></a>
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























@section('content')
@if(!isset($specificPrayer))            

          <div class="col-lg-4  col-sm-6">
              
              <a style="text-decoration:none" data-toggle="modal" data-target="#myModal">
              <div class=" text-center alert alert-dismissable alert-clickme ">
                  <h2>CLICK HERE </h2>
                <h2>TO POST A PRAYER</h2>
               </div>
                </a>
          </div>            
@endif           



@if(isset($specificPrayer))
<?php  $prayers = Prayer::with('users')->where('cat','=',$specificPrayer)->orderBy('id', 'DESC')->paginate(12); ?>
@foreach($prayers as $value)
   @if( $value['imgcat'] == '0') 
<div class="col-lg-4 col-sm-6">
              <div class="boxes_container alert alert-dismissable {{ $value['colors'] }}">
               <a href="{{ URL::to('/prayer/'. $value['id'])}}">  <h4> <?php if( $value['anonynmous'] == 0){ echo  'Anonynmous'; }else{ echo $value->users->username;  }?> </h4>
        <p  class="boxes" >{{ $value['message'] }}</p>
               <div class="text-right"><strong>Count: {{ $value['prayercount'] }}</strong></div>               
               </a>
              </div>
          </div> 
   @else
<div class=" col-lg-4 col-sm-6">
    
{{HTML::image('assets/img/'.$value['featimg'],'image',array('class'=>'box '))}}
</div>  
  @endif  
@endforeach




@else





<?php  $prayers = Prayer::with('users')->orderBy('id', 'DESC')->paginate(11); ?>
<?php // $prayers = Prayer::orderBy('id', 'DESC')->paginate(11); ?>
@foreach($prayers as $value)
   @if( $value['imgcat'] == 0) 
<div class="col-lg-4 col-sm-6">
              <div class="boxes_container alert alert-dismissable {{ $value['colors'] }}">
               <a href="{{ URL::to('/prayer/'. $value['id'])}}">  <h4> <?php if( $value['anonynmous'] == 0){ echo  'Anonynmous'; }else{  echo $value->users->username;  }?> </h4>
        <p  class="boxes" >{{ $value['message'] }}</p>
<!--              <div style="border:1px white solid;width: 150px" class="pull-left"><strong>Click to pray</strong></div> -->
              <div   class="pull-right"><strong>Count:  {{ $value['prayercount'] }}</strong></div>               
               <div class="clearfix"></div>
               </a>
              </div>
          </div> 
   @else
<div class=" col-lg-4 col-sm-6">
{{HTML::image('assets/img/'.$value['featimg'],'image',array('class'=>'box '))}}
</div>  
  @endif  
@endforeach




@endif  <!--     final end if for specific-->



<div class=" col-lg-12 col-sm-6 ">
{{ $prayers->links() }}    
</div> 


<?php
//family
echo"<br />";
   
//               $lastprayer = Prayer::orderBy('id', 'DESC')->get(array('id', 'featimg', 'colors'))->first();
// 
//               echo $lastprayer['id'];

//
//               $lastprayer = Prayer::with('users')->get();
// 
//              dd($lastprayer);



?>

@stop





































<!--modal-->
<!--modal-->
<!--modal-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><label>Post as Anonynmous</label></h4>
      </div>
        
         {{ Form::open( array('url' => '','id'=>'form-home') )}}
<!--        <form id="form-home" action=""  >-->
      <div class="modal-body">
       
  
           <div class="form-group">
                  <label class="control-label" for="inputLarge">Category:</label>
                  <select name="cat" id="cat" class="form-control" >
                  <option value="0">Select</option>      
                <?php
                $drop = new MyCode();
                $count = count($drop::$menuOptions[1]); 
                ?> 
                 <?php for($i=0;$i<$count;$i++) :    ?>
                <option value=" <?php  echo $drop::$menuOptions[1][$i]['name'] ; ?>"> <?php  echo $drop::$menuOptions[1][$i]['title'] ;  ?></option>        
                <?php endfor;    ?>         
                 </select>
                </div>   
           <div class="form-group">
                  <label class="control-label" for="inputLarge">Enter Prayer:</label>
                  <textarea class="form-control " maxlength="200"  name="message" id="message" type="text"  onkeyup="countChars('message','charcount');" onkeydown="countChars('message','charcount');" onmouseout="countChars('message','charcount');"></textarea>
                  <span class="countlabel" ><span id="charcount">0</span> (200 Max) </span>
          
            <div class="form-group">
                
                
                
                <label class="control-label" for="inputLarge">Enter Code </label><small>  (Not case sensitive)</small> <b>:</b><br />
                {{  HTML::image(Captcha::img(), 'Captcha image') }}
                <input name="captcha" id="captcha"  class="form-control-small" type="text"> &nbsp;              
                <span>    {{ HTML::link('/',' refresh page',array('class'=>'fa fa-refresh'))}}  </span>  
            </div>
       
 @if(Auth::check())         
<div class="form-group">
    
    
    <div >{{ Form::label('Anonynmous', 'Post Prayer As:') }}   </div>
    
{{ Form::label('Anonynmous', 'Anonynmous') }}
{{ Form::radio('name',0, false); }}

{{ Form::label('username',$users->username) }}
{{ Form::radio('name',1, true); }}


</div>

@endif







          <table class="table">
            <tr>
                <td width='10%'> <button  id="sub_log" type="submit" class="btn btn-success">Send!</button></td>
                <td width='10%'><div style="color:black"  class="load_run"><i class="fa fa-spin fa-3x fa-cog"></i></div></td>
                <td width='80%'></td>
            </tr>  
            
        </table>
        
        
        
            
       
<div id="saysth">
<div class="text-center alert alert-danger">
<span class="fa-stack fa-lg">
  <i class="fa fa-circle-o fa-stack-2x"></i>
  <i class="fa fa-times fa-stack-1x"></i>
</span>
    &nbsp;<strong><span id="talk"></span> </strong>   
</div>  
</div>
        

        
              
              
              
              
              
              
       @if(!Auth::check())         
    
        {{ HTML::link('/login',' Signin to post prayer ',array('class'=>'btn btn-primary btn-block fa fa-sign-in'))}}  
                {{ HTML::link('/register',' New ? Register ',array('class'=>'btn btn-primary btn-block fa fa-book'))}}  
                        {{ HTML::link('/registration-benefit',' Registration Benefits ',array('class'=>'btn btn-primary btn-block fa fa-gift'))}}  
      @endif
<!--  <a  class="btn btn-primary btn-block" href="{{ asset('/login')}}"> Signin to post prayer &nbsp; <i class="fa fa-sign-in"></i></a>            
  <a  class="btn btn-primary btn-block" href="#"> New ? Register &nbsp;<i class="fa fa-book"></i></a>             
 <a  class="btn btn-primary btn-block" href="#">Registration Benefits &nbsp;<i class="fa fa-gift"></i></a>             -->


      </div>
      <div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
 
      </div>
        {{ Form::close()}} 
    </div>
  </div>
</div>

      </div>
<!--modal-->
<!--modal-->
<!--modal-->