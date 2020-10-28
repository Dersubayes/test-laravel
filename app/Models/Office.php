<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Office extends Model
{
    use HasFactory;
    protected $table = 'offices';
    protected $hidden = ['created_at', 'updated_at'];
    
    protected $fillable = [
        'name',
        'address',
    ];

}
