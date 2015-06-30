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



  @if(Session::has('message'))
<div class="text-center alert alert-success">
<span class="fa-stack fa-lg">
  <i class="fa fa-circle-o fa-stack-2x"></i>
  <i class="fa fa-check fa-stack-1x"></i>
</span>
    &nbsp;<strong>{{ Session::get('message')}} ! </strong>   
</div>
@endif  




@section('content')
            


@if(isset($did))
<?php  
//prayer with id of $did
$prayers = Prayer::find($did);

//increment the counts
$finalCount = $prayers->prayercount + 1;
$prayers->prayercount = $finalCount;
$prayers->save();



//this will show user with the prayer id of $did
//$postersinfo= Prayer::find($did)->users()->first();

?>

<div class="  col-lg-12 ">
              <div class="boxes_container alert alert-dismissable {{ $prayers->colors }}">
               <a href="#">  <h4> <?php if( $prayers->anonynmous == 0){ echo  'Anonynmous'; }else{ $user = User::where('id','=',$prayers->user_id )->pluck('username'); echo $user;  }?> </h4>
        <p  class="boxes" >{{ $prayers->message }}</p>
               <div class="text-right"><strong>count: {{ $prayers->prayercount }}</strong></div>               
               </a>
              </div>
    
    

<?php  $comments = Comment::with('users')->where('prayer_id','=',$did)->paginate(6); ?>    
@foreach($comments as $comment)
<h4 class="text-yellow">{{ $comment->users->username }}</h4>
<p>{{ $comment->message }}</p>
@endforeach
    
 

<div>
{{ $comments->links() }}    
</div> 

<?php  //echo $postersinfo->email; ?><br />
<?php // dd($postersinfo); ?>
<!--
check if the person is
logged in then also if the person is an admin
-->

@if(Auth::check() && $users->access > 0)

  @if(Session::has('success-message'))
<div class="text-center alert alert-success">
<span class="fa-stack fa-lg">
  <i class="fa fa-circle-o fa-stack-2x"></i>
  <i class="fa fa-check fa-stack-1x"></i>
</span>
    &nbsp;<strong>{{ Session::get('success-message')}} ! </strong>   
</div>
@endif  






    {{ Form::open( array('url' => '/prayer/'.$did) )}}

    

        {{ Form::label( 'post','Post Comment')}}
        {{ Form::textarea( 'post','',array('class' => 'form-control','placeholder'=>'Post Comment','size' => '10x3','maxlength'=>'200' ) ) }} 
        {{ $errors->first('post', "<i><p class='text-info'>:message </p></i>");}}        

            

        <div class="margin-top-10">
            {{ Form::submit( 'Post',array('class' =>'btn  btn-warning'))}}  

        </div> 

        {{ Form::close()}} 

@endif
    
      
          </div> 

@endif  <!--     final end if for specific-->






<?php
//family
//echo"<br />";
//   
//               $lastprayer = Prayer::orderBy('id', 'DESC')->get(array('id', 'featimg', 'colors'))->first();
// 
//               echo $lastprayer['id'];
?>

@stop






