@extends('admin.layouts.app')

@section('page-information')
    <div class="page-title-box">
        <div class="page-title-right">
            <ol class="breadcrumb m-0">
                {{ Breadcrumbs::render('logs') }}
            </ol>
        </div>
    </div>
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
