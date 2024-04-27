<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Role;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        /**
         * Create roles and assign them to a user.
         *
         * This migration file creates two roles, 'admin' and 'client', and assigns the 'admin' role to a user.
         * The 'admin' role is created using the \App\Models\Role model, and the 'client' role is also created using the same model.
         * The user is created using the \App\Models\User model, with the name 'admin', email 'admin@admin.com', and password '1234'.
         * The 'admin' role is then retrieved from the database using the \App\Models\Role model, and if found, it is attached to the user.
         */
        $adminRole = new \App\Models\Role(['name' => 'admin']);
        $adminRole->save();

        $clientRole = new \App\Models\Role(['name' => 'client']);
        $clientRole->save();

        $user = new \App\Models\User([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234'),
        ]);
        $user->save();

        $role = \App\Models\Role::where('name', 'admin')->first();

        if ($role) {
            $user->roles()->attach($role);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('role_user');
    }
};
