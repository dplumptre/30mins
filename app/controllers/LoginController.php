<?php

class LoginController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    
    public static $activation = 1;
    
    
    public function getIndex()
    {
    return View::make('home.login');
    }

    public function postIndex()
    {
        //

        
            $credentials = array(
             'username'=> Input::get('username')
            ,'password'=>Input::get('password')
            ,'activation'=> static::$activation
            );
        
        
        if( Auth::attempt($credentials) )   {
        $user_row = Auth::user();
        
       
        
        switch ($user_row->access){

        case 1:
        return Redirect::to('/')->with('success-message', 'You are now logged in!');
            break;
        case 2:
        return Redirect::to('admin-area')->with('success-message', 'You are now logged in!');            
            break;
            
            
        }
        
        
        


        
        //return 'you are officially inside';
        
        } 

      return Redirect::to('login')
              ->with('message', 'username or Password incorrect <br />First time? check email for activation')
              ->withInput();

        }

        public function anyLogin()
        {
            //
        }
        

//     public function getLogout()
//    {
//  Auth::logout() ;
//  return Redirect::to('login')->with('message','you are now logged out');
//    }       
        
        
}
