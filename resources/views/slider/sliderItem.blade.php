@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Item | Kontrol Paneli</h3>
                </div>
                <div class="card-body">
                    <div class="table_container" id="item">
                        <div class="text-right pb-3">
                            <a href="{{route('sliderItem/controlID',['group_id'=>$id,'lang'=>$lang])}}" class="btn btn-info btn-sm"><i class="fas fa-plus"></i></a>
                        </div>
                        <table class="table  table-hover" id="item_table"
                               data-url="{{route('sliderItem/show',['id'=>$id,'lang'=>$lang])}}"
                               data-template="#">
                            <thead>
                            <tr>
                                <th>{{ _('ID') }}</th>
                                <th>{{ _('lang') }}</th>
                                <th>{{ _('image_url') }}</th>
                                <th>{{ _('background_url') }}</th>
                                <th>{{ _('thumb_url') }}</th>
                                <th>{{ _('title') }}</th>
                                <th>{{ _('content') }}</th>
                                <th>{{ _('target_link') }}</th>
                                <th>{{ _('edit') }}</th>
                                <th>{{ _('delete') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
