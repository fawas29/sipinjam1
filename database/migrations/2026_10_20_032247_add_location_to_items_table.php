<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('items', function (Blueprint $table) {
        $table->string('location', 100)->nullable()->after('stock'); // Menambah kolom sesuai instruksi
    });
}

public function down()
{
    Schema::table('items', function (Blueprint $table) {
        $table->dropColumn('location'); // Menghapus kolom saat di-rollback
    });
}
};
