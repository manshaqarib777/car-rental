<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DataTables;
use Validator;
use App\Models\Country;
use App\Models\Subdivision1;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
//use PragmaRX\Countries\Package\Countries;

class Division1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexDivision1Management($code)
    {
        // $countries = Subdivision1::all();
        // echo "<pre>";
        // print_r($countries);
        // die();
        return view('admin.division1.index',compact('code'));
    }
    public function division1(Request $request,$code)
    {
        $countries = Subdivision1::where('country_code',$code);

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
                                return '<div class="action-list"><select class="process select droplinks '.$class.'"><option data-val="1" value="'. route('admin.division1.status',['id1' => $data->id, 'id2' => 1]).'" '.$s.'>Active</option><<option data-val="0" value="'. route('admin.division1.status',['id1' => $data->id, 'id2' => 0]).'" '.$ns.'>Deactive</option>/select></div>';
                            })
                            ->addColumn('action', function($data) {
                                return '<div class="action-list"><a href="' . route('admin.division2',$data->code) . '"> <i class="fas fa-eye"></i>admin.division2</a><a href="' . route('admin.city',$data->code) . '"> <i class="fas fa-eye"></i>cities</a><a data-href="' . route('admin.division1.edit',$data->id) . '" class="edit" data-toggle="modal" data-target="#modal1"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin.division1.delete',$data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i>Delete</a></div>';
                            })
                            ->rawColumns(['code','name','asciiname','active','action'])
                            ->toJson();
    }
    public function createdivision1($code)
    {
        return view('admin.division1.create',compact('code')); 
    }
    public function storedivision1(Request $request)
    {
        $input=$request->all();
        $rules = [
            'name'           => ['required'],
            'asciiname'      => ['required'],
            'country_code'  => ['required'],
        ];
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $input['code']=$this->autoIncrementCode($input['country_code']);
        // echo "<pre>";
        // print_r($input);
        // die();
        $plan = Subdivision1::create($input);
        $msg = 'New Country Added Successfully.';
        return response()->json($msg); 
    }
    public function editdivision1(Request $request,$id)
    {
        $division1=Subdivision1::findOrfail($id);
        return view('admin.division1.edit',compact('division1')); 
    }
    public function updatedivision1(Request $request,$id)
    {
        $rules = [
            'name'           => ['required'],
            'asciiname'      => ['required'],
            'country_code'  => ['required'],
        ];
        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
          return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        $country=Subdivision1::findOrfail($id);    
        $input =$request->all();
        $input['code']=$this->autoIncrementCode($input['country_code']);
        $country->fill($input)->save();
        $msg = 'New Division1 Updated Successfully.';
        return response()->json($msg); 
    }
    public function deletedivision1(Request $request,$id)
    {
      
        $role=Subdivision1::findOrFail($id);
        $role->delete();
        $msg = 'Division1 Deleted Successfully.';
        return response()->json($msg);
    }
    public function status($id1,$id2)
    {
        $data = Subdivision1::findOrFail($id1);
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
        $latestAddedEntry = Subdivision1::where('country_code', $prefix)
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
