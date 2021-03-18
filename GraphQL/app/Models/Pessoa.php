<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model {
protected $table="Pessoa";
public $timestamps = false;
protected $fillable=["nome","email"];
public function telefone()
{
  return $this->hasMany(Telefone::class);
}
}
