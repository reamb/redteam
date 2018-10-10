<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Guests', function (Blueprint $table) {
            $table->increments('id');
			$table->string('ner');
			$table->string('ovog');
			$table->string('email');
			$table->string('phone');
			$table->string('company');
			$table->string('position');
			$table->string('info1');
			$table->string('info2');
			$table->string('info3');
			$table->boolean('feedback')->nullable();
			$table->boolean('is_activated')->nullable();
			$table->string('activation_code')->nullable();
			$table->boolean('verified')->nullable();
			$table->date('activated_at')->nullable();
			$table->date('verified_at')->nullable();     
			$table->date('registered_at')->nullable();     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Guests');
    }
}
