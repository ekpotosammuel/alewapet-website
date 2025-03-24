<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDecontaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('decontaminations', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_premises');
            $table->string('address_of_premises');
            $table->string('phone_no');
            $table->date('date_of_fumigation');
            $table->string('cert_no');
            $table->date('issue_date');
            $table->date('expires_date');
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
        Schema::dropIfExists('decontaminations');
    }
}
