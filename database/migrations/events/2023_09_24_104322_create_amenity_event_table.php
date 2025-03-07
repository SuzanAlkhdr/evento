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
        Schema::create('amenity_event', function (Blueprint $table) {
            $table->id();

            $table->foreignId('event_id')->constrained('events')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('amenity_id')->constrained('amenities')
                ->onDelete('cascade')->onUpdate('cascade') ;

            $table->float('price') ;
            $table->string('description') ;
            $table->string('description_ar') ;

            $table->index('event_id') ;
            $table->index('amenity_id') ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('amenity_event');
    }
};
