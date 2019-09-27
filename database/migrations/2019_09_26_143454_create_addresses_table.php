<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("country")->default('Brasil');
            $table->string("state");
            $table->string("city");
            $table->string("post_code");
            $table->string("public_place");
            $table->string("neighborhood");
            $table->string("number");
            $table->string("complement");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('addresses');
    }

}
