<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// Tambahkan 2 baris ini:
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Loan extends Model
{
    // (Jika ada $fillable, biarkan saja di sini)

    // --- Tambahkan kode relasi dari modul di bawah ini ---
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'loan_item')->withPivot('qty')->withTimestamps();
    }
}