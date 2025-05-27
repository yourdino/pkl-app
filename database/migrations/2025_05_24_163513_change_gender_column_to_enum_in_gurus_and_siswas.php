<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeGenderColumnToEnumInGurusAndSiswas extends Migration
{
    public function up(): void
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->enum('gender', ['L', 'P'])->change();
        });

        Schema::table('siswas', function (Blueprint $table) {
            $table->enum('gender', ['L', 'P'])->change();
        });
    }

    public function down(): void
    {
        Schema::table('gurus', function (Blueprint $table) {
            $table->string('gender')->change();
        });

        Schema::table('siswas', function (Blueprint $table) {
            $table->string('gender')->change();
        });
    }
}
