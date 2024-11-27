<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('ate_oyatsus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('oyatsu_id');
            $table->dateTime('ate_at');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ate_oyatsus');
    }
};
