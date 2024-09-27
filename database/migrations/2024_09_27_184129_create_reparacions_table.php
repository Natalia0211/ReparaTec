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
        Schema::create('reparacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitud_id')->constrained();
            $table->foreignId('empleado_id')->constrained();
            $table->dateTime('fecha_reparacion');
            $table->decimal('costo_reparacion', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reparacions');
    }
};
