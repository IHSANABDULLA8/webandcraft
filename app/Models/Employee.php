<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'designation_id',
        'photo'
    ];
    public function designation()
    {
        return $this->belongsTo(designations::class,'designation_id');
    }
}
