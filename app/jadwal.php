<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
      protected $table = 'jadwal';
      protected $fillable = [
      'npm',
      'nama',
      'kelas',
      'terminal',
      'hari',
      'waktu',
      ];
    public $timestamps = false;
}
