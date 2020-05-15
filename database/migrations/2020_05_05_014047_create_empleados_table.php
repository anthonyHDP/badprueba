<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->char('codigo_empleado',6);
            $table->char('codigo_jefe',6)->unsigned();
            $table->string('nombres',50);
            $table->string('apellidos',50);
            $table->string('email_personal',45)->unique();
            $table->string('email_institucional',45)->unique();
            $table->date('fecha_nacimiento');
            $table->char('identificador_isss',9)->unique();
            $table->char('identificador_nup',12)->unique();
            $table->char('identificador_nit',14)->unique();
            $table->integer('codigo_profesion')->unsigned();//Esto hay que cambiarlo después, a char('codigo_profesion',6)
            $table->integer('id_direccion')->unsigned();
            $table->char('numero_documento_identificacion',9)->unsigned();
            $table->integer('id_estado_civil')->unsigned();
            $table->integer('id_genero')->unsigned();
            $table->integer('id_contacto_telefonico')->unsigned();
            $table->timestamps();
            
            $table->primary('codigo_empleado');
            $table->foreign('codigo_jefe')->references('codigo_empleado')->on('empleados');
            $table->foreign('codigo_profesion')->references('id_profesion')->on('profesiones');
            $table->foreign('id_direccion')->references('id_direccion')->on('direcciones');
            $table->foreign('numero_documento_identificacion')->references('numero_documento_identificacion')->on('documentos_identificacion');
            $table->foreign('id_estado_civil')->references('id_estado_civil')->on('estados_civiles');
            $table->foreign('id_genero')->references('id_genero')->on('generos');
            $table->foreign('id_contacto_telefonico')->references('id_contacto_telefonico')->on('contactos_telefonicos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empleados');
    }
}
