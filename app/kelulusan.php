<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kelulusan extends Model
{
  protected $table = 'kelulusan';
  protected $fillable = [
  'npm',
  'nama',
  'kelas',
  'jurusan',
  'materi',
  'status',
  'ambilser',
  ];
public $timestamps = false;
}
