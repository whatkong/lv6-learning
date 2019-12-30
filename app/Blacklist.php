<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    //nginx ip黑名单
    protected $table = 'black_list';

    public $timestamps = false;


}
