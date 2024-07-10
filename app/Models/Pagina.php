<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    use HasFactory;
    protected $table="paginas";
    public $timestamps=false;
    protected $fillable = [
        'fk_capitulo',
        'num_pagina',
        'imagen',
    ];
}
