<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'phone_number', 'address', 'package_id'];

    // Relasi ke Package
    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
