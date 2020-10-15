<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Specification;
use App\Models\Category;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Validator;
use Datatables;
use Spatie\Permission\Models\Role as Role1;
use Spatie\Permission\Models\Permission;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    //*** JSON Request
    public function datatables()
    {
         $datas = User::orderBy('id','desc')->where('type',1)->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->addColumn('first_name', function(User $data) {
                                return '<strong>'.$data->first_name.'</strong>';
                            })
                            ->addColumn('username', function(User $data) {
                                return '<span>'.$data->username.'</span>';
                            })
                            ->addColumn('email', function(User $data) {
                                return '<span>'.$data->email.'</span>';
                            })
                            ->addColumn('phone', function(User $data) {
                                return '<span>'.$data->phone.'</span>';
                            })
                            ->addColumn('action', function(User $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-user-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a></div>';
                            })
                            ->rawColumns(['first_name','username','email','phone','status', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.user.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.user.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'title' => 'required|max:255',
            'currency' => 'required|max:30',
            'currency_code' => 'required',
            'price' => 'nullable|numeric',
            'days' => 'nullable|integer',
            'type' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $input = $request->all();

        $user = User::create($input);

        //--- Redirect Section
        $msg = 'New User Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = User::findOrFail($id);
        $cats = Category::where('status', 1)->get();
        return view('admin.user.edit',compact('data', 'cats'));
    }

    public function uploadPropic(Request $request)

    {
        //--- Validation Section
        $rules = [
          'image' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        $user = User::find($request->user_id);

        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $image_name = time().'.png';

        $path = 'assets/user/propics/'.$image_name;
        file_put_contents($path, $image);

        @unlink('assets/user/propics/'.$user->image);

        $user->image = $image_name;
        $user->save();

        return response()->json(['status'=>true]);

    }

    public function update(Request $request)
    {
      $rules = [
        'first_name' => 'required',
        'last_name' => 'required',
        'about' => 'nullable|max:300'
      ];

      $validator = Validator::make($request->all(), $rules);

      if ($validator->fails()) {
        return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
      }

      $in = $request->all();
      $user = User::find($request->user_id);
      $user->fill($in)->save();

      $msg = 'Data Updated Successfully.';
      return response()->json($msg);
    }

    //*** GET Request Status
    public function status($id1,$id2)
    {
        $data = User::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }
    public function indexRoleManagement()
    {
        return view('admin.rolemanagement.index');
    }
    public function rolemanagement(Request $request)
    {
        $roles = Role1::all();
        $permissions=Permission::all();
        foreach ($roles as $key => $value) {
            $value['permissions']=implode(',', $value->permissions()->pluck('name')->toArray());
            $value['users']=count($value->users()->pluck('id')->toArray());
        }
         return Datatables::of($roles)
                            ->addColumn('name', function($data) {
                                return '<strong>'.$data->name.'</strong>';
                            })
                            ->addColumn('permissions', function($data) {
                                return '<span>'.$data->permissions.'</span>';
                            })
                            ->addColumn('users', function($data) {
                                return '<span>'.$data->users.'</span>';
                            })
                            ->addColumn('action', function($data) {
                                return '<div class="action-list"><a data-href="' . route('admin.manage.role.edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin.manage.role.delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            })
                            ->rawColumns(['name','permissions','users', 'action'])
                            ->toJson();
    }
    public function createrole()
    {
        $permissions=Permission::all();
        return view('admin.rolemanagement.create', compact('permissions')); 
    }
    public function storerole(Request $request)
    {
        $rules = [
            'name' => 'required|string|unique:roles',
            'permissions' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $role=Role1::create(['name'=>$request->name]);
        $role->permissions()->sync($request->permissions);
        $msg = 'New Role Added Successfully.';
        return response()->json($msg); 
    }
    public function editrole(Request $request,$id)
    {
        $role=Role1::findOrfail($id);
        $permissions=$role->permissions()->pluck('id')->toArray();
        $allpermissions=Permission::all();    
        return view('admin.rolemanagement.edit', compact('allpermissions','role','permissions')); 
    }
    public function updaterole(Request $request,$id)
    {
        $rules = [
            'name' => [
                        'required','string',Rule::unique('roles')->ignore($id)],
            'permissions' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
         if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $role=Role1::findOrfail($id);
        $role->permissions()->sync($request->permissions);
        $role->name=$request->name;
        $role->update();
        $msg = 'New Role Updated Successfully.';
        return response()->json($msg); 
    }
    public function deleterole(Request $request,$id)
    {
      
        $role=Role1::findOrFail($id);
        $role->delete();
        $msg = 'Role Deleted Successfully.';
        return response()->json($msg);
    }
}
