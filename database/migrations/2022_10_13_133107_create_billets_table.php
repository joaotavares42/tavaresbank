<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billets', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->decimal('value', 8, 2);
            $table->date('due_date');
            $table->enum('status', ['PENDING', 'PAID_OUT', 'EXPIRED']);
            $table->foreign('account_owner')->references('id')->on('accounts');
            $table->softDeletes();
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
        Schema::dropIfExists('billets');
    }
};
