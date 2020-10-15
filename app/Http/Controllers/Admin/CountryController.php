<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Validator;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Continent;
use Illuminate\Support\Facades\Input;
//use PragmaRX\Countries\Package\Countries;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexCountryManagement()
    {
        // $countries = Country::all();
        // echo "<pre>";
        // print_r($countries);
        // die();
        return view('admin.country.index');
    }
    public function countries(Request $request)
    {
        $countries = Country::all();
        return Datatables::of($countries)
                            ->addColumn('code', function($data) {
                                return '<strong>'.$data->code.'</strong>';
                            })
                            ->addColumn('name', function($data) {
                                return '<strong>'.$data->name.'</strong>';
                            })
                            ->addColumn('asciiname', function($data) {
                                return '<strong>'.$data->asciiname.'</strong>';
                            })
                            ->addColumn('active', function($data) {
                                $class = $data->active == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->active == 1 ? 'selected' : '';
                                $ns = $data->active == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin.country.status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Active</option><<option data-val="0" value="'. route('admin.country.status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactive</option>/select></div>';
                            })
                            ->addColumn('action', function($data) {
                                return '<div class="action-list"><a href="' . route('admin.division1',$data->code) . '"><i class="fas fa-eye"></i>admin.division1</a><a href="' . route('admin.city',$data->code) . '"> <i class="fas fa-eye"></i>cities</a><a data-href="' . route('admin.country.edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin.country.delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            })
                            ->rawColumns(['code','name','asciiname','active','action'])
                            ->toJson();
    }
    public function createcountry()
    {
        $continents=Continent::all();
        $currencies=Currency::all();
        return view('admin.country.create',compact('continents','currencies')); 
    }
    public function storecountry(Request $request)
    {
        $rules = [
            'code'           => ['required', 'min:2', 'max:2'],
            'tld'           => ['required', 'min:2', 'max:3'],
            'name'           => ['required', 'min:2', 'max:255'],
            'asciiname'      => ['required'],
            'continent_code' => ['required'],
            'currency_code'  => ['required'],
            'phone'          => ['required'],
            'languages'      => ['required'],
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $input = $request->all();
        if ($request->filled('background_image')) {
          $image = $request->background_image;
          list($type, $image) = explode(';', $image);
          list(, $image)      = explode(',', $image);
          $image = base64_decode($image);
          $image_name = uniqid().'.jpg';

          $path = 'assets/front/images/'.$image_name;
          file_put_contents($path, $image);

          $input['background_image'] = $image_name;
        }
        //--- Logic Section
        
        // echo "<pre>";
        // print_r($input);
        // die();
        $plan = Country::create($input);
        $msg = 'New Country Added Successfully.';
        return response()->json($msg); 
    }
    public function editcountry(Request $request,$id)
    {
        $continents=Continent::all();
        $currencies=Currency::all();
        $country=Country::findOrfail($id);
        return view('admin.country.edit',compact('continents','currencies','country')); 
    }
    public function updatecountry(Request $request,$id)
    {
        $rules = [
            'code'           => ['required', 'min:2', 'max:2'],
            'tld'           => ['required', 'min:2', 'max:3'],
            'name'           => ['required', 'min:2', 'max:255'],
            'asciiname'      => ['required'],
            'continent_code' => ['required'],
            'currency_code'  => ['required'],
            'phone'          => ['required'],
            'languages'      => ['required'],
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $country=Country::findOrfail($id);    
        $input =$request->all();
        if ($request->filled('background_image')) {
          $image = $request->background_image;
          list($type, $image) = explode(';', $image);
          list(, $image)      = explode(',', $image);
          $image = base64_decode($image);
          $image_name = uniqid().'.jpg';

          $path = 'assets/front/images/'.$image_name;
          file_put_contents($path, $image);
        }
        $country->fill($input)->save();
        $msg = 'New Role Updated Successfully.';
        return response()->json($msg); 
    }
    public function deletecountry(Request $request,$id)
    {
      
        $role=Country::findOrFail($id);
        $role->delete();
        $msg = 'Role Deleted Successfully.';
        return response()->json($msg);
    }
    public function status($id1,$id2)
    {
        $data = Country::findOrFail($id1);
        $data->active = $id2;
        $data->update();
    }
}
