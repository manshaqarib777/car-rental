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
use App\Models\Generalsetting as GS;
class CompanyController extends Controller
{

    //*** JSON Request
    public function datatables()
    {
         $datas = User::orderBy('id','desc')->where('type','Company')->get();
         //--- Integrating This Collection Into Datatables
         return Datatables::of($datas)
                            ->addColumn('username', function(User $data) {
                                return '<span>'.$data->username.'</span>';
                            })
                            ->addColumn('email', function(User $data) {
                                return '<span>'.$data->email.'</span>';
                            })
                            ->addColumn('phone', function(User $data) {
                                return '<span>'.$data->phone.'</span>';
                            })
                            ->addColumn('feature', function(User $data) {
                              $class = $data->featured == 1 ? 'drop-success' : 'drop-danger';
                              $s = $data->status == 1 ? 'selected' : '';
                              $ns = $data->featured == 0 ? 'selected' : '';
                              return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin.company.featured',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Feature</option><option data-val="0" value="'. route('admin.company.featured',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Unfeature</option></select></div>';
                          })
                            ->addColumn('action', function(User $data) {
                                return '<div class="action-list"><a data-href="' . route('admin-company-edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a></div>';
                            })
                            ->rawColumns(['username','email','phone','status','feature', 'action'])
                            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.company.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.company.create');
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
        return view('admin.company.edit',compact('data', 'cats'));
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
    public function featured($id1,$id2)
    {
        $gs = GS::first();
        $data = User::findOrFail($id1);
        $data->featured = $id2;
        $data->update();

        $headers = "From: $gs->from_name <$gs->from_email> \r\n";
        $headers .= "Reply-To: $gs->from_name <$gs->from_email> \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        if ($id2 == 1) {
          $message = "Your ad is featured.<br /><strong>Ad Title: </strong><a href='".url("/details/$data->id")."'>".$data->username."</a>";

          @mail($data->email,"Ad Featured", $message, $headers);
        } elseif ($id2 == 0) {
          $message = "Your ad is unfeatured.<br /><strong>Ad Title: </strong><a href='".url("/details/$data->id")."'>".$data->username."</a>";

          @mail($data->email,"Ad Unfeatured", $message, $headers);
        }
    }
}
