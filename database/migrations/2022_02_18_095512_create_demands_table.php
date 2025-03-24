<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demands', function (Blueprint $table) {
            $table->id();
            $table->string('dd_no');
            $table->string('name_of_premises');
            $table->string('address_of_premises');
            $table->string('offence');
            $table->string('deliver');
            $table->string('amount');
            $table->date('date'); 
            $table->Time('Time');
            $table->date('final')->nullable();
            $table->date('court_sum')->nullable();
            $table->string('status')->nullable();
            $table->string('amount_paid')->nullable();
            $table->date('remark')->nullable();
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
        Schema::dropIfExists('demands');
    }
}
