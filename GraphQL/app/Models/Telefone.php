<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Telefone extends Model
{
   protected $table="Telefone";
   public $timestamps=false;
   protected $fillable=["numeroTelefone","pessoaId"];
   public function pessoa()
   {
     return $this->belongsTo(Pessoa::class);
   }                
}