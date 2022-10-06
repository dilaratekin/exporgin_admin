@extends('layouts.master')
@section('content')
    <div class="row justify-content-center align-items-center h-100" >
        <div class="col-12 col-lg-9 col-xl-7">
            <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                <div class="card-header" style="background-color:#17a2b8">
                    <h3 class="card-title" > Slider Item | Item Oluşturma Kontrol Paneli</h3>
                </div>
                <div class="card-body p-4 p-md-5" >
                    <form action="{{route('sliderItem/create')}}" method="post">
                                @csrf
                        @if(isset($sliderItem))
                        <input type="hidden" name="id" value="{{ $sliderItem->id === null ? 0 : $sliderItem->id }}">
                        @endif
                        <input type="hidden" name="group_id" value="{{$group_id}}">
                        <input type="hidden" name="desc_id" value="{{$sliderDescItem['id']}}">

                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="lang">{{_('language')}}</label>
                                        <input type="text" class="form-control" name="lang" id="lang" placeholder="{{_('language')}}" value="{{$sliderDescItem['lang'] ?? ''}}">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="title">{{_('title')}}</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="{{_('title')}}" value="{{$sliderDescItem['title'] ?? ''}}">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="_content">{{_('content')}}</label>
                                        <input type="text" class="form-control" name="_content" id="_content" placeholder="{{_('_content')}}" value="{{$sliderDescItem['content'] ?? ''}}">
                                    </div>

                                </div>


                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label for="thumb_url">{{_('thumb_url')}}</label>
                                        <input type="Text" class="form-control" name="thumb_url" id="thumb_url" placeholder="{{_('thumb_url')}}" value="{{$sliderDescItem['thumb_url'] ?? ''}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="image_url">{{_('image_url')}}</label>
                                        <input type="Text" class="form-control" name="image_url" id="image_url" placeholder="{{_('image_url')}}" value="{{$sliderDescItem['image_url'] ?? ''}}">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="background_url">{{_('background_url')}}</label>
                                        <input type="Text" class="form-control" name="background_url" id="background_url" placeholder="{{_('background_url')}}" value="{{$sliderDescItem['background_url'] ?? ''}}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="target_link">{{_('target_link')}}</label>
                                        <input type="text" class="form-control" name="target_link" id="target_link" placeholder="{{_('target_link')}}" value="{{$sliderDescItem['target_link'] ?? ''}}">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="sort">{{_('sort')}}</label>
                                        <input type="text" class="form-control" name="sort" id="sort" placeholder="{{_('sort')}}" value="{{$sliderItem->sort ?? ''}}">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-info ">{{_('Güncelle')}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


