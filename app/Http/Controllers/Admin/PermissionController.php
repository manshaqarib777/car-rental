<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use DataTables;
use Illuminate\Validation\Rule;
use Validator;
use Illuminate\Support\Facades\Input;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPermissionManagement()
    {
        return view('admin.permission.index');
    }
    public function permissions(Request $request)
    {
        $permissions = Permission::all();
        
        return Datatables::of($permissions)
                            ->addColumn('name', function($data) {
                                return '<strong>'.$data->name.'</strong>';
                            })
                            ->addColumn('action', function($data) {
                                return '<div class="action-list"><a data-href="' . route('admin.permission.edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin.permission.delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            })
                            ->rawColumns(['name','action'])
                            ->toJson();
    }
    public function createpermission()
    {
        return view('admin.permission.create'); 
    }
    public function storepermission(Request $request)
    {
        $rules = [
            'name' => 'required|string|unique:permissions',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $permission=Permission::create(['name'=>$request->name]);
        $msg = 'New Permission Added Successfully.';
        return response()->json($msg); 
    }
    public function editpermission(Request $request,$id)
    {
        $permission=Permission::findOrfail($id);
        return view('admin.permission.edit', compact('permission')); 
    }
    public function updatepermission(Request $request,$id)
    {
        $rules = [
            'name' => ['required','string',Rule::unique('permissions')->ignore($id)],
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $permission=Permission::findOrfail($id);
        $permission->name=$request->name;
        $permission->update();
        $msg = 'New Permission Updated Successfully.';
        return response()->json($msg); 
    }
    public function deletepermission(Request $request,$id)
    {
      
        $permission=Permission::findOrFail($id);
        $permission->delete();
        $msg = 'Permission Deleted Successfully.';
        return response()->json($msg);
    }
}
