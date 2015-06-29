<?php

class MyCode  {



    
    
    

    static  $common_arrays =  array(    

        'colors' =>  array( 'alert-info','alert-success','alert-warning','alert-wine','alert-navy','alert-greeny','alert-blue' ),        
        'feat_images' =>  array(  'img1.jpg',  'imgtwo.jpg', 'img3.jpg','img4.jpg','img5.jpg' )  
    ) ;  
            
            
            
            
            
  
   static  $menuOptions = 
        
        array(
    
                    1   => array(
                    array('title' => 'Deliverance',  'route' => 'prayer-post/deliverance',     'name' => 'deliverance',  'value' => 1),
                    array('title' => 'Family',       'route' => 'prayer-post/family',          'name' => 'family',       'value' => 2),
                    array('title' => 'Finances',     'route' => 'prayer-post/finances',        'name' => 'finances',     'value' => 3),
                    array('title' => 'Health',       'route' => 'prayer-post/health',          'name' => 'health',       'value' => 4),
                    array('title' => 'Marriage',     'route' => 'prayer-post/marriage',        'name' => 'marriage',     'value' => 5),
                    array('title' => 'Nation',       'route' => 'prayer-post/nation',          'name' => 'nation',       'value' => 6),
                    array('title' => 'Others',       'route' => 'prayer-post/others',          'name' => 'others',       'value' => 7)
                    ),


                    2   => array(
                    array('title' => 'New Applications', 'route' => 'apppro/staffarea/newapplications'),
                    array('title' => 'In Processing', 'route' => 'apppro/staffarea/inprocessing'),
                    array('title' => 'In Coming', 'route' => 'apppro/staffarea/incoming'),
                    array('title' => 'Out Going', 'route' => 'apppro/staffarea/outgoing')   

                    )
    
            );       
        
   
   
 
  
      static  $menu_admin = 
            array(
                
               1 =>      array('title' => 'All Users',         'route' => '/admin-area/',                             'value' => array('admin-area'),                   'dropdown'=>''),         
               2 =>      array('title' => 'All Prayers',       'route' => '/admin-area/view-prayers',                 'value' => array('view-prayers'),                 'dropdown'=>''), 
//               3 =>      array('title' => 'All Comment',       'route' => '/admin-area/view-comments',                'value' => array('view-comments'),                'dropdown'=>''), 
               3 =>      array('title' => 'All Media',         'route' => '/admin-area/media',                        'value' => array('media'),                        'dropdown'=>''),     
               4 =>      array('title' => 'Create Media',         'route' => '/admin-area/create-media',               'value' => array('create-media'),                        'dropdown'=>''),
                
                
 ); 
  
 
      
    
       static  $menu_user = 
            array(
                
               1 =>      array('title' => 'All Testimony',           'route' => '/user-area/',                                  'value' => array('user-area'),                      'dropdown'=>''),         
               2 =>      array('title' => 'All Prayers',             'route' => '/user-area/view-prayers',                      'value' => array('view-prayers'),                   'dropdown'=>''),         
               3 =>      array('title' => 'Add Testimony',           'route' => '/user-area/create-shoutout',                   'value' => array('create-shoutout'),                'dropdown'=>''), 
               4 =>      array('title' => 'All Comment',             'route' => '/user-area/view-comments',                     'value' => array('view-comments'),                  'dropdown'=>''), 
               5 =>      array('title' => 'Change Password',         'route' => '/user-area/change-password',                   'value' => array('change-password'),                'dropdown'=>''),     
                
                
                
 );      
      
      
      
      
      
      
      
      
      
  
   function get_item_from_array( $item ){
     

$i = rand(0, count($item)-1);

$selected = $item[$i];

return $selected;
  
 }
   
//    public function get_item_from_array( $item ){
//
////            for ($i = 0, $c = sizeof($item); $i < $c - 1; $i++) {
////            $new_i = rand($i + 1, $c - 1);
////          //  list($item[$i], $item[$new_i]) = array($item[$new_i], $item[$i]);
////            }
////            //var_export($item); // Derangement     
//        
//            shuffle($item);
//
//            
//            
//            
//            return  $item[0] ;    
//
//    }
   
   
   
   

   
       public function  mul($x = 1){
           
           
	if ($x % 6== 0) {
		return TRUE;
	}else{
		return FALSE;
	}
}
   
   
   
   
   
   
   
  public function createRandomPassword() {

  $chars = "abcdefghijkmnopqrstuvwxyz023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;

    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }

    return $pass;

}
 
   
   
   
   
   
//     public function fetchMenuForUserType($userType = 1) {
//        return $this->menuOptions[$userType];
//    }  
//   
   
   
   
   
   
   
   
   
   
   
   
   
   
  
        
}
