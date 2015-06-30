<?php

class AdminController extends \BaseController {

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
        //$this->beforeFilter('csrf', array('on' => 'post'));
            $this->beforeFilter('csrf', ['on' => ['post', 'put', 'patch', 'delete']]);
//
//        $this->afterFilter('log', array('only' =>
//                            array('fooAction', 'barAction')));
    }
    
    
    
            public function showIndex()
            {    
                
                

                
                
                
                
                
                
            return View::make('admin-area.index')->with('cat','admin-area');
            }
            
            
            
            
              public function SpecialEmail()
            {    
                  
            $row = Specialemail::orderBy('id', 'DESC')->get();
                
            return View::make('admin-area.special-email')
                                               ->with('row',$row)
                                               ->with('cat','special-email');
            }          
            
            
            
               public function CreateEmail()
            {    
                  
            $row = Specialemail::orderBy('id', 'DESC')->get();
                
            return View::make('admin-area.create-special-email')
                                               ->with('row',$row)
                                               ->with('cat','create-special-email');
            }            
            
            
            
            public function PostEmail()
            {    

                
            $rules = array(
                
                'email'=>'email|required|unique:specialemails'
                
            );    

            $credentials = Input::all();

            $v =   Specialemail::validate($credentials,$rules);
            if($v !== true){
            return Redirect::to('admin-area/create-special-email')->withErrors($v)->withInput();    
            }  
            
                $data = Specialemail::create(array(

                'email' => Input::get('email')

                ))  ;
                
            return Redirect::to('admin-area/special-email')
                                       
                                       ->with('cat','create-special-email');
            }             
            
            
                    public function destroySpecialEmail($id)
            {
            $p = Specialemail::find($id);    
            $p->delete();

            return Redirect::to('admin-area/special-email')->with('success-message', "email has been deleted successfully");

            }   
            
            
            public function doAccess()
            {

                if(Request::ajax())
                {
                //return Input::get('id').'access:'.Input::get('access') ;

                $id= Input::get('id');
                $access = Input::get('access');

                $user = User::find($id);

                $user->access = $access;
                $user->save();

                Session::flash('success-message','User has been successfully assigned ');     

                //        reload the page  
                echo"<script type='text/javascript'>
                window.location='".URL::to('/admin-area')."';
                </script>"; 

                }   
            }

            public function DoAjaxMedia()
            {  

                if(Request::ajax())
                {
                //return Input::get('id').'access:'.Input::get('access') ;

                $id   = Input::get('id');
                $live = Input::get('access');

                $user = Media::find($id);

                $user->live = $live;
                $user->save();

                Session::flash('success-message','Media has been successfully assigned');     

                //        reload the page  
                echo"<script type='text/javascript'>
                window.location='".URL::to('/admin-area/media')."';
                </script>"; 

                }  

            }           


       public function destroyUsers($id)
            {
            $p = Prayer::where('user_id',"=",$id)->delete();
 
            $s = Shout::where('user_id',"=",$id)->delete();  
            
            $s = Comment::where('user_id',"=",$id)->delete();               
            
            $users = User::find($id);
            $users->delete();

            return Redirect::to('admin-area')->with('success-message', "User has been deleted successfully");

            } 
           
            
            
            
         
            
            


            public function  ViewPrayers()
            {
            return View::make('admin-area.view-prayers')->with('cat','view-prayers');
            }        



            public function  EditPrayers($id)
            {

            $row = Prayer::find($id);
            return View::make('admin-area.edit-prayers')->with('specshout',$row) ; 

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
            return Redirect::to('admin-area/view-prayers/'.$id.'/edit-prayers')->withErrors($v)->withInput();    
            }

            $users_upt = Prayer::find($id);
            $users_upt->message = Input::get('message');
            $users_upt->save();
            return Redirect::to('admin-area/view-prayers')->with('success-message', 'Prayer post has been updated successfully');

            }


            public function destroyPrayers($id)
            {
            $users = Prayer::find($id);
            $users->delete();

            return Redirect::to('admin-area/view-prayers')->with('success-message', "Prayer post has been deleted successfully");



            } 

            
            
 
            
            
            
            
            public function  ViewComments()
            {
            return View::make('admin-area.view-comments')->with('cat','view-comments');
            }        



            public function  EditComments($id)
            {

            $row = Comment::find($id);
            return View::make('admin-area.edit-comments')->with('specshout',$row) ; 

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
            return Redirect::to('admin-area/view-comments/'.$id.'/edit-comments')->withErrors($v)->withInput();    
            }

            $users_upt = Comment::find($id);
            $users_upt->message = Input::get('message');
            $users_upt->save();
            return Redirect::to('admin-area/view-comments')->with('success-message', 'Your Comment has been updated successfully');

            }


            public function destroyComments($id)
            {
            $users = Comment::find($id);
            $users->delete();

            return Redirect::to('admin-area/view-comments')->with('success-message', "Your Comment has been deleted successfully");



            }             
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            public function  ChangePassword()
            {
            return View::make('admin-area.change-password');
            }   



