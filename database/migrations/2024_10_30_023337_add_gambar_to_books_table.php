<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->string('gambar')->nullable()->after('tgl_terbit'); // Menambahkan kolom 'gambar' setelah kolom 'tgl_terbit'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('gambar'); // Menghapus kolom 'gambar' saat rollback
        });
    }
};
