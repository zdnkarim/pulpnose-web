<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Symptom;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('symptoms', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->timestamps();
        });

        $data =  array(
            [
                'code' => 'S01',
                'name' => 'Rasa sakit tajam yang hanya sebentar',
            ],
            [
                'code' => 'S02',
                'name' => 'Sensitif terhadap makanan manis atau masam',
            ],
            [
                'code' => 'S03',
                'name' => 'Sensitif terhadap dingin atau panas',
            ],
            [
                'code' => 'S04',
                'name' => 'Nyeri spontan atau nyeri datang tiba-tiba',
            ],
            [
                'code' => 'S05',
                'name' => 'Mempunyai riwayat sakit gigi yang berlangsung lama',
            ],
            [
                'code' => 'S06',
                'name' => 'Terdapat lubang pada gigi',
            ],
            [
                'code' => 'S07',
                'name' => 'Bila mengunyah timbul rasa nyeri',
            ],
            [
                'code' => 'S08',
                'name' => 'Demam',
            ],
            [
                'code' => 'S09',
                'name' => 'Gusi mudah mengalami pendarahan',
            ],
            [
                'code' => 'S10',
                'name' => 'Pembengkakan pada gusi',
            ],
            [
                'code' => 'S11',
                'name' => 'Saat ini tidak ada nyeri',
            ],
            [
                'code' => 'S12',
                'name' => 'Pembusukan gigi',
            ],
            [
                'code' => 'S13',
                'name' => 'Berlubang besar',
            ],
            [
                'code' => 'S14',
                'name' => 'Sensitif terhadap udara dingin',
            ],
            [
                'code' => 'S15',
                'name' => 'Mengganggu tidur malam',
            ],
            [
                'code' => 'S16',
                'name' => 'Sakit kepala',
            ],
            [
                'code' => 'S17',
                'name' => 'Berwarna kehitaman',
            ],
            [
                'code' => 'S18',
                'name' => 'Nyeri',
            ],
        );
        foreach ($data as $datum){
            $category = new Symptom(); //The Category is the model for your migration
            $category->name =$datum['name'];
            $category->code =$datum['code'];
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
        Schema::dropIfExists('symptoms');
    }
};
