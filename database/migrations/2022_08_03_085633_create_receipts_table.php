<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('fumigation_id')->unsigned();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->decimal('amount');
            $table->string('cert_no');
            $table->date('issue_date');
            $table->date('expires_date');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('fumigation_id')->references('id')->on('fumigations');
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
        Schema::dropIfExists('receipts');
    }
}
