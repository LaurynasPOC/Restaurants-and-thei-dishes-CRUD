<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    use HasFactory;

    public $fillable = ['title', 'employees', 'customers', 'dish_id'];

    public function dishes() {
        return $this->belongsTo('App\Models\Dishes', 'dish_id');
    }
}