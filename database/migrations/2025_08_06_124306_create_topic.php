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
        Schema::create('topics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('content');
            $table->timestamps();
            $table->unsignedBigInteger('deleted')->default(0);

            $table->string('phone', 20)->nullable();
            $table->string('city', 64)->nullable();
            $table->string('district', 64)->nullable();
            $table->string('gender', 16)->nullable();  
            $table->string('genus', 120)->nullable();  
            $table->string('age')->nullable(); 
            $table->string('type', 32)->nullable();    
            $table->string('animal', 32)->nullable();  
            $table->string('name')->nullable();


            $table->index(['city', 'district']);
            $table->index(['animal', 'type']);


        
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topic');
    }
};
