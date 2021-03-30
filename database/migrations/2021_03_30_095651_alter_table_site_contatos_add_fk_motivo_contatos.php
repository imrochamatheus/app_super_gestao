<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AlterTableSiteContatosAddFkMotivoContatos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Adicionando coluna motivo_contatos_id
        Schema::table('sitecontatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id'); 
        });

        //Atribuindo motivo_contato para a nova coluna motivo_contatos_id
        DB::statement('update sitecontatos set motivo_contatos_id = motivo_contato');

        //criação da fk e removendo a coluna motivo contato
        Schema::table('sitecontatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos'); 
            $table->dropColumn('motivo_contato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('sitecontatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('sitecontatos_motivo_contatos_id_foreign'); 
        });

        DB::statement('update sitecontatos set motivo_contato = motivo_contato_id');
        
        Schema::table('sitecontatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id'); 
        });
    }
}
