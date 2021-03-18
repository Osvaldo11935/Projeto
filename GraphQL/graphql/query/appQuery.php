<?php
use App\Models\User;
use App\Models\Address;
use App\Models\Pessoa;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\Type;

$rootQuery=new ObjectType([
  'name'=>'Query',
  'fields'=>[
    'user'=>[
      'type'=>$userType,
      'args'=>[
        'id'=>Type::int()
      ],
      'resolve'=>function($root,$args){
        $user=User::find($args['id'])->toArray();
        return $user;
      }
    ],
    'alluser'=>[
      'type'=>Type::listOf($userType),
      'args'=>[
        'id'=>Type::int()
      ],
      'resolve'=>function($root,$args){
        $user=User::All()->toArray();
        return $user;
      }
    ],
    'address'=>[
      'type'=>$addressType,
      'args'=>[
        'id'=>Type::int()
      ],
      'resolve'=>function($root,$args){
        $address=Address::find($args['id'])->toArray();
        return $address;
      }
    ],
    'alladdress'=>[
      'type'=>Type::listOf($addressType),
      'args'=>[
        'id'=>Type::int()
      ],
      'resolve'=>function($root,$args){
        $address=Address::All()->toArray();
        return $address;
      }
    ],
    'pessoa'=>[
        'type'=>$pessoaType,
        'args'=>[
          'id'=>Type::int()
        ],
        'resolve'=>function($root,$args){
          $pessoa=Pessoa::find($args['id'])->toArray();
          return $pessoa;
        }
      ],
      'allpessoa'=>[
        'type'=>Type::listOf($pessoaType),
        'args'=>[
          'id'=>Type::int()
        ],
        'resolve'=>function($root,$args){
          $pessoa=Pessoa::All()->toArray();
          return $pessoa;
        }
    ]
  ]
]);