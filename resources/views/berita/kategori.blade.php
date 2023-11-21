<div class="d-flex align-items-center">
    <div class="avatar bg-light-{{$model->kategori->warna}} mr-1">
        <div class="avatar-content">
            <i data-feather="{{$model->kategori->icon}}"></i>
        </div>
    </div>
    <span>{{ $model->kategori->kategori }}</span>
</div>