<div class="d-flex align-items-center">
    @if($model->status)
    <div class="avatar bg-light-info rounded">
        <div class="avatar-content">
            <i data-feather='eye'></i>
        </div>
    </div>
    @else
    <div class="avatar bg-light-warning rounded">
        <div class="avatar-content">
            <i data-feather='eye-off'></i>
        </div>
    </div>
    @endif
</div>