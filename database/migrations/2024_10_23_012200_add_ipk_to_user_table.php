<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIpkToUserTable extends Migration
{
    /**
     * Jalankan migrasi.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user', function (Blueprint $table) {
            // Menambahkan kolom 'ipk' dengan tipe data float (total 3 digit, 2 di belakang koma)
            $table->float('ipk', 3, 2)->nullable()->default(null)->check('ipk <= 4.00'); 
        });
    }

    /**
     * Kembalikan migrasi.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            // Menghapus kolom 'ipk'
            $table->dropColumn('ipk');
        });
    }
}
