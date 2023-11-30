<?php
// app/Models/Data.php

// App\Models\Data.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = ['user_id', 'name', 'phone', 'email', 'adhar', 'pan', 'voter', 'status'];
}
