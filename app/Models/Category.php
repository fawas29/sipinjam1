<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany; // Baris yang ditambahkan

class Category extends Model
{
    // Kolom yang boleh diisi lewat create() dan update()
    protected $fillable = ['name', 'description'];

    // Method relasi sesuai instruksi modul
    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}