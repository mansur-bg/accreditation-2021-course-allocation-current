<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use HasFactory, SoftDeletes, Notifiable;
    protected $guarded = ['id'];

    protected $guard = 'staff';

    public function isAdmin(): bool
    {
//        if(in_array($this->role()->get('id')[0]->id,[1, 2, 3, 4, 5, 6, 7, 8, 10])|| (in_array($this->attributes['username'], ['mis@slu.edu.ng']))){
        if(in_array($this->attributes['staff_number'], ['P100/4035', 'P100/0000'])){
            return true;
        }else{
            return false;
        }
    }

    public function getStaffNameAttribute(): string
    {
        if(is_null($this->title) )
            return trim($this->name);
        else
        return trim($this->title . " " . $this->name);
    }


}
