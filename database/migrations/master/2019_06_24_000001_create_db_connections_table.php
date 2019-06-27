<?php

use App\Models\Master\DBConnections\DBConnectionsModel;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDbConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_connections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('connection_name');
            $table->timestamps();
        });

        DBConnectionsModel::create([
            'connection_name' => 'mysql'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('db_connections');
    }
}
