<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announce extends Model
{
    protected $table = "anounce";

    protected $fillable = [
        'pesan', 'nama_file','path_file'
    ];
    protected $guarded = [];

    public $timestamps = false;
}
