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
        Schema::create('service_record_items', function (Blueprint $table) {

            $table->id();

            $table->foreignId('service_record_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('service_id')
                ->constrained()
                ->onDelete('cascade');

            $table->integer('quantity')
                ->default(1);

            $table->decimal('price', 10, 2);

            $table->decimal('subtotal', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_record_items');
    }
};
