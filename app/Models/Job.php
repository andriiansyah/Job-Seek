<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job';
    protected $fillable = [
        'id_user',
        'judul',
        'posisi',
        'deskripsi',
        'created_at',
        'updated_at',
    ];
}
