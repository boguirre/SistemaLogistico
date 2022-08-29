<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name' =>'Empleado']);

        Permission::create(['name' => 'Modulo Productos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Modulo Pedidos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Modulo compras'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Modulo Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo Unidad de Medida'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo Proveedores'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo Empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo Areas'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo Usuarios'])->syncRoles([$role1]);
    }
}
