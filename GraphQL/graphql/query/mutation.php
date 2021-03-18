<?php

use App\Models\Address;
use App\Models\User;
use GraphQL\Type\Definition\Type;
$userMutation=[
 'addUser'=>[
     'type'=>$userType,
     'args'=>[
          'obj'=>Type::nonNull($UserInputType)                    
     ],
     'resolve'=>function($root,$args)
     {
        $user=new User([
             'first_name'=>$args['obj']['first_name'],
             'last_name'=>$args['obj']['last_name'],
             'email'=>$args['obj']['email'],   
        ]);
        $user->save();
        return $user->toArray();
        
     }
 ]
 
];
$addressMutation=[
     'addAddress'=>[
         'type'=>$addressType,
         'args'=>[
              'obj'=>Type::nonNull($AddressInputType)                    
         ],
         'resolve'=>function($root,$args)
         {
            $address=new Address([
                 'user_id'=>$args['obj']['user_id'],
                 'name'=>$args['obj']['name'],
                 'description'=>$args['obj']['description'],   
            ]);
            $address->save();
            return $address->toArray();
            
         }
     ]
     
    ];