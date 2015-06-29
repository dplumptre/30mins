<?php

/*
|--------------------------------------------------------------------------
| MY EVENTS
|--------------------------------------------------------------------------
|  ADMIN : dplumptre@yahoo.com
|
*/



Event::listen('send.image', function( $user_event){
    
    
    
    $lastcolor = (empty($user_event['colors']) OR $user_event['colors']== NULL)? "alert-info": $user_event['colors'];             



    

    $mycode = new MyCode(); 
    $cat = 0;   
    $message = 0;  
    $prayercount = 0;  
    $color =  $lastcolor;
    $imgcat = 1; 
    $anonynmous = 0; 
    $featimage = $mycode->get_item_from_array($mycode::$common_arrays['feat_images']);       
    $id=1;
    
    
      User::find($id)->prayers()->insert(array(
    
        'cat'         =>  $cat, 
        'message'     =>  $message,       
        'prayercount' =>  $prayercount, 
        'imgcat'      =>  $imgcat,
        'featimg'     =>  $featimage,    
        'colors'      =>  $color,
        'anonynmous'  =>  $anonynmous,
        'user_id'     =>  $id
             
             
             
              ));

    
    
    
    
} );









Event::listen('send.emailToSomePipo', function( $emailContent){
    
    
   
//Mail::send('mail.message-post', $emailContent,function($message)
//{
////    $message->from('us@example.com', 'Laravel');
//
//    $message->to('dplumptre@webfusionng.com')->cc('dplumptre@hotmail.com');
//    $message->cc('dplumptre@gmail.com');
//    $message->subject('Lastest prayer post @ Just30mins');
//});

Mail::send('mail.message-post', $emailContent, function($message)
{
    $message->to('dplumptre@webfusionng.com','Just30mins')->subject('Lastest prayer post @ Just30mins');
});
         
  
Mail::send('mail.message-post', $emailContent, function($message)
{
    $message->to('dplumptre@gmail.com','Just30mins')->subject('Lastest prayer post @ Just30mins');
});


Mail::send('mail.message-post', $emailContent, function($message)
{
    $message->to('dplumptre@hotmail.com','Just30mins')->subject('Lastest prayer post @ Just30mins');
});

    
} );




Event::listen('send.emailReset', function( $emailContent){
    
    
Mail::send('mail.message-reset', $emailContent, function($message)
{
    $message->to($emailContent['email'],'Just30mins')
            ->subject('Password Reset');
});
        
    
    
} );