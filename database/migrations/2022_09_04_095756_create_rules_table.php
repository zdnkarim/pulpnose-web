<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Rule;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('disease_id')->unsigned()->index()->nullable();
            $table->bigInteger('symptom_id')->unsigned()->index()->nullable();
            $table->string('mb');
            $table->string('md');
            $table->string('cf');
            $table->timestamps();
            
            $table->foreign('disease_id')->references('id')->on('diseases')->onDelete('cascade');
            $table->foreign('symptom_id')->references('id')->on('symptoms')->onDelete('cascade');
        });

        $data =  array(
            // Pulpitis Reversibel
            [
                'disease_id' => '1',
                'symptom_id' => '1',
                'mb' => '1',
                'md' => '0.2',
                'cf' => '0.8',
            ],
            [
                'disease_id' => '1',
                'symptom_id' => '2',
                'mb' => '1',
                'md' => '0.4',
                'cf' => '0.6',
            ],
            [
                'disease_id' => '1',
                'symptom_id' => '3',
                'mb' => '1',
                'md' => '0.4',
                'cf' => '0.6',
            ],
            [
                'disease_id' => '1',
                'symptom_id' => '6',
                'mb' => '1',
                'md' => '0.2',
                'cf' => '0.8',
            ],
            [
                'disease_id' => '1',
                'symptom_id' => '14',
                'mb' => '0.6',
                'md' => '0.4',
                'cf' => '0.2',
            ],
            [
                'disease_id' => '1',
                'symptom_id' => '17',
                'mb' => '0.4',
                'md' => '0.6',
                'cf' => '-0.2',
            ],
            [
                'disease_id' => '1',
                'symptom_id' => '18',
                'mb' => '0.4',
                'md' => '0.6',
                'cf' => '-0.2',
            ],
            // Pulpitis Irreversibel
            [
                'disease_id' => '2',
                'symptom_id' => '2',
                'mb' => '1',
                'md' => '0.4',
                'cf' => '0.6',
            ],
            [
                'disease_id' => '2',
                'symptom_id' => '3',
                'mb' => '1',
                'md' => '0.4',
                'cf' => '0.6',
            ],
            [
                'disease_id' => '2',
                'symptom_id' => '4',
                'mb' => '1',
                'md' => '0.2',
                'cf' => '0.8',
            ],
            [
                'disease_id' => '2',
                'symptom_id' => '5',
                'mb' => '1',
                'md' => '0.2',
                'cf' => '0.8',
            ],
            [
                'disease_id' => '2',
                'symptom_id' => '6',
                'mb' => '1',
                'md' => '0.2',
                'cf' => '0.8',
            ],
            [
                'disease_id' => '2',
                'symptom_id' => '9',
                'mb' => '0.6',
                'md' => '0.4',
                'cf' => '0.2',
            ],
            [
                'disease_id' => '2',
                'symptom_id' => '10',
                'mb' => '0.6',
                'md' => '0.4',
                'cf' => '0.2',
            ],
            [
                'disease_id' => '2',
                'symptom_id' => '15',
                'mb' => '1',
                'md' => '0.2',
                'cf' => '0.8',
            ],
            [
                'disease_id' => '2',
                'symptom_id' => '16',
                'mb' => '0.6',
                'md' => '0.4',
                'cf' => '0.2',
            ],
            [
                'disease_id' => '2',
                'symptom_id' => '18',
                'mb' => '1',
                'md' => '0.2',
                'cf' => '0.8',
            ],
            // Nekrosis Pulpa
            [
                'disease_id' => '3',
                'symptom_id' => '6',
                'mb' => '1',
                'md' => '0.2',
                'cf' => '0.8',
            ],
            [
                'disease_id' => '3',
                'symptom_id' => '7',
                'mb' => '0.6',
                'md' => '0.4',
                'cf' => '0.2',
            ],
            [
                'disease_id' => '3',
                'symptom_id' => '8',
                'mb' => '0.6',
                'md' => '0.4',
                'cf' => '0.2',
            ],
            [
                'disease_id' => '3',
                'symptom_id' => '10',
                'mb' => '0.6',
                'md' => '0.4',
                'cf' => '0.2',
            ],
            [
                'disease_id' => '3',
                'symptom_id' => '11',
                'mb' => '1',
                'md' => '0.2',
                'cf' => '0.8',
            ],
            [
                'disease_id' => '3',
                'symptom_id' => '12',
                'mb' => '1',
                'md' => '0.2',
                'cf' => '0.8',
            ],
            [
                'disease_id' => '3',
                'symptom_id' => '13',
                'mb' => '1',
                'md' => '0.6',
                'cf' => '0.4',
            ],
            [
                'disease_id' => '3',
                'symptom_id' => '17',
                'mb' => '1',
                'md' => '0.2',
                'cf' => '0.8',
            ],
            [
                'disease_id' => '3',
                'symptom_id' => '18',
                'mb' => '0.4',
                'md' => '0.6',
                'cf' => '-0.2',
            ],
        );
        foreach ($data as $datum){
            $category = new Rule(); //The Category is the model for your migration
            $category->disease_id =$datum['disease_id'];
            $category->symptom_id =$datum['symptom_id'];
            $category->mb =$datum['mb'];
            $category->md =$datum['md'];
            $category->cf =$datum['cf'];
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
        Schema::dropIfExists('rules');
    }
};
