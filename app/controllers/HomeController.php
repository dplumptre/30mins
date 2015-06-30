<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
    
    
          public function __construct()
    {
              
//     $this->beforeFilter('csrf', array('on' => 'post'));
     
     
  $this->beforeFilter('csrf', array('on' => array('post', 'delete', 'put')));    
    }
    
      
    
     public static $activation = 1;    //should be zero  so as to activate to 1 in email
     
     public static $access = 1;    
     
  	public function showAbout()
	{
                                   
          return View::make('home.about-us');
	}   
     

	public function showWelcome()
	{
            
//        $users = User::create(array(
//            
//        'email'=> 'dee@aol.com',            
//        'username'=> 'Anonynmous',  
//        'password'=> Hash::make('Pa33word1#'),            
//        'activation'=> 1,  
//        'access'=> 1, 
//
//         ));
//             
            
//     User::find(2)->shouts()->insert(array(
//    
//  
//        'message'     =>  'praise the lord, the lord has added to our family a baby boy',       
//        'user_id'     =>  2
//
//       
//          ));
//               
            
//  $mycode = new MyCode(); 
//  $color = $mycode->get_item_from_array($mycode::$common_arrays['colors']);                     
//  $id = (Auth::guest())? 1 : Auth::user()->id;           
//  $prayers = Prayer::find(6)->users;        
//  $prayers = User::find(1)->prayers()->get();             
       
          // dd($prayers) ; 
            
            
    
          
          
         return View::make('home.index');
	}

        
        
        
 public function showPrayerpost(){
        
//         include_once public_path(). '/securimage/securimage.php';
         


            $messages = array(
            'captcha.captcha'=> 'Code mismatch'             

            );

        $credentials = array(
        'Category'=> Input::get('cat')
        ,'Prayer'=>Input::get('message')                
        ,'captcha'=>Input::get('captcha')   
        ,'name'=>Input::get('name')  

        );


  
        $rules =   array( 
        'Category'=>  'required|not_in:0',
        'Prayer'=> 'required',            
        'captcha' => 'required|captcha'      

        ) ;  
        
        


        
        
//        
//                    if(Request::ajax())
//            {
//                return Input::get('cat').'post:'.Input::get('message').'caatcha'.Input::get('captcha') ;
//            }
        
        
        
        
        
        $v = Validator::make($credentials, $rules);
        
  
        
        
        if (  $v->fails())
        {
 	
            if(Request::ajax())
            {

                    $response = array(
                    'response'  =>  'error',
                    'errors'    =>  $v->errors()->toArray()
                    ); 
                
                    
                    foreach ($response['errors'] as  $value) {
                    return $value;   
                    }

            }  	   

        }else{
      
            
$lastprayer = Prayer::orderBy('id', 'DESC')->get(array('id', 'featimg', 'colors'))->first();
// i am carring {id, featimg and colors with me} the latest ones in the row        

//   $lastprayerId = Prayer::orderBy('id', 'DESC')->pluck('id');
//getting the lastid


 
       
          
                $lastid = (empty($lastprayer['id']) OR $lastprayer['id']== NULL)? 1: $lastprayer['id'];
                $lastFeatimg = (empty($lastprayer['featimg']) OR $lastprayer['featimg']== NULL)? 'imgtwo.jpg': $lastprayer['featimg'];
                
                
                
                
                
                
    $mycode = new MyCode(); 
    $cat = (Input::get('cat') == "")? 0 : trim(Input::get('cat'));    
    $message = (Input::get('message') == "")? 0 : trim(Input::get('message'));    
    $prayercount = 0;  
    $imgcat = 0;      
    $featueredimage = $lastFeatimg ;
    $color = $mycode->get_item_from_array($mycode::$common_arrays['colors']);
    $anonynmous = (Input::get('name') == "")? 0 : trim(Input::get('name'));
    $person = (Input::get('name') == 0 )? 'anonoynmous' : trim(Input::get('name'));

//    $featimage = $mycode->get_item_from_array($mycode::$common_arrays['feat_images']);            
    $id = (Auth::guest())? 1 : Auth::user()->id;     
    $time = date('Y-m-d H:i:s', time());      
    
    
$emailContent =array(
        'cat'         =>  $cat, 
        'message'     =>  $message,  
        'person'      =>  $person

);
     
    
 $user_event = User::find($id)->prayers()->insert(array(
    
        'cat'         =>  $cat, 
        'message'     =>  $message,       
        'prayercount' =>  $prayercount,       
        'featimg'     =>  $featueredimage,  
        'colors'      =>  $color,     
        'imgcat'      =>  $imgcat,
        'anonynmous'  =>  $anonynmous,
        'created_at'  =>  $time,
        'user_id'     =>  $id

       
          ));
    
    

 
 

 
        if($mycode->mul($lastid)){
        ////do fire 
        $response = Event::fire('send.image', $lastprayer);          
        }   

  
        
        
        
  $emails = Specialemail::orderBy('id', 'DESC')->get();       
        
//$emails = [
//'ladipobabatunde@yahoo.com', 
//'raladesuru@yahoo.com',
//'kassim_rahman@yahoo.com',
//'just30minutes@tfolc.org',
//'deoladefunke@gmail.com',
//'megbopeayo@yahoo.com',
//'abimbolaoyelola@yahoo.com',
//'tanigee2@yahoo.com'    
//           ];




foreach($emails as $e){
Mail::send('mail.messageprayer', array('group'=>Input::get('cat'),'prayer'=>Input::get('message') ),  function($message) use ($e)
{
$message->to($e->email)->subject('Latest Prayer Post');  
});
} 


        
        
        
        // Event::fire('send.emailToSomePipo', $emailContent); 
                
        Session::flash('success-message','Your prayer request has been posted! ');

        echo"<script type='text/javascript'>
        window.location='".URL::to('/')."';
        </script>"; 
            
        }   
        
        
        
        
        
        
        
        
        
}
   
   

     	public function showReset()
        {
         return View::make('home.password-reset');           
        }


     	public function DoReset()
	{
            
         $credentials = array(
        'email'=> Input::get('email')              
        ,'captcha'=>Input::get('captcha')

        );


  
        $rules =   array( 
        'email'=>  'required|email|exists:users',          
        'captcha' => 'required|captcha'      
        ) ;  
  
        
        
        $v = Validator::make($credentials, $rules);
        
  
        
        
        if (  $v->fails())
        {
        return Redirect::to('password-reset')->withErrors($v )->withInput();      
        }         
        
        $mycode = new MyCode();
        
        $pw = $mycode->createRandomPassword();
        
        $users_upt = User::where('email','=',Input::get('email'))->first();
        $users_upt->password =  Hash::make($pw);
        $users_upt->save();
        
        $emailContent =array(
        'username'         =>  $users_upt->username, 
        'password'         =>  $pw ,  
        'email'            =>  $users_upt->email

        );
        
            
        
       // $response1 = Event::fire('send.emailReset', $emailContent); 
    
        
   Mail::send('mail.message-reset', array('username'=> $users_upt->username,'password'=> $pw ,'email'=> $users_upt->email ), function($message)
{
    $message->to(Input::get('email'),'Just30mins')->subject('Password Reset');
});     
        
        
        
        
        return Redirect::to('/password-reset')->with('success-message',' Success check email for your new password');
                
	} 
        
        
     	public function showsShoutofpraises()
	{
        return View::make('home.shout-of-praise');
	}         
        
     	public function showsSpecShoutofpraises($id)
	{
        $therows = Shout::with('users')->where('id','=',$id)->first();    
        return View::make('home.shout-of-praise')->with('therows',$therows);
	}    
        
        
      	public function showLive()
	{
        return View::make('home.live');
	}         
        
    	public function showMedia()
	{
        return View::make('home.media');
	}          
        
      	public function showsSpecmedia($id)
	{
        $therows = Media::find($id);    
        return View::make('home.media')->with('therows',$therows);
	}         
        
    	public function showregbenefit()
	{
        return View::make('home.registration-benefit');
	}           
        
        
    	public function showOneprayer($value)
	{
         
        return View::make('home.prayer')->with('did',$value);
        
	}          
        

    	public function DoComment($value)
	{
         
        $credentials = array(
        'post'=> Input::get('post')         
        );   
         
        $rules =   array(         
        'post' => 'required'      
        ) ;           
         
   
        $v = Validator::make($credentials, $rules);
        
        if (  $v->fails())
        {
        return Redirect::to('prayer/'.$value)->withErrors($v )->withInput();      
        }  
        
        $id = Auth::user()->id;
        
        
        $comments = User::find($id)->comments()->insert(array( 
            'message'=> Input::get('post'),
            'user_id'=> $id,
            'prayer_id'=> $value
        ));
        
        
        
        //prayer with id of $did
        $prayers = Prayer::find($value);


        //this will show user with the prayer id of $did
        $postersinfo= Prayer::find($value)->users()->first();
        
        
        
       //echo $postersinfo
        
       // $comments = Comment::with('users')->where('prayer_id','=',)->start();
        
//        $post = $prayers->message 
//        $did = $did
//        $username = $postersinfo->username
//        $postersinfo->email
            
        
      //send email to the owner of the post  
      Mail::send('mail.message-latestcomment', array(  
          'post' =>$prayers->message,
          'username'=> $postersinfo->username,
          'did'=> $value ,
          'email'=> $postersinfo->email ), function($message)use ($postersinfo)
{
    $message->to( $postersinfo->email ,'Just30mins')->subject('Recent Comment on your post');
});     
     
        
        
        
        return Redirect::to('prayer/'.$value)->with('success-message','Successfully posted');
            
	}          
        
        
        
        
        
        
        
        
        
        
   	public function showSpecificprayer($value)
	{
            
//        $prayer = Prayer::where('cat','=',$value)->paginate(3);    
            
        return View::make('home.index')->with('specificPrayer',$value);
        
	}           
        
        
        
        
   	public function showRegister()
	{
            
        return View::make('home.register');
	}     
        
   	public function Doregisteration()
	{
            
        $credentials = Input::all();
        
        


        
        $rules =   array( 
        //unique to users the name of the table
        'username'=> 'required|alpha_spaces|min:4|Unique:users',  
        'password'=> 'required|min:6',
        'password_confirm'=> 'required|same:password',            
        'email'=> 'required|email|Unique:users',        
) ;  
        
        $messages = array(
            
            'alpha_spaces' => 'Your username cannot contain space(s)'
            
            );
        
        
       // $v = Validator::make($credentials, $rules, $messages);
        
      $v = User::regValidate($credentials,$rules,$messages);
      
      //  $v = User::validate($credentials,$rules,$messages);
        
        
        
        
        
        
        if($v !== true){
        return Redirect::to('/register')->withErrors($v )->withInput();    
        }
            
        

        
        
        //insert into users
        
        $activation = md5(uniqid(rand(), true));
         
        $users = User::create(array(
           
        'email'=> Input::get('email'),            
        'username'=> Input::get('username'),  
        'password'=> Hash::make(Input::get('password')),            
        'activation'=> $activation,  
        'access'=> static::$access   

         ));

	
        
        
Mail::send('mail.message', array('name'=> Input::get('username'),'password'=> Input::get('password'),'activation'=>$activation), function($message)
{
    $message->to(Input::get('email'),'Just30mins')->subject('Welcome to Just30mins');
});
         
  





 return Redirect::to('/login')->with('success-message','Registration Successful check email to activate your account');
                
 }          
        
        
        
        
            public function showActivate($value)
            {
         
                

                
                
           
                $user = User::where('activation','=',$value)->first();


                if($user){
                    
                $user->activation = 1;
                $user->save();

                return Redirect::to('/login')->with('success-message','You have Successfully activated your account, please login');
                }else{
                return Redirect::to('/login')->with('message','Activation unsuccessful please contact Admin');
                }    
            
            
            }  
        
        
        
        
                 public function showCron()
            {
         
                $file = public_path(). "/useremails.txt"; 
           
                $user = User::where('activation','=',1)->get(array('email'));


                
               
                
            $out = array();
            foreach ($user as $data)
            {
            $out[]= $data['email'];
            }


            $info = implode(',', $out);
            echo '<pre>';
             echo $info;
            echo '</pre>';

            file_put_contents($file, $info); 

            Mail::send('mail.messageuser',array('name'=> 'team'), function($message)
            {
            $message->to('dplumptre@yahoo.com')->subject('latest activated users');

            $message->attach(public_path(). "/useremails.txt");
            });          

        
        
      
  
            return View::make('home.getemail');
  
        
        
        
            
            }    
        
        
        
        
        
        
        
        
        
        
        
        











}