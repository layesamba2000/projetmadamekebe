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
        Schema::table('produits', function (Blueprint $table) {
            $table->string('nom');
            $table->decimal('prix', 8, 2);
            $table->integer('quantite');
            $table->unsignedBigInteger('id_paiement');
            $table->string('image')->nullable();
            $table->foreign('id_paiement')->references('id')->on('paiements')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
