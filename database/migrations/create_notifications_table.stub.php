<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('notification_type');
            $table->string('os')->nullable();
            $table->string('version')->nullable();
            $table->boolean('required')->default(false);
            $table->timestamps();
        });
        
        Schema::create('notification_translations', function (Blueprint $table) {
            $table->id();
            $table->string('locale');
            $table->bigInteger('notification_id')->unsigned();
            $table->unique(['notification_id', 'locale']);
            $table->foreign('notification_id')->references('id')->on('notifications')->onDelete('cascade');
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
        });

        Schema::create('user_notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')
                  ->references(config('fcm.notifiable.id'))
                  ->on(config('fcm.notifiable.model'))
                  ->onDelete('cascade');
                  
            $table->unsignedBigInteger('notification_id')->nullable();
            $table->foreign('notification_id')
                  ->references('id')
                  ->on('notifications')
                  ->onDelete('cascade');

            $table->boolean('seen')->default(false);
            $table->timestamp('seen_date')->nullable();

            $table->timestamps();
        });
        
        Schema::create('login', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references(config('fcm.notifiable.id'))->on(config('fcm.notifiable.model'));
            $table->string('imei')->nullable();
            $table->string('os')->nullable();
            $table->text('token')->nullable();
            $table->string('token_expire_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login');
        Schema::dropIfExists('user_notifications');
        Schema::dropIfExists('notification_translations');
        Schema::dropIfExists('notifications');
    }
}
