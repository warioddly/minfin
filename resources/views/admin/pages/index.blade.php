@extends('admin.layouts.app')

@section('page-information')
    <x-page-inform
        title="pages"
        :breadcrumbs="['Pages']"
    ></x-page-inform>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-12 col-md-12 col-lg-8">
                            <x-data-table
                                :items="$pages"
                                :excepts="['updated_at', 'id', 'type', 'icon', 'level', 'parent_id', 'icon_type', 'description']"
                                :links="['', 'show-pages', null, null]"
                                :actions="[null, null, null, null]"
                                :withactions="false"
                            ></x-data-table>
                        </div>
                        <div class="col col-md-12 col-lg-4 mt-3">
                            <div class="border p-3 mt-4 mt-lg-0 rounded">
                                <x-page-to-tree></x-page-to-tree>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

<x-scripts
    type="pages"
    :urls="['', '', '']"
></x-scripts>
