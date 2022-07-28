<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flavours extends Model
{
    use HasFactory;
    protected $table= 'flavours';
    protected $primary_key='flavour_id';
}
