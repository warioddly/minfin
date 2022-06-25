@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="Logs"
        :breadcrumbs="['Logs']"
    ></x-page-inform>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <x-data-table
                        :items="$logs"
                        :excepts="['updated_at', 'form_data', 'id', 'body']"
                        :links="[null, null, null, null]"
                        :actions="[null, null, null, null]"
                        orederable="false"
                        type="logs"
                    ></x-data-table>
                </div>
            </div>
        </div>
    </div>
@endsection

<x-scripts
    type="logs"
    :urls="['', '', '', '', '']"
></x-scripts>
