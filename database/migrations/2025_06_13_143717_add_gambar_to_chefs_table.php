<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up()
{
    Schema::table('chefs', function (Blueprint $table) {
        // Hapus atau komentar baris ini:
        // $table->string('gambar')->nullable()->after('specialty');
    });
}

public function down(): void
{
    Schema::table('chefs', function (Blueprint $table) {
        $table->dropColumn('gambar');
    });
}

};
