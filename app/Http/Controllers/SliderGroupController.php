<?php

namespace App\Http\Controllers;

use App\Models\SliderGroup;
use Illuminate\Http\Request;

class SliderGroupController extends Controller
{

    public function index($id, $lang)
    {
        $sliderGroupList = SliderGroup::where('slider_id', $id)->get();

        return view("slider.sliderGroup", compact('sliderGroupList'))->with(['id' => $id, 'lang' => $lang]);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $requests, $id, $lang)
    {

        $groupList = SliderGroup::where('slider_id', $id)->with(['getSliderGroupDescriptions' => function ($q) use ($lang) {
            $q->where('language', $lang);
        }])->get();

        $newList = $groupList->toArray();
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

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
