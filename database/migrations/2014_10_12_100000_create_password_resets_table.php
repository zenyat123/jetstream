<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{

    public function up()
    {

        DB::statement("SET SESSION sql_require_primary_key=0");

        Schema::create("password_resets", function(Blueprint $table)
        {

            $table->string("email")->primary();
            $table->string("token");
            $table->timestamp("created_at")->nullable();

        });

    }

    public function down()
    {

        Schema::dropIfExists("password_resets");

    }

};