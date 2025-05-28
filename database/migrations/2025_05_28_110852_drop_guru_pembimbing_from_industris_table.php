<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropGuruPembimbingFromIndustrisTable extends Migration
{
    public function up()
    {
        Schema::table('industris', function (Blueprint $table) {
            // Hapus dulu foreign key-nya
            $table->dropForeign(['guru_pembimbing']); 
            // Baru drop kolomnya
            $table->dropColumn('guru_pembimbing');
        });
    }

    public function down()
    {
        Schema::table('industris', function (Blueprint $table) {
            $table->unsignedBigInteger('guru_pembimbing')->nullable();

            // Jika perlu, kembalikan foreign key-nya
            $table->foreign('guru_pembimbing')->references('id')->on('gurus')->onDelete('cascade');
        });
    }
}
