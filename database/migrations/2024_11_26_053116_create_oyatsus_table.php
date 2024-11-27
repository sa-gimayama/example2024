<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('oyatsus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->float('calory');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('oyatsus');
    }
};
