<?php namespace Genius\Base\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateCustomersTable extends Migration
{

    public function up()
    {
        Schema::create('genius_customers_customers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('action');
            $table->string('url');
            $table->integer('sort');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('genius_customers_customers');
    }

}
