<div class="row mb-2">
    @can('add-posts')
        <div class="col-sm-4">
            <a href="{{ route('page-post-create', $parentId) }}" class="btn btn-primary mb-2"><i class="mdi mdi-plus"></i> {{ __('Create') }} {{ __('post') }}</a>
        </div>
    @endcan
    <div class="col">
        <div class="text-sm-end">
            <div class="btn-group mb-3">
                <a href="{{ route('show-pages', $parentId) }}" class="btn @if($is_published == 'all')btn-primary  @else btn-light @endif">{{ __('All') }}</a>
            </div>
            <div class="btn-group mb-3 ms-1">
                <a href="{{ route('page-published-posts', [$parentId, 'published']) }}" class="btn @if($is_published == 1)btn-primary  @else btn-light @endif">{{ __('Publishes') }}</a>
                <a href="{{ route('page-published-posts', [$parentId, 'unpublished']) }}" class="btn @if($is_published == 0)btn-primary  @else btn-light @endif">{{ __('Inedited') }}</a>
            </div>
            <div class="btn-group mb-3 ms-2 d-none d-sm-inline-block">
                <a href="{{ route('post-style', 'list') }}" class="btn @if(session('postListStyle') == 'list') btn-secondary @else btn-link text-muted @endif">
                    <i class="dripicons-checklist"></i>
                </a>
            </div>
            <div class="btn-group mb-3 d-none d-sm-inline-block">
                <a href="{{ route('post-style', 'block') }}" class="btn @if(session('postListStyle') == 'block') btn-secondary @else btn-link text-muted @endif">
                    <i class="dripicons-view-apps"></i></a>
            </div>
        </div>
    </div>
</div>

@if(session('postListStyle') == 'list')
    <div class="row">
        <x-data-table
            :items="$posts"
            :excepts="['id', 'content', 'is_published', 'updated_at', 'description', 'preview_image', 'childType', 'page_id']"
            :links="['', 'post-show', 'post-edit', 'post-delete', 'id']"
            :actions="$userCanActions"
        ></x-data-table>
    </div>
@else
    <div class="row">
        <x-post-output-card :items="$posts"></x-post-output-card>
    </div>
@endif
