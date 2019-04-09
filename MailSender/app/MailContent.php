<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailContent extends Model
{
    protected $fillable = ['weekDay','hour','mailSubject','mailContent'];
}
