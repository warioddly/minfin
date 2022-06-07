<div role="alert" {{ $attributes->merge(['class' => 'alert alert-'.$alertType.' alert-dismissible fade show']) }}>
    <i class="uil-comment-info me-2"></i> {{ $message }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
