<?php

use App\Models\User;
use App\Models\Pessoa;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ObjectType;
use GraphQL\Type\Definition\InputObjectType;

// Start User
$userType = new ObjectType([
    'name' => 'User',
    'description' => 'Este é o tipo do usuario',
    'fields' => function () use (&$addressType) {
        return [
            'id' => Type::int(),
            'first_name' => Type::string(),
            'last_name' => Type::string(),
            'email' => Type::string(),
            'addresses' => [
                'type' => Type::listOf($addressType),
                'resolve' => function ($root, $args) {
                    $userId = $root['id'];
                    $user = User::where('id', $userId)->with(['addresses'])->first();
                    return $user->addresses->toArray();
                }
            ]
        ];
    }
]);
$UserInputType = new InputObjectType([
    'name' => 'userInput',
    'fields' => [
        'first_name' => Type::string(),
        'last_name' => Type::string(),
        'email' => Type::string(),
        //'address'=>Type::($objAddress)
    ]
]);
// End User
// Start User
$addressType = new ObjectType([
    'name' => 'Address',
    'description' => 'Este é o tipo do Endereco',
    'fields' => [
        'id' => Type::int(),
        'user_id' => Type::string(),
        'name' => Type::string(),
        'description' => Type::string()
        // 'user'=>Type::
    ]
]);
$AddressInputType = new InputObjectType([
    'name' => 'addressInput',
    'fields' => [
        'user_id' => Type::string(),
        'name' => Type::string(),
        'description' => Type::string(),
    ]
]);
// End User
// Start Pessoa
$pessoaType = new ObjectType([
    'name' => 'pessoa',
    'description' => 'type da Pessoa',
    'fields' => function () use (&$telefoneType) {
        return [
            'nome' => Type::string(),
            'email' => Type::string(),
            'telefone' => [
                'type' => Type::listOf($telefoneType),
                'resolve' => function ($root, $args) {
                    $pessoaId = $root['id'];
                    $pessoa = Pessoa::where('id', $pessoaId)->with(['telefone'])->first();
                    return $pessoa->telefone->toArray();
                }
            ]
        ];
    }
]);
//End Pessoa
//Start Telefone
$telefoneType = new ObjectType([
    'name' => 'telefone',
    'description' => 'Type do Telefone',
    'fields' => [
        'numeroTelefone' => Type::int(),
        'pessoaId' => Type::int()
    ]
]);
