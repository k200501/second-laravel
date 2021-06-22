<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    //保證連到對的table
    protected $table = 'contact_us';
    protected $fillable=['name','email','subject','content'];
}
