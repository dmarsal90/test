<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;


    protected $fillable= ['img','first_name','last_name', 'phone', 'address', 'çity','state','zipcode', 'aviable'];


    public function friends(){
        return $this->hasMany(profile::class,'profile_id'.'id');
    }
}
