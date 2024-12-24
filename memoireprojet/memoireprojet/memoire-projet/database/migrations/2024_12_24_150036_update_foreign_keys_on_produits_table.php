<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateForeignKeysOnProduitsTable extends Migration
{
    public function up()
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->unsignedBigInteger('id_paiement')->change();
        });
    }

    public function down()
    {
        Schema::table('produits', function (Blueprint $table) {
            $table->integer('id_paiement')->change(); // Retournez à l'ancien type si nécessaire
        });
    }
}
