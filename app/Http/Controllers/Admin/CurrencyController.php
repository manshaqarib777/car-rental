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

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexCurrencyManagement()
    {
        // $currencies = Currency::all();
        // echo "<pre>";
        // print_r($currencies);
        // die();
        return view('admin.currency.index');
    }
    public function currencies(Request $request)
    {
        $currencies = Currency::all();
        return Datatables::of($currencies)
                            ->addColumn('code', function($data) {
                                return '<strong>'.$data->code.'</strong>';
                            })
                            ->addColumn('name', function($data) {
                                return '<strong>'.$data->name.'</strong>';
                            })
                            ->addColumn('html_entity', function($data) {
                                return '<strong>'.$data->html_entity.'</strong>';
                            })
                            ->addColumn('in_left', function($data) {
                                $class = $data->in_left == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->in_left == 1 ? 'selected' : '';
                                $ns = $data->in_left == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin.currency.status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>In Left</option><<option data-val="0" value="'. route('admin.currency.status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>In Right</option>/select></div>';
                            })
                            ->addColumn('action', function($data) {
                                return '<div class="action-list"><a data-href="' . route('admin.currency.edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin.currency.delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            })
                            ->rawColumns(['code','name','html_entity','in_left','action'])
                            ->toJson();
    }
    public function createcurrency()
    {
        $continents=Continent::all();
        $currencies=Currency::all();
        return view('admin.currency.create',compact('continents','currencies')); 
    }
    public function storecurrency(Request $request)
    {
        $rules = [
            'code' => ['required', 'min:3', 'max:3'],
            'name' => ['required', 'min:2', 'max:255'],
            'font_arial'           => ['min:1', 'max:3'],
            'font_code2000'           => ['min:1', 'max:3'],
            'unicode_decimal'           => ['min:1', 'max:3'],
            'unicode_hex'           => ['min:1', 'max:3'],
            'in_left'           => ['min:1', 'max:1'],
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $input = $request->all();
        $plan = Currency::create($input);
        $msg = 'New Currency Added Successfully.';
        return response()->json($msg); 
    }
    public function editcurrency(Request $request,$id)
    {
        $currency=Currency::findOrfail($id);
        return view('admin.currency.edit',compact('currency')); 
    }
    public function updatecurrency(Request $request,$id)
    {
        $rules = [
            'code' => ['required', 'min:3', 'max:3'],
            'name' => ['required', 'min:2', 'max:255'],
            'font_arial'           => ['min:1', 'max:3'],
            'font_code2000'           => ['min:1', 'max:3'],
            'in_left'           => ['min:1', 'max:1'],
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $currency=Currency::findOrfail($id);    
        $input =$request->all();
        $currency->fill($input)->save();
        $msg = 'Currency Updated Successfully.';
        return response()->json($msg); 
    }
    public function deletecurrency(Request $request,$id)
    {
      
        $currency=Currency::findOrFail($id);
        $currency->delete();
        $msg = 'Currency Deleted Successfully.';
        return response()->json($msg);
    }
    public function status($id1,$id2)
    {
        $data = Currency::findOrFail($id1);
        $data->active = $id2;
        $data->update();
    }
}
