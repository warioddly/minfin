<div class="row justify-content-between">
    <div class="col-12 col-md-12 col-lg-8">
        <x-data-table
            :items="$ChildPages"
            :excepts="['updated_at', 'id', 'icon', 'parent_id', 'description', 'type', 'content']"
            :links="['', 'show-child-pages', null, null]"
            :actions="$userCanActions"
            :showLinks="$parentId"
        ></x-data-table>
    </div>
    <div class="col col-md-12 col-lg-4 mt-3">
        <div class="border p-1 pt-2 mt-4 mt-lg-0 rounded" >
            <x-page-to-tree
                :pageIs="$parentId"
            ></x-page-to-tree>
        </div>
    </div>
</div>
