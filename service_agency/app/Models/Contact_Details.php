<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact_Details extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'contact_address', 
        'contact_email',
        'contact_number',
       
    ];
}
