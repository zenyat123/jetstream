<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {

        Schema::create("entities", function(Blueprint $table)
        {

            $table->id();
            $table->text("airplane");
            $table->text("line");
            $table->text("flight");
            $table->timestamps();

        });

    }

    public function down()
    {

        Schema::dropIfExists("entities");

    }

};