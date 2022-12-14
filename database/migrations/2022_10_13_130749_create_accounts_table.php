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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->string('account_number', 5)->unique();
            $table->decimal('balance', 8, 2)->default(0);
            $table->string('password');
            $table->foreignId('agency_id')->references('id')->on('agencies');
            $table->foreignId('person_id')->references('id')->on('persons');
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
        Schema::dropIfExists('accounts');
    }
};
