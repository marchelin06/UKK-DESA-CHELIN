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
        Schema::table('users', function (Blueprint $table) {
            // 0 = menunggu verifikasi, 1 = disetujui, 2 = ditolak
            $table->tinyInteger('is_verified')->default(0)->after('role');
            $table->timestamp('verified_at')->nullable()->after('is_verified');
            $table->string('alasan_kunjungan')->nullable()->after('verified_at');
            $table->string('durasi_tinggal')->nullable()->after('alasan_kunjungan');
            $table->string('asal_daerah')->nullable()->after('durasi_tinggal');
            $table->text('catatan_admin')->nullable()->after('asal_daerah');
            $table->unsignedBigInteger('approved_by')->nullable()->after('catatan_admin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_verified', 'verified_at', 'alasan_kunjungan', 'durasi_tinggal', 'asal_daerah', 'catatan_admin', 'approved_by']);
        });
    }
};
