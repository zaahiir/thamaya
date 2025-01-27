<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_spouse_name');
            $table->text('address');
            $table->string('locality_area');
            $table->string('city');
            $table->string('district');
            $table->string('state');
            $table->string('contact_no');
            $table->string('alternative_no')->nullable();
            $table->string('mail_id');
            $table->string('marital_status');
            $table->string('family_members');
            $table->string('company_name');
            $table->text('company_address');
            $table->string('product_details');
            $table->string('product_category');
            $table->string('target_audience');
            $table->string('social_media_links')->nullable();
            $table->decimal('product_cost', 10, 2);
            $table->string('id_proof');
            $table->integer('age');
            $table->date('date_of_birth');
            $table->text('services_needed');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('registrations');
    }
}
