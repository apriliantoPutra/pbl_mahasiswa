<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('logbook_magangs', function (Blueprint $table) {
            $table->timestamps(); // Tambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('logbook_magangs', function (Blueprint $table) {
            $table->dropTimestamps(); // Hapus kolom created_at dan updated_at
        });
    }
};
