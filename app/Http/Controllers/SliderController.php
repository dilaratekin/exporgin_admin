<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\SliderGroup;
use App\Models\SliderItem;
use Illuminate\Http\Request;

class SliderController extends Controller
{

    /**
     * Slider içerisindeki tüm verileri getirir
     */

    public function index()
    {
        $sliderData = Slider::get();
        return view('admin.slider', [
            'sliderData' => $sliderData
        ]);
    }

    /**
     * Slider içerisindeki tüm verileri DataTable için getirir
     */

    public function show(Request $requests)
    {
        $sliders = Slider::get();
        $newList = $sliders->toArray();
        $count = count($newList);

        return [
            'status' => 200,
            "total" => $count,
            "data" => $newList,
            "draw" => $requests->draw,
            "recordsTotal" => $count,
            "recordsFiltered" => $count
        ];
    }


    public
    function create()
    {
        //
    }


    public
    function store(Request $request)
    {
        //
    }


    public
    function edit($id)
    {
        //
    }


    public
    function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        Slider::where('id',$id)->delete();
        return redirect()->route('slider/index')->with('message', 'Silindi!');
    }
}
