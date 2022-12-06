<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });

        $data =  array(
            [
                'name' => 'ROLE_ADMIN',
                'description' => 'admin role'
            ],
            [
                'name' => 'ROLE_UNKNOWN',
                'description' => 'random person try to register',
            ],
        );
        foreach ($data as $datum){
            $category = new Role(); //The Category is the model for your migration
            $category->name =$datum['name'];
            $category->description =$datum['description'];
            $category->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
