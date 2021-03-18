<?php
require('vendor/autoload.php');
require('app/path/path.php');
//use App\Models\User;

use Illuminate\Database\Capsule\Manager as Capsule;
$capsule=new Capsule();
$capsule->addConnection([
       'driver'=>'mysql',
       'host'=>'localhost',
       'database'=>'graphQL',
       'username'=>'root',
       'password'=>'',
       'charset'=>'utf8',
       'collation'=>'utf8_unicode_ci',
       'prefix'=>''
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();
require('graphql/schema/appSchema.php');
//$user=User::find(1);
//var_dump($user->addresses->toArray());