<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Roles Seeder
        $superAdmin = Role::whereName(config('permission.super_admin'))->first();
        if (is_null($superAdmin)) {
            $superAdmin = Role::create([
                'name' => config('permission.super_admin')
            ]);
        }

        // Permission Seeder
        $permissions = [
            'users' => [
                'list users',
                'create users',
                'edit users',
                'delete users',
            ],
            'pinjam' => [
                'list pinjam',
                'create pinjam',
                'edit pinjam',
                'delete pinjam',
            ],
            'denda' => [
                'list denda',
                'create denda',
                'edit denda',
                'delete denda',
            ],
            'anggota' => [
                'list anggota',
                'create anggota',
                'edit anggota',
                'delete anggota',
            ],
            'lokasi' => [
                'list lokasi',
                'create lokasi',
                'edit lokasi',
                'delete lokasi',
            ],
            'kategori' => [
                'list kategori',
                'create kategori',
                'edit kategori',
                'delete kategori',
            ],
            'buku' => [
                'list buku',
                'create buku',
                'edit buku',
                'delete buku',
            ],
            'transaksi' => [
                'list transaksi',
                'create transaksi',
                'edit transaksi',
                'delete transaksi',
            ],
            'pengaturan halaman depan',
            'profile',
            'settings',
        ];

        $createdId = [];
        foreach ($permissions as $key => $item) {
            $permissionName = $key;
            if (!is_string($permissionName)) {
                $permissionName = $item;
            }

            $permission = Permission::whereName($permissionName)->first();

            if (is_null($permission)) {
                $permission = Permission::create([
                    'name' => $permissionName,
                ]);
            }
            $createdId[] = $permission->id;

            $superAdmin->givePermissionTo($permission);

            // Generate child permission
            if (is_array($item) && count($item) > 0) {
                foreach ($item as $child) {
                    $childPermission = Permission::whereName($child)->first();
                    if (is_null($childPermission)) {
                        $childPermission = Permission::create([
                            'name' => $child,
                            'parent_id' => $permission->id,
                        ]);
                    }
                    $childPermission->parent_id = $permission->id;
                    $childPermission->save();
                    $createdId[] = $childPermission->id;

                    $superAdmin->givePermissionTo($childPermission);
                }
            }
        }

        // Clean Permission
        Permission::whereNotIn('id', $createdId)->delete();
    }
}
