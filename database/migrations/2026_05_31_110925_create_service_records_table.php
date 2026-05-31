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
        Schema::create('service_records', function (Blueprint $table) {

            $table->id();
            $table->foreignId('vehicle_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('service_id')
                ->constrained()
                ->onDelete('cascade');

            $table->date('service_date');

            $table->integer('mileage');

            $table->text('notes')->nullable();

            $table->decimal('total_price', 10, 2);

            $table->enum('status', [
                'pending',
                'completed',
            ])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_records');
    }
};
