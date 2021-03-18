<?php
use GraphQL\GraphQL;
use GraphQL\Type\Schema;
require(basePath.'graphql/type/types.php');
require(basePath.'graphql/query/appQuery.php');
require(basePath.'graphql/query/appMutation.php');
$schema=new Schema([
   'query'=>$rootQuery,
   'mutation'=>$rootMutation
]);
try {
   
   $rawInput=file_get_contents('php://input');
   $input=json_decode($rawInput,true);
   $query=$input['query'];
   $variable=array_key_exists('variables',$input)==false?null:$input['variables'];
   $result=GraphQL::executeQuery($schema,$query,null,null,$variable);
   $output=$result->toArray();
}
catch(\Exception $e)
{
   $output=[
      'error'=>[
         'message'=>$e->getMessage()
      ]
   ];
}
header('Content-Type:application/json');
echo json_encode($output);