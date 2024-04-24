<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Type;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    private $permissions = [
        'author-list',
        'author-create',
        'author-edit',
        'author-delete',
        'book-list',
        'book-create',
        'book-edit',
        'book-delete',
        'role-list',
        'role-create',
        'role-edit',
        'role-delete',
        'type-list',
        'type-create',
        'type-edit',
        'type-delete',
        'user-list',
        'user-create',
        'user-edit',
        'user-delete',
    ];

    private $booktypes = [
        'Fiksi',
        'Non Fiksi',
    ];

    private $authors = [
        'Quraish Shihab',
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        foreach ($this->permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $user = User::create([
            'name' => 'Administrator',
            'email' => 'admin@this.app',
            'password' => Hash::make('password'),
        ]);

        $role = Role::create(['name' => 'Administrator']);

        $permissions = Permission::pluck('id', 'id')->all();

        $role->syncPermissions($permissions);

        $user->assignRole([$role->id]);

        foreach ($this->booktypes as $booktype) {
            Type::create(['name' => $booktype]);
        }

        foreach ($this->authors as $author) {
            Author::create(['name' => $author]);
        }
    }

}
