<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminPass extends Model
{
    protected $table = 'admin_pass';
    protected $fillable = ['keys'];
}
