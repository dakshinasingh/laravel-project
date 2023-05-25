<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
			$table->unsignedInteger('user_id');
			$table->string('name');
			$table->string('email');
			$table->string('phone')->nullable;
			$table->string('address')->nullable;
			$table->string('country')->nullable;
			$table->bigInteger('total')->default(0);
			$table->string('stripe_id')->nullable;
			$table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
