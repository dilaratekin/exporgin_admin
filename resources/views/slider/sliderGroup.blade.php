@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Slider Group| Kontrol Paneli</h3>
                </div>

                <div class="card-body">
                    <div class="table_container" id="sliderGroup">
                        <table class="table  table-hover" id="sliderGroup_table"
                               data-url="{{route('sliderGroup/show',['id'=>$id,'lang'=>$lang])}}"
                               data-template="#">
                            <thead>
                            <tr>
                                <th>{{_('id')}}</th>
                              <th>{{_('name')}}</th>
                              <th>{{_('lang')}}</th>
                                <th>{{_('option')}}</th>
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
    </div>

@endsection
