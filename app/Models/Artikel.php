<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $visible = ['id_user', 'judul', 'slug', 'cover', 'konten', 'status'];
    protected $fillable = ['id_user', 'judul', 'slug', 'cover', 'konten', 'status'];
    public $timestamps = true;

    public function cover()
    {
        if ($this->cover && file_exists(public_path('images/cover/' . $this->cover))) {
            return asset('images/cover/' . $this->cover);
        } else {
            return asset('images/no_image.png');
        }
    }

    public function deleteCover()
    {
        if ($this->cover && file_exists(public_path('images/cover/' . $this->cover))) {
            return unlink(public_path('images/cover/' . $this->cover));
        }

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
