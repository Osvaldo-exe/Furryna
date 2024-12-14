<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->id();
            $table->string('subject'); // Subjek mail
            $table->text('body'); // Isi mail
            $table->string('recipient_email'); // Email penerima
            $table->string('sender_email'); // Email pengirim
            $table->timestamps(); // Timestamps created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('mails');
    }
};
