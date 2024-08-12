<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Disease;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diseases', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->text('desc');
            $table->string('first_aid');
            $table->timestamps();
        });

        $data =  array(
            [
                'code' => 'D01',
                'name' => 'Pulpitis Reversibel',
                'desc' => 'Pulpitis reversibel adalah radang pulpa yang ringan. Radang hanya akan dirasakan ketika terdapat rangsangan, jika penyebab radang dihilangkan maka pulpa akan kembali normal.',
                'first_aid' => 'Segera kunjungi dokter untuk pemeriksaan lebih lanjut.',
            ],
            [
                'code' => 'D02',
                'name' => 'Pulpitis Irreversibel',
                'desc' => 'Pulpitis irreversibel adalah radang pulpa yang akan dirasakan ketika terdapat rangsangan. Namun pulpa tidak akan kembali normal meskipun penyebab radang dihilangkan.',
                'first_aid' => 'Segera kunjungi dokter untuk pemeriksaan lebih lanjut.',
            ],
            [
                'code' => 'D03',
                'name' => 'Nekrosis Pulpa',
                'desc' => 'Nekrosis pulpa adalah keadaan pulpa yang sudah mati, aliran pembuluh darah sudah tidak ada, dan syaraf pulpa sudah tidak berfungsi kembali. Oleh sebab itu pasien dengan penderita nekrosis pulpa tidak merasakan radang gigi.',
                'first_aid' => 'Segera kunjungi dokter untuk pemeriksaan lebih lanjut.',
            ],
        );
        foreach ($data as $datum){
            $category = new Disease(); //The Category is the model for your migration
            $category->name =$datum['name'];
            $category->code =$datum['code'];
            $category->desc =$datum['desc'];
            $category->first_aid =$datum['first_aid'];
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
        Schema::dropIfExists('diseases');
    }
};
