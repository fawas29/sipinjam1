<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanController extends Controller
{
    public function index(Request $request)
    {
        $query = Loan::with(['user', 'items'])->latest();

        // Mahasiswa hanya boleh melihat peminjamannya sendiri
        if (! $request->user()->isAdmin()) {
            $query->where('user_id', $request->user()->id);
        }

        // Tambahan logika filter status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $semuaPeminjaman = $query->paginate(10)->withQueryString();

        return view('peminjaman.index', compact('semuaPeminjaman'));
    }
    public function create()
    {
        // hanya alat dengan stok > 0
        $alatTersedia = Item::available()->orderBy('name')->get();

        return view('peminjaman.create', compact('alatTersedia'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'due_date' => 'required|date|after_or_equal:today|before_or_equal:' . now()->addDays(7)->toDateString(),
            'notes'    => 'nullable|max:255',
            'items'    => 'required|array',
        ]);

        DB::transaction(function () use ($request, $validated) {
            // 1. Buat data peminjaman utama
            $peminjaman = $request->user()->loans()->create([
                'loan_date' => today(),
                'due_date'  => $validated['due_date'],
                'status'    => 'dipinjam',
                'notes'     => $validated['notes'] ?? null,
            ]);

            // 2. Loop input items yang dikirimkan dari form
            foreach ($request->items as $itemId => $qty) {
                if ($qty > 0) {
                    $alat = Item::findOrFail($itemId);

                    if ($qty > $alat->stock) {
                        throw new \Exception("Stok {$alat->name} tidak mencukupi.");
                    }

                    // Attach ke tabel pivot dengan qty
                    $peminjaman->items()->attach($alat->id, ['qty' => $qty]);

                    // Kurangi stok alat
                    $alat->decrement('stock', $qty);
                }
            }
        });

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman banyak alat berhasil dicatat.');
    }

    public function kembalikan(Loan $peminjaman)
    {
        if ($peminjaman->status === 'dikembalikan') {
            return back()->with('error', 'Peminjaman ini sudah dikembalikan.');
        }

        DB::transaction(function () use ($peminjaman) {
            // Kembalikan stok setiap alat sesuai jumlah yang dipinjam
            foreach ($peminjaman->items as $alat) {
                $alat->increment('stock', $alat->pivot->qty);
            }

            $peminjaman->update([
                'status'      => 'dikembalikan',
                'returned_at' => today(),
            ]);
        });

        return back()->with('success', 'Alat sudah dikembalikan dan stok diperbarui.');
    }
}
