<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFumigationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fumigations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('eho_number')->nullable();
            $table->string('name_of_premises')->nullable();
            $table->string('address_of_premises')->nullable();
            $table->string('phone_no')->nullable();
            $table->date('date_of_fumigation');
            $table->string('vendors_use')->nullable();
            $table->string('cert_no')->nullable();
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
        Schema::dropIfExists('fumigations');
    }
}
