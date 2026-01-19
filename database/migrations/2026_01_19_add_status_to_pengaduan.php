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
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->enum('status', ['pending', 'ditinjau', 'selesai'])->default('pending')->after('lokasi');
            $table->text('catatan_admin')->nullable()->after('status');
            $table->timestamp('tanggal_ditinjau')->nullable()->after('catatan_admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->dropColumn(['status', 'catatan_admin', 'tanggal_ditinjau']);
        });
    }
};
