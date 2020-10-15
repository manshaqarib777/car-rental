<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Validator;
use Session;
use App\Models\Country;
use App\Models\Subdivision1;
use App\Models\Subdivision2;
use App\Models\City;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
//use PragmaRX\Countries\Package\Countries;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexcityManagement($code)
    {
        $country_code='';
        $subadmin1_code='';
        $subadmin2_code='';

        // echo "<pre>";
        // print_r($code);
        // die();

        $data = Country::where('code',$code)->get()->first();
        if (empty($data)) {
            $data1 = Subdivision1::where('code',$code)->get()->first();
            if (empty($data1)) {
                $data2 = Subdivision2::where('subadmin1_code',$code)->get()->first();
                $country_code=$data2['country_code'];
                $subadmin1_code=$data2['code'];
                $subadmin2_code=$data2['subadmin1_code'];
            }
            else
            {
                $country_code=$data1['country_code'];
                $subadmin1_code=$data1['code'];
                $subadmin2_code=''; 
            }   
        }
        else {
            $country_code=$data['code'];
                $subadmin1_code='';
                $subadmin2_code='';  
            
        }
        // echo "<pre>";
        // print_r($data);
        // die();
        return view('admin.city.index',compact('code','country_code','subadmin1_code','subadmin2_code'));
    }
    public function city(Request $request,$code)
    {

        $countries = City::where('country_code',$code)->orwhere('subadmin1_code',$code)->orwhere('subadmin2_code',$code)->get();
         $code=Session::put('code',$code);
        return Datatables::of($countries)
                            ->addColumn('country_code', function($data) {
                                return '<strong>'.$data->country_code.'</strong>';
                            })
                            ->addColumn('name', function($data) {
                                return '<strong>'.$data->name.'</strong>';
                            })
                            ->addColumn('asciiname', function($data) {
                                return '<strong>'.$data->asciiname.'</strong>';
                            })
                            ->addColumn('subadmin1_code', function($data) {
                                return '<strong>'.$data->subadmin1_code.'</strong>';
                            })
                            ->addColumn('subadmin2_code', function($data) {
                                return '<strong>'.$data->subadmin2_code.'</strong>';
                            })
                            ->addColumn('active', function($data) {
                                $class = $data->active == 1 ? 'drop-success' : 'drop-danger';
                                $s = $data->active == 1 ? 'selected' : '';
                                $ns = $data->active == 0 ? 'selected' : '';
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin.city.status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Active</option><<option data-val="0" value="'. route('admin.city.status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactive</option>/select></div>';
                            })
                            ->addColumn('action', function($data) {


                                return '<div class="action-list"><a data-href="' . route('admin.city.edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin.city.delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            })
                            ->rawColumns(['country_code','name','asciiname','subadmin1_code','subadmin2_code','active','action'])
                            ->toJson();
    }
    public function createcity($code)
    {
        $data = Country::where('code',$code)->get()->first();
        if (empty($data)) {
            $data1 = Subdivision1::where('code',$code)->get()->first();
            if (empty($data1)) {
                $data2 = Subdivision2::where('subadmin1_code',$code)->get()->first();
                $country_code=$data2['country_code'];
                $subadmin1_code=$data2['code'];
                $subadmin2_code=$data2['subadmin1_code'];
            }
            else
            {
                $country_code=$data1['country_code'];
                $subadmin1_code=$data1['code'];
                $subadmin2_code=''; 
            }   
        }
        else {
            $country_code=$data['code'];
                $subadmin1_code='';
                $subadmin2_code='';  
            
        }

        return view('admin.city.create',compact('code','country_code','subadmin1_code','subadmin2_code')); 
    }
    public function storecity(Request $request)
    {
        $input=$request->all();
        $data = Subdivision1::where('code',$input['subadmin1_code'])->get()->first();
        $input['country_code']=$data['country_code'];
        $rules = [
            'name'           => ['required'],
            'asciiname'      => ['required'],
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        // echo "<pre>";
        // print_r($input);
        // die();
        $plan = City::create($input);
        $msg = 'New City Added Successfully.';
        return response()->json($msg); 
    }
    public function editcity(Request $request,$id)
    {
        $city=City::findOrfail($id);
        return view('admin.city.edit',compact('city')); 
    }
    public function updatecity(Request $request,$id)
    {
        $input=$request->all();
        $data = Subdivision1::where('code',$input['subadmin1_code'])->get()->first();
        $input['country_code']=$data['country_code'];
        $rules = [
            'name'           => ['required'],
            'asciiname'      => ['required'],
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $country=City::findOrfail($id);    
        $input =$request->all();
        $country->fill($input)->save();
        $msg = 'New city Updated Successfully.';
        return response()->json($msg); 
    }
    public function deletecity(Request $request,$id)
    {
      
        $role=City::findOrFail($id);
        $role->delete();
        $msg = 'city Deleted Successfully.';
        return response()->json($msg);
    }
    public function status($id1,$id2)
    {
        $data = City::findOrFail($id1);
        $data->active = $id2;
        $data->update();
    }
    public function autoIncrementCode($prefix)
    {
        // Init.
        $startAt = 0;
        $customPrefix = config('larapen.core.locationCodePrefix', 'Z');
        $zeroLead = 3;
        
        // Get the latest Entry
        $latestAddedEntry = City::where('country_code', $prefix)
            ->where('code', 'LIKE', $prefix . $customPrefix . '%')
            ->orderBy('code', 'DESC')
            ->first();
        
        if (!empty($latestAddedEntry)) {
            $codeTab = explode($prefix, $latestAddedEntry->code);
            $latestAddedId = (isset($codeTab[1])) ? $codeTab[1] : null;
            if (!empty($latestAddedId)) {
                if (is_numeric($latestAddedId)) {
                    $newId = $latestAddedId + 1;
                } else {
                    $newId = $this->alphanumericToUniqueIncrementation($latestAddedId, $startAt, $zeroLead, $customPrefix);
                }
            } else {
                $newId = $customPrefix . $this->zeroLead($startAt + 1, $zeroLead);
            }
        } else {
            $newId = $customPrefix . $this->zeroLead($startAt + 1, $zeroLead);
        }
        
        // Full new ID
        $newId = $prefix . $newId;
        
        return $newId;
    }
    
    /**
     * Increment existing alphanumeric value by Transforming the given value
     * e.g. AB => ZZ001 => ZZ002 => ZZ003 ...
     *
     * @param $value
     * @param $startAt
     * @param $zeroLead
     * @param $customPrefix
     * @return string
     */
    public function alphanumericToUniqueIncrementation($value, $startAt, $zeroLead, $customPrefix)
    {
        if (!empty($value)) {
            // Numeric value
            if (is_numeric($value)) {
                
                $value = $customPrefix . $this->zeroLead($value + 1);
                
            } // NOT numeric value
            else {
                
                // Value contains the Custom Prefix
                if (Str::startsWith($value, $customPrefix)) {
                    
                    $prefixLoop = '';
                    $partOfValue = '';
                    
                    $tmp = explode($customPrefix, $value);
                    if (count($tmp) > 0) {
                        foreach ($tmp as $item) {
                            if (!empty($item)) {
                                $partOfValue = $item;
                                break;
                            } else {
                                $prefixLoop .= $customPrefix;
                            }
                        }
                    }
                    
                    if (!empty($partOfValue)) {
                        if (is_numeric($partOfValue)) {
                            $tmpValue = $this->zeroLead($partOfValue + 1, $zeroLead);
                        } else {
                            // If the part of the value is not numeric, Get a (sub-)new unique code
                            $tmpValue = $this->alphanumericToUniqueIncrementation($partOfValue, $startAt, $zeroLead, $customPrefix);
                        }
                    } else {
                        $tmpValue = $this->zeroLead($startAt + 1, $zeroLead);
                    }
                    
                    $value = $prefixLoop . $tmpValue;
                    
                } // Value NOT contains the Custom Prefix
                else {
                    $value = $customPrefix . $this->zeroLead($startAt + 1, $zeroLead);
                }
            }
            
        } else {
            $value = $customPrefix . $this->zeroLead($startAt + 1, $zeroLead);
        }
        
        return $value;
    }
    public function zeroLead($number, $padLength = 2)
    {
        if (is_numeric($number)) {
            $number = str_pad($number, $padLength, '0', STR_PAD_LEFT);
        }
        
        return $number;
    }
}
