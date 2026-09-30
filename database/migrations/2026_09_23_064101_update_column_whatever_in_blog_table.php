
<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * KALAU NGUBAH INFORMASI KOLOM PAKAI change(), ex: menambahkan unique, jumlah text  
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('whatever', 200)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('whatever', 100)->change();
        });
    }
};
