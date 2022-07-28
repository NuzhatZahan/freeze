<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toppings extends Model
{
    use HasFactory;
    protected $table= 'toppings';
    protected $primary_key='topping_id';
}
