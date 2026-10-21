<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
// Tambahkan 2 baris ini:
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'category_id',
        'stock',
        'location',
        'description',
    ];

    public function scopeAvailable(Builder $query): void
    {
        $query->where('stock', '>', 0);
    }

    // --- Tambahkan kode relasi dari modul di bawah ini ---
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function loans(): BelongsToMany
    {
       return $this->belongsToMany(Loan::class, 'loan_item')->withPivot('qty');
    }

    public function scopeLowStock(Builder $query): void
    {
        $query->where('stock', '<', 3)->where('stock', '>', 0);
    }
    
}
