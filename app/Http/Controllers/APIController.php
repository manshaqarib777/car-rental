<?php

namespace App\Http\Controllers;

use App\Models\BodyType;
use App\Models\Brand;
use App\Models\Car;
use App\Models\Category;
use App\Models\Condtion;
use App\Models\FuelType;
use App\Models\TransmissionType;
use Illuminate\Http\Request;
use Auth;
class APIController extends Controller
{

    public function view_car(Request $request)
    {

        $car = Car::findOrFail($request->id);

        $data=null;

        if ($car->admin_status == 1 && $car->status == 1) {
            $car->views = $car->views + 1;
            $car->save();

            $data['car'] = $car;

        }

        return $data;

    }


    public function search_cars(Request $request)
    {

        $data['brands'] = Brand::where('status', 1)->get();
        $data['cats'] = Category::where('status', 1)->get();
        $data['conditions'] = Condtion::where('status', 1)->get();
        $data['btypes'] = BodyType::where('status', 1)->get();
        $data['ftypes'] = FuelType::where('status', 1)->get();
        $data['ttypes'] = TransmissionType::where('status', 1)->get();

        $data['minprice'] = Car::min('regular_price');
        $data['maxprice'] = Car::max('regular_price');

        $minprice = $request->minprice;
        $maxprice = $request->maxprice;
        $category = $request->category_id;
        $brands = $request->brand_id;
        $ftype = $request->fuel_type_id;
        $ttype = $request->transmission_type_id;
        $condition = $request->condition_id;
        $sort = !empty($request->sort) ? $request->sort : 'desc';
        $view = !empty($request->view) ? $request->view : 10;
        $type = !empty($request->type) ? $request->type : 'all';

        $data['cars'] = Car::with('category')->with('brand')->with('brand_model')->with('body_type')->with('fuel_type')->with('transmission_type')->with('condtion')->when($category, function ($query, $category) {
            return $query->where('category_id', $category);
        })
            ->when($minprice, function($query, $minprice) {
                return $query->where('search_price', '>=', $minprice);
            })
            ->when($maxprice, function($query, $maxprice) {
                return $query->where('search_price', '<=', $maxprice);
            })
            ->when($brands, function($query, $brands) {
                return $query->whereIn('brand_id', $brands);
            })
            ->when($ftype, function ($query, $ftype) {
                return $query->where('fuel_type_id', $ftype);
            })
            ->when($ttype, function ($query, $ttype) {
                return $query->where('transmission_type_id', $ttype);
            })
            ->when($condition, function ($query, $condition) {
                return $query->where('condtion_id', $condition);
            })
            ->when($sort, function ($query, $sort) {
                if ($sort == 'desc') {
                    return $query->orderBy('id', 'DESC');
                } elseif ($sort == 'asc') {
                    return $query->orderBy('id', 'ASC');
                } elseif ($sort == 'price_desc') {
                    return $query->orderBy('search_price', 'DESC');
                } elseif ($sort == 'price_asc') {
                    return $query->orderBy('search_price', 'ASC');
                }
            })
            ->when($type, function ($query, $type) {
                if ($type == 'featured') {
                    return $query->where('featured', 1);
                }
            })
            ->where('status', 1)->where('admin_status', 1)->paginate($view);


        return $data;

    }

    public function all_cars()
    {

        $cars=Car::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();
        return $cars;
    }
}