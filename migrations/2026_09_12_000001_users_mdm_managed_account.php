<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Capsule\Manager as Capsule;

class UsersMdmManagedAccount extends Migration
{
    private $tableName = 'local_users';

    public function up()
    {
        $capsule = new Capsule();

        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            $table->boolean('mdm_managed')->nullable();
            $table->boolean('mobile_account')->nullable();
        });

        // Create indexes
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            $table->index('mdm_managed');
            $table->index('mobile_account');
        });
    }

    public function down()
    {
        $capsule = new Capsule();
        $capsule::schema()->table($this->tableName, function (Blueprint $table) {
            $table->dropColumn('mdm_managed');
            $table->dropColumn('mobile_account');
        });
    }
}
