<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DataTables;
use Illuminate\Validation\Rule;
use Validator;
use Illuminate\Support\Facades\Input;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexRoleManagement()
    {
        return view('admin.role.index');
    }
    public function roles(Request $request)
    {
        $roles = Role::all();
        
        return Datatables::of($roles)
                            ->addColumn('name', function($data) {
                                return '<strong>'.$data->name.'</strong>';
                            })
                            ->addColumn('action', function($data) {
                                return '<div class="action-list"><a data-href="' . route('admin.role.edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin.role.delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            })
                            ->rawColumns(['name','action'])
                            ->toJson();
    }
    public function createrole()
    {
        return view('admin.role.create'); 
    }
    public function storerole(Request $request)
    {
        $rules = [
            'name' => 'required|string|unique:roles',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $role=Role::create(['name'=>$request->name]);
        $msg = 'New Role Added Successfully.';
        return response()->json($msg); 
    }
    public function editrole(Request $request,$id)
    {
        $role=Role::findOrfail($id);
        return view('admin.role.edit', compact('role')); 
    }
    public function updaterole(Request $request,$id)
    {
        $rules = [
            'name' => ['required','string',Rule::unique('roles')->ignore($id)],
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $role=Role::findOrfail($id);
        $role->name=$request->name;
        $role->update();
        $msg = 'New Role Updated Successfully.';
        return response()->json($msg); 
    }
    public function deleterole(Request $request,$id)
    {
      
        $role=Role::findOrFail($id);
        $role->delete();
        $msg = 'Role Deleted Successfully.';
        return response()->json($msg);
    }
}
