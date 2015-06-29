<?php

class UserController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    
    
    
        public function __construct()
    {
            // this is where i did my redirecting
          $this->beforeFilter('auth'); 
        
//        $this->beforeFilter('auth', array('except' => 'getLogin'));
//
        $this->beforeFilter('csrf', array('on' => 'post'));
//
//        $this->afterFilter('log', array('only' =>
//                            array('fooAction', 'barAction')));
    }
    
    
    
        public function showIndex()
	{
        return View::make('user-area.index')->with('cat','user-area');
	}
    

        public function CreateShoutout()
        {
        //
        return View::make('user-area.create-shoutout')->with('cat','create-shoutout'); 
        }
        
        public function DoShoutout()
        {

        if(Auth::check()){
        $users = Auth::user();
        }
        $shout = user::find($users->id)->shouts()->insert(array(
        'message'=> Input::get('testimony'),
        'user_id'=>$users->id
        ));

        return Redirect::to('user-area')->with('success-message','Testimony has been posted successfully!') ;  


        }        
        
         public function  EditShoutout($id)
        {

        $row = Shout::find($id);
        return View::make('user-area.edit-shoutout')->with('specshout',$row) ; 

        }        
        
                public function Updateshoutout($id)
	{
		//
            $news = Shout::find($id);
            
            
            $rules =   array( 
            'message'=>  'required'        
            ) ;   

            $credentials = Input::all();

            
            
        $v =    Shout::validate($credentials,$rules);
        if($v !== true){
        return Redirect::to('user-area/'.$id.'/edit-shoutout')->withErrors($v)->withInput();    
        }
        
        $users_upt = Shout::find($id);
        $users_upt->message = Input::get('message');
        $users_upt->save();
        return Redirect::to('user-area')->with('success-message', 'Testimony has been updated successfully');
         
	}
          
        
      	public function destroyshoutout($id)
	{
        $users = Shout::find($id);
        $users->delete();
        
        return Redirect::to('user-area')->with('success-message', "Testimony has been updated successfully");
   
        
        
	}      
        
        
      	public function  ChangePassword()
	{
        return View::make('user-area.change-password')->with('cat','change-password');
	}   
       

        
        public function  DoChangePassword()
        {
            
            $user =User::find(Auth::user()->id);
            
            $rules =   array( 
            'password'=>  'required|Unique:users' ,
            'new-password'=>  'required|min:6' ,
            'confirm-new-password'=>  'required|same:new-password'                 
            ) ;   

           // $credentials = Input::all(); 
            
    $credentials =array(

    'password'  => Input::get('password'),
    'new-password'  =>Input::get('new-password'),
    'confirm-new-password'  => Input::get('confirm-new-password'), 

    );           
          
 
 
 
       
         //   dd($credentials);
            
    
        $v = User::validate($credentials,$rules);
        if($v !== true){
        return Redirect::to('user-area/change-password')->withErrors($v)->withInput();    
        }  else {
        
            
            if(Hash::check(Input::get('password'), $user->password)){
                
                $user->password = Hash::make(Input::get('new-password'));
                $user->save();
                
           return Redirect::to('user-area/change-password')->with('success-message', "Password has been edited successfully");
         
                
            }
            
            
        return Redirect::to('user-area/change-password')->with('message', "Current password is incorrect");
            
            
        }         
        }       
        
        
        
        
      	public function  ViewPrayers()
	{
        return View::make('user-area.view-prayers')->with('cat','view-prayers');
	}  
        
           public function  EditPrayers($id)
        {

        $row = Prayer::find($id);
        return View::make('user-area.edit-prayers')->with('specshout',$row) ; 

        }        
        
                public function UpdatePrayers($id)
	{
		//
            $news = Prayer::find($id);
            
            
            $rules =   array( 
            'message'=>  'required'        
            ) ;   

            $credentials = Input::all();

            
            
        $v =   Prayer::validate($credentials,$rules);
        if($v !== true){
        return Redirect::to('user-area/view-prayers/'.$id.'/edit-prayers')->withErrors($v)->withInput();    
        }
        
        $users_upt = Prayer::find($id);
        $users_upt->message = Input::get('message');
        $users_upt->save();
        return Redirect::to('user-area/view-prayers')->with('success-message', 'Prayer post has been updated successfully');
         
	}
          
        
      	public function destroyPrayers($id)
	{
        $users = Prayer::find($id);
        $users->delete();
        
        return Redirect::to('user-area/view-prayers')->with('success-message', "Prayer post has been deleted successfully");
   
        
        
	} 
        
        
        
        
        
            
            public function  ViewComments()
            {
            return View::make('user-area.view-comments')->with('cat','view-comments');
            }        



            public function  EditComments($id)
            {

            $row = Comment::find($id);
            return View::make('user-area.edit-comments')->with('specshout',$row) ; 

            }        

            public function UpdateComments($id)
            {
            //
            $news = Comment::find($id);


            $rules =   array( 
            'message'=>  'required'        
            ) ;   

            $credentials = Input::all();



            $v =   Comment::validate($credentials,$rules);
            if($v !== true){
            return Redirect::to('user-area/view-comments/'.$id.'/edit-comments')->withErrors($v)->withInput();    
            }

            $users_upt = Comment::find($id);
            $users_upt->message = Input::get('message');
            $users_upt->save();
            return Redirect::to('user-area/view-comments')->with('success-message', 'Your Comment has been updated successfully');

            }


            public function destroyComments($id)
            {
            $users = Comment::find($id);
            $users->delete();

            return Redirect::to('user-area/view-comments')->with('success-message', "Your Comment has been deleted successfully");



            }             
            
            
            
            
            
                   
        
        
        
        
        
        
        
        
        
        
        
        


}
