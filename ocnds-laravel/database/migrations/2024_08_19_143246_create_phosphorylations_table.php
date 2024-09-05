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
        Schema::create('phosphorylations', function (Blueprint $table) {
            $table->id();
            $table->string('accession');
            $table->integer('position');
            $table->string('gene');
            $table->text('gene_description')->nullable();
            $table->float('k198r_s')->nullable();
            $table->float('k198r_m')->nullable();
            $table->float('r47g')->nullable();
            $table->float('d156e')->nullable();
            $table->double('pval_k198rs')->nullable();
            $table->double('pval_k198rm')->nullable();
            $table->double('pval_r47g')->nullable();
            $table->double('pval_d156e')->nullable();
            $table->string('modified_residue')->nullable();
            $table->integer('modified_position')->nullable();
            $table->string('15mer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('phosphorylations');
    }
};
