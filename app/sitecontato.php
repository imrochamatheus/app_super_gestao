<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sitecontato extends Model
{
    //
    protected $fillable = ['nome', 'telefone', 'email', 'motivo_contatos_id', 'mensagem'];
}
