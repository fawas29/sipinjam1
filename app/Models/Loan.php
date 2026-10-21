<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    // Wajib ada agar Laravel mengizinkan pengisian data kolom-kolom ini
    protected $fillable = [
        'user_id',
        'loan_date',
        'due_date',
        'returned_at',
        'status',
        'notes'
    ];

    // Wajib ada untuk format tanggal
    protected $casts = [
        'loan_date'   => 'date',
        'due_date'    => 'date',
        'returned_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'loan_item')->withPivot('qty');
    }
}