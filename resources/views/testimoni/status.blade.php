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
    <div class="dropdown">
        <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
            <i data-feather='chevron-down'></i>
        </button>
        <div class="dropdown-menu">
            @if($model->status)
            <form id="form-status{{$model->id}}" action="{{ route('testimoni.status', $model->slug) }}" method="post">
                @csrf
                @method('patch')
                <input type="hidden" name="status" value="0">
                <button type="button" data-id="{{$model->id}}" class="dropdown-item w-100" id="btn-status">
                    <i data-feather='eye-off'></i>
                    <span>Non-Active</span>
                </button>
            </form>
            @else
            <form id="form-status{{$model->id}}" action="{{ route('testimoni.status', $model->slug) }}" method="post">
                @csrf
                @method('patch')
                <input type="hidden" name="status" value="1">
                <button type="button" data-id="{{$model->id}}" class="dropdown-item w-100" id="btn-status">
                    <i data-feather='upload-cloud'></i>
                    <span>Active</span>
                </button>
            </form>
            @endif
        </div>
    </div>
</div>