//            public function  DoChangePassword()
//            {
//
//            $user =User::find(Auth::user()->id);
//
//            $rules =   array( 
//            'password'=>  'required|Unique:users' ,
//            'new-password'=>  'required|min:6' ,
//            'confirm-new-password'=>  'required|same:new-password'                 
//            ) ;   
//
//            // $credentials = Input::all(); 
//
//            $credentials =array(
//
//            'password'  => Input::get('password'),
//            'new-password'  =>Input::get('new-password'),
//            'confirm-new-password'  => Input::get('confirm-new-password'), 
//
//            );           
//
//
//        
//        
//        
//        
//        
//
//            }



            
            
            
             public function showLive()
            {    
            return View::make('admin-area.live');
            }            
            
    
            public function CreateMedia()
            {    
                
            return View::make('admin-area.create-media');
            }  
            
            public function DoMedia()
            {    

                
            $rules =   array( 
            'title'=>  'required' ,
            'date'=>  'required',
            'mediacontent'=>  'required'                 
            ) ;      
                
           $credentials = Input::all(); 

  

                $v = Media::validate($credentials,$rules);
                if($v !== true){
                return Redirect::to('admin-area/create-media')->withErrors($v)->withInput();    
                }     

                $time = date('Y-m-d H:i:s', time());      
                $id = Auth::user()->id;

                $user_event = user::find($id)->medias()->insert(array(

                'title'         =>  Input::get('title'), 
                'mediacontent'  =>  Input::get('mediacontent'),     
                'thedate'       =>  Input::get('date'), 
                'live'          =>  0,      
                'user_id'       =>  $id
                ));           
            

       return Redirect::to('admin-area/media')->with('success-message','Media has been posted successfully') ;  
       
            
            
            
            
            
            
            }                 
            
            
   
            public function  ViewMedia()
            {
            return View::make('admin-area.media')->with('cat','media');
            }        



            public function  EditMedia($id)
            {

            $row = Media::find($id);
            return View::make('admin-area.edit-media')->with('specshout',$row) ; 

            }        

            public function UpdateMedia($id)
            {
            //
            $news = Media::find($id);

            $rules =   array( 
            'mediacontent'=>  'required'        
            ) ;   

            $credentials = Input::all();



            $v =   Media::validate($credentials,$rules);
            if($v !== true){
            return Redirect::to('admin-area/media/'.$id.'/edit-media')->withErrors($v)->withInput();    
            }

            
   
            
            
            
            

                $users_upt = Media::find($id);
                $users_upt->title    = Input::get('title');
                $users_upt->mediacontent  = Input::get('mediacontent');
                $users_upt->thedate  = Input::get('thedate');
                $users_upt->save();
                return Redirect::to('admin-area/media')->with('success-message', 'Media updated has been updated successfully');

            }


            public function destroyMedia($id)
            {
            $users = Media::find($id);
            $users->delete();

            return Redirect::to('admin-area/media')->with('success-message', "Media post has been deleted successfully");



            } 
         
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

}