<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');
        
        
        protected $guarded = array('id','user_id');      
        
        
//     public function prayer()
//    {
//        return $this->hasMany('Prayer', 'author_id');
//    }

    
  public function prayers(){

    return  $this->hasMany('Prayer','id');

}      

  public function shouts(){

    return  $this->hasMany('Shout','id');

}   

  public function medias(){

    return  $this->hasMany('Media','id');

}  


  public function comments(){

    return  $this->hasMany('Comment','id');

}  
        
        
        public static  $rules =   array( 
        //unique to users the name of the table
        'username'=> 'required|min:4|Unique:users',  
        'password'=> 'required|min:6',
        'password_confirm'=> 'required|same:password',            
        'email'=> 'required|email|Unique:users',        
) ;
        
        
        
     public static function validate($input,$rules) 
         {

        $v =  Validator::make($input, $rules);            
        
         return  $v->fails() ? $v : true;      
    
        }            
        
        
        
        
      public static function regValidate($input,$rules,$messages) 
         {

        $v =  Validator::make($input, $rules,$messages);            
        
         return  $v->fails() ? $v : true;      
    
        }           
        
        
        

}
