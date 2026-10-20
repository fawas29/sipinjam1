<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $kategori = [
    ['name' => 'Alat Ukur', 'description' => 'Multimeter, osiloskop, jangka sorong'],
    ['name' => 'Alat Solder', 'description' => 'Solder, penyedot timah, heat gun'],
    ['name' => 'Mikrokontroler', 'description' => 'Arduino, ESP32, Raspberry Pi'],
    ['name' => 'Perkakas', 'description' => 'Obeng, tang, kunci pas'],
    ['name' => 'Alat K3', 'description' => 'helm, kacamata, sarung tangan'], // Tambahan baru
];

foreach ($kategori as $data) {
    $category = Category::create($data);
    // Ubah angka 5 menjadi 8
    Item::factory()->count(8)->create(['category_id' => $category->id]);
}
    }
}
