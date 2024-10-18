
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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            // Désignation avec contrainte unique et limite de taille
            $table->string('designation', 100)->unique();
            // Marque avec limite de taille (facultatif)
            $table->string('marque', 50)->nullable();
            // Référence avec une taille limitée, ajout d'un index
            $table->string('reference', 50)->index();
            // Quantité en stock avec un type integer non signé
            $table->unsignedInteger('qtestock');
            // Prix avec type decimal
            $table->decimal('prix', 8, 2);
            // Image avec limite de taille (255 caractères)
            $table->string('imageart', 255)->nullable();
            // Clé étrangère pour la catégorie
            $table->unsignedBigInteger("scategorieID")//creer un cle étrangère
            ->foreign("scategorieID")
            ->references("id")//hethi bech naamlou relation bin classe categorie avec son id 
            ->on("categories")//le nom du classe eli bech njibo meni id
            ->onDelete("restrict");//manjmouch nefskhou categorie baad masret relation 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};