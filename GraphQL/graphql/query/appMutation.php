<?php
use GraphQL\Type\Definition\ObjectType;
require(basePath.'graphql/query/mutation.php');
$mutation=array();
$mutation+=$userMutation;
$mutation+=$addressMutation;
$rootMutation=new ObjectType([
    'name'=>'Mutation',
    'fields'=>$mutation                      
]);