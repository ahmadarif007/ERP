<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('sup_name');
            $table->integer('sup_phone');
            $table->text('sup_contact_person');
            $table->string('sup_address');
            $table->string('sup_web');
            $table->string('sup_tin_number');
            $table->string('sup_type');
            $table->tinyInteger('sup_country');
            $table->tinyInteger('sup_status');
            $table->tinyInteger('sup_nature');
            $table->string('sup_owner_info');
            $table->string('sup_tag_buyer');
            $table->string('sup_tag_company');
            $table->string('sup_remarks');
            $table->string('sup_email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    } 

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suppliers');
    }
};
