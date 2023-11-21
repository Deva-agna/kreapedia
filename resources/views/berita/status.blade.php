<div class="d-flex align-items-center">
    @if($model->status)
    <span class="badge badge-pill badge-light-info mr-1">Published</span>
    @else
    <span class="badge badge-pill badge-light-warning mr-1">Pending</span>
    @endif
    <div class="dropdown">
        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
            <i data-feather='chevron-down'></i>
        </button>
        <div class="dropdown-menu">
            @if($model->status)
            <form id="form-status{{$model->id}}" action="{{ route('berita.status', $model->slug) }}" method="post">
                @csrf
                @method('patch')
                <input type="hidden" name="status" value="0">
                <button type="button" data-id="{{$model->id}}" class="dropdown-item w-100" id="btn-status">
                    <i data-feather='eye-off'></i>
                    <span>Pending</span>
                </button>
            </form>
            @else
            <form id="form-status{{$model->id}}" action="{{ route('berita.status', $model->slug) }}" method="post">
                @csrf
                @method('patch')
                <input type="hidden" name="status" value="1">
                <button type="button" data-id="{{$model->id}}" class="dropdown-item w-100" id="btn-status">
                    <i data-feather='upload-cloud'></i>
                    <span>Published</span>
                </button>
            </form>
            @endif
        </div>
    </div>
</div>