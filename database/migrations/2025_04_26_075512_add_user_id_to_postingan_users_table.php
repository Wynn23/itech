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
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Menambahkan kolom user_id sebagai foreign key
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
        $table->dropColumn('user_id'); // Menghapus kolom user_id jika migrasi dibatalkan
    });
}
};
