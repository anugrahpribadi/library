<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;

class ACLController extends Controller
{
    /**
     * Get permission list page.
     *
     * @return View
     */
    public function permissionList()
    {
        return view('acl.permission-list');
    }

    /**
     * Get JSON data for table.
     *
     * @return Response
     */
    public function permissionData()
    {
        $query = Permission::orderBy('id', 'desc')->select([
            'id', 
            'name', 
        ]);

        return Datatables::of($query)->addColumn('has_role', function($item){
            return $item->roles->pluck('name')->implode(', ');
        })->make();
    }

    /**
     * Show role list page.
     *
     * @return View
     */
    public function roleList()
    {
        return view('acl.role-list');
    }

    /**
     * Role JSON Data for Table.
     *
     * @return Response
     */
    public function roleData()
    {
        $query = Role::orderBy('id', 'desc')->select([
            'id', 
            'name', 
        ]);

        return Datatables::of($query)->addColumn('action', function($item){
            $string = '';
            
            if ($item->name != config('permission.super_admin')) {
                $string = '<a href="' . route('acl.role.edit', $item->id) . '"><button title="Edit" class="btn btn-icon btn-sm btn-success waves-effect waves-light" style="margin-right: 5px;"><i class="fa fa-pencil"></i></button></a>';
                $string .= '<button title="Hapus" class="btn btn-icon btn-sm btn-danger waves-effect waves-light delete"><i class="fa fa-trash"></i></button>';
                $string .= '<form action="' . route('acl.role.destroy', $item->id) . '" method="POST">' . method_field('delete') . csrf_field() . '</form>';
            }

            return $string;
        })->rawColumns(['action'])->make();
    }

    /**
     * Show create role form.
     *
     * @return View
     */
    public function createRole()
    {
        $data['permissions'] = Permission::whereNull('parent_id')->get(['id', 'name']);

        return view('acl.role-form', $data);
    }

    /**
     * Show edit role form.
     *
     * @return View
     */
    public function editRole()
    {
        $data['permissions'] = Permission::whereNull('parent_id')->get(['id', 'name']);
        $data['object'] = Role::findOrFail(request()->id);

        return view('acl.role-form', $data);
    }

    /**
     * Update role.
     *
     * @param RoleRequest $request
     * 
     * @return Response
     */
    public function updateRole(RoleRequest $request)
    {
        $posted = $request->all();
        $role = Role::findOrFail(request()->id);

        \DB::transaction(function() use($posted, $role) {
            $role->update([
                'name' => $posted['name']
            ]);

            $role->permissions()->detach();
            if (isset($posted['permissions']) && count($posted['permissions']) > 0) {
                foreach ($posted['permissions'] as $permissionId) {
                    $role->givePermissionTo(intval($permissionId));
                }
            }
        });

        return redirect()->back()->with('status', 'Role berhasil disimpan.');
    }

    /**
     * Store Role to Database.
     *
     * @param RoleRequest $request
     * 
     * @return Response
     */
    public function storeRole(RoleRequest $request)
    {
        $posted = $request->all();
        \DB::transaction(function() use($posted) {
            $role = Role::create([
                'name' => $posted['name']
            ]);
            if (isset($posted['permissions']) && count($posted['permissions']) > 0) {
                foreach ($posted['permissions'] as $permissionId) {
                    $role->givePermissionTo(intval($permissionId));
                }
            }
        });

        return redirect()->back()->with('status', 'Role berhasil dibuat.');
    }

    /**
     * Delete role.
     *
     * @return Response
     */
    public function deleteRole()
    {
        $role = Role::findOrFail(request()->id);
        $role->delete();

        return redirect()->back()->with('status', 'Role berhasil dihapus.');
    }
}

