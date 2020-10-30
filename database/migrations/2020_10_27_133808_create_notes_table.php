<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->text('body');
            $table->timestamps();
            $table->softDeletes();
        });

        User::create([
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => '$2y$10$Q7hi.IQlFFY3A96BJveDtOPQ9Nf40i2Vf4QV0g8IoDYA8RZtgTD06'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');

        $user = User::where('email', 'test@test.com');
        $user->delete();        
    }
}
