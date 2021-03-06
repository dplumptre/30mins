<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Specialemail extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'specialemails';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
//	protected $hidden = array('password', 'remember_token');
        
        
        protected $guarded = array('id','user_id');      
        
        
        

    
    
     
     public static function validate($input,$rules) 
         {

        $v =  Validator::make($input, $rules);            
        
         return  $v->fails() ? $v : true;      
    
        }            
        
        
        
        
        
        
        
        

}
