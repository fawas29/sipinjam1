<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use App\Models\Loan;

class DashboardController extends Controller
{
    public function index() {
    return view('dashboard', [
        'jumlahAlat'     => \App\Models\Item::count(),
        'jumlahKategori' => \App\Models\Category::count(),
        'sedangDipinjam' => \App\Models\Loan::where('status', 'dipinjam')->count(),
        'stokMenipis'    => \App\Models\Item::lowStock()->count(),
    ]);
}
}
