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
    
     public function up()
{
    Schema::table('postingan_users', function (Blueprint $table) {
        $table->text('konten');  // Menambahkan kolom konten
    });
}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('postingan_users', function (Blueprint $table) {
        $table->dropColumn('konten');  // Menghapus kolom konten jika migrasi dibatalkan
    });
}
};
