<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title')->comment('Judul blog');
            $table->unsignedBigInteger('user_id')->comment('Foreign key');
            $table->unsignedBigInteger('category_id')->comment('Foreign key');
            $table->text('body')->comment('isi artikel');
            $table->softDeletes();
            $table->timestamps();


            /**
             * CATATAN database migration :
             * 
             * method nullable() 
             * digunakan untuk membolehkan kolom tabel boleh dikosongkan atau tidak di isi
             * Apabila tidak diberikan nullable() kolom wajib berisi data baik itu string atau integer (nomor)
             * 
             *
             * 
             */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
