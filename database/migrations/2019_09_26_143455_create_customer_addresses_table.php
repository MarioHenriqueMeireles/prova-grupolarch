<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerAddressesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')
                    ->references('id')->on('customers');
            $table->bigInteger('address_id')->unsigned();
            $table->foreign('address_id')
                    ->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('customer_addresses', function (Blueprint $table) {
            $table->dropForeign(['customer_id']);
            $table->dropForeign(['address_id']);
        });
        
        Schema::dropIfExists('customer_addresses');
    }

}
