<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusIdToApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('status_id')->nullable();

            $table->index('status_id', 'applications_status_app_idx');
            $table->foreign('status_id', 'applications_status_app_fk')->references('id')->on('status_applications');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropForeign('applications_status_app_fk');
            $table->dropIndex('applications_status_app_idx');
            $table->dropColumn('status_id');
        });
    }
}
