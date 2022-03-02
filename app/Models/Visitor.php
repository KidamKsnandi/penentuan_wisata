<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $visible = ['jumlah', 'tanggal'];
    protected $fillable = ['jumlah', 'tanggal'];
    public $timestamps = true;
}
