<?php  $users = Auth::user(); // dd($users);?>
@extends('layout.masterHome')

@section('title')
About Us
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
    <h2>About Us</h2> 
<p class="text-justify">In the 19th century, Korea was an isolated and primitive land riddled with fear and superstition. But in 1907, a small band of missionaries decided to redirect its course. Following news of the Welsh revival, they decided to come together and pray for Korea. They agreed to meet together to pray, daily, at noon. But at the end of one month, “nothing happened.” One brother suggested the prayer meetings be discontinued. “Let us each pray at home as we find it convenient,” he said. The others insisted they increased the time spent in prayer instead. So prayers continued, fervently, for another four months. Then a revival broke out. </p>    
<p class="text-justify">
Church services here and there were interrupted by people weeping and confessing their sins. Multitudes flocked to the churches out of curiosity. Some came to mock, but fear laid hold of them, and they stayed to pray. Amongst the “curious” was a brigand chief, the leader of a band of robbers. He was convicted and converted. He went straight off to the magistrate and gave himself up. “You have no accuser,” said the astonished official, “yet you accuse yourself! We have no law in Korea to meet your case.” So he dismissed him.
</p>
<p class="text-justify">
By 1912 there were approximately 300,000 Korean church members in a total population of 12 million. A small band of praying Christians had changed a once primitive land for good. Korea rode on the crest of this revival, surviving Japanese domination, and civil war, to become one of the most orderly and prosperous places on earth. 
</p> 
<p class="text-justify">
What happened in Korea can happen in your country, family, business or ministry. In February 2012, God impressed it upon the heart of Pastor Taiwo Odukoya, Senior Pastor of The Fountain of Life Church, to sound an alarm for prayer. He urged Christians across the country to rise up in prayer for Nigeria at the consensus time of 12midnight to 12:30am wherever they were. This sparked off what has today become the Just 30 Minutes initiative—a non-denominational movement tasking Christians everywhere to commit to 30 minutes of prayer, from 12midnight to 12:30am, for Nigeria. Why 12:00 - 12:30am? Because there is power in unity; in thousands to millions of God's people lifting up their voices to Him in prayer for their country and for one another; and power in us doing it at a time when there is little distraction. 
</p> 
<p class="text-justify">
We believe God is moving behind the scenes on behalf of Nigeria, even as He is at work in our individual lives. It is therefore no wonder that the resulting testimonies have been outstanding. God will do great things for Nigeria and in the lives of His people. When the history of Nigeria is being recounted, it will be remembered that you and I stood in the gap for our country, at a critical moment, and turned her course. Let us remain in fervent prayer upon our watch, from 12:00 - 12:30am. God will intervene for Nigeria. God will intervene for you. 
</p> 
</div>

@stop	