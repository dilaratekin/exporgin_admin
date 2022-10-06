<?php

namespace App\Http\Controllers;

use App\Models\SliderItem;
use App\Models\SliderItemDescription;
use Illuminate\Http\Request;

class SliderItemController extends Controller
{

    public function index($id, $lang)
    {
        $itemData = SliderItem::where('group_id', $id)->get();
        return view("slider.sliderItem", compact('itemData'))->with(['id' => $id, 'lang' => $lang]);
    }


    public function controlID(Request $request, $id = 0, $lang = 'TR', $group_id = '')
    {

        if ($id != 0) {
            $sliderItem = SliderItem::with(['getSliderItem' => function ($q) use ($lang) {
                $q->where('lang', $lang);
            }])->find($id);

            if ($sliderItem === null) {
                return redirect()->back()->withErrors(['item bulunamadı.']);
            }

            $array = $sliderItem->getSliderItem->toArray()[0];
            $data = [
                'sliderItem' => $sliderItem,
                'sliderDescItem' => $array,
                'group_id' => $request->group_id,
            ];
            return view('slider.slider_create', $data);
        }

        $data = [
            'group_id' => $group_id,
        ];
        return view('slider.slider_create', $data);

    }


    public function create(Request $request )
    {

        $request->validate([
            'group_id' => 'required',
            'sort' => 'required',
            'lang' => 'required',
            'image_url' => 'required',
            'background_url' => 'required',
            'thumb_url' => 'required',
        ]);
        try {
            $ItemModel = new SliderItem();
            if ($request->get('id', 0) != 0) {
                $ItemModel = SliderItem::find($request->get('id'));
                if ($ItemModel === null) {
                    return redirect()->back()->withErrors(['İlgili item bulunamadı.']);
                }
            }

            $ItemModel->group_id = $request->group_id;
            $ItemModel->sort = $request->sort;
            $ItemModel->save();

            if (isset($request->desc_id)) {
                $ItemDesModel = (new SliderItemDescription)->find($request->desc_id);
            }else{
                $ItemDesModel = new SliderItemDescription();
            }

            $ItemDesModel->item_id = $ItemModel->id;
            $ItemDesModel->content = $request->_content;
            $ItemDesModel->lang = $request->lang;
            $ItemDesModel->image_url = $request->image_url;
            $ItemDesModel->background_url = $request->background_url;
            $ItemDesModel->thumb_url = $request->thumb_url;
            $ItemDesModel->title = $request->title;
            $ItemDesModel->target_link = $request->target_link;

            $ItemDesModel->save();
            return redirect('sliderItem/index/' . $request->group_id . '/' . $request->lang . '/')->with('message', 'Eklendi!');

        } catch (\Exception $e) {

            dd("reportException", $e->getLine(), $e->getFile(), $e->getmessage());

        }


    }


    /*
            return redirect()->route('faq_data')->with('message', ($request->get('id', 0) != 0 ? 'Başarıyla Düzenlendi' : 'Başarıyla Eklendi!'));*/


    public function delete($id)
    {

        try {
            SliderItem::where('id', $id)->delete();
            SliderItemDescription::where('item_id', $id)->delete();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect('sliderItem/index/1/TR')->with('message', 'Silindi!');

    }

    public function store(Request $request)
    {
        //
    }

    public function show(Request $requests, $id, $lang)
    {
        $item_list = SliderItem::where('group_id', $id)->with(['getSliderItem' => function ($q) use ($lang) {
            $q->where('lang', $lang);
        }])->get();

        $newList = $item_list->toArray();
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

}
