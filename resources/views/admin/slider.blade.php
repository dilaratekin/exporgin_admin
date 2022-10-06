@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Genel Slider  | Kontrol Paneli</h3>
                </div>
                <div class="card-body">
                    <div class="table_container" id="slider">
                        <table class="table  table-hover" id="slider_table"
                               data-url="{{ route('slider/show') }}"
                               data-template="#">
                            <thead>
                            <tr>
                                <th>{{ _('ID') }}</th>
                                <th>{{ _('Name') }}</th>
                                <th>{{ _('Destination') }}</th>
                                <th>{{ _('Edit') }}</th>
                                <th>{{ _('Delete') }}</th>
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
