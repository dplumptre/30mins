<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Shout extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'shouts';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
//	protected $hidden = array('password', 'remember_token');
        
        
        protected $guarded = array('id','user_id');      
        
        
        
        
     public function users(){
        
        return $this->belongsTo('User','user_id');
    }
    
    
    
    
    
    
//        public static  $rules =   array( 
//        //unique to users the name of the table
//        'username'=> 'required|min:4|Unique:users',  
//        'password'=> 'required|min:6',
//        'password_confirm'=> 'same:password',            
//        'email'=> 'required|email|Unique:users',        
//) ;
//        
//        
//        
     public static function validate($input,$rules) 
         {

        $v =  Validator::make($input, $rules);            
        
         return  $v->fails() ? $v : true;      
    
        }            
        
        
        
        
        
        
        
        

}
