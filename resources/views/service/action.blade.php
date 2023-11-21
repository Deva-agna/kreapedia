<div class="dropdown">
    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
        <i data-feather="more-vertical"></i>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('sub.service', $model->slug) }}">
            <i data-feather='plus'></i>
            <span>Sub Layanan</span>
        </a>
        <a class="dropdown-item" href="{{ route('service.edit', $model->slug) }}">
            <i data-feather="edit-2"></i>
            <span>Edit</span>
        </a>
        @if(!$model->status)
        <form id="form-delete{{$model->id}}" action="{{ route('service.destroy', $model->slug) }}" method="post">
            @csrf
            @method('delete')
            <button type="button" data-id="{{$model->id}}" class="dropdown-item w-100" id="btn-hapus">
                <i data-feather='trash'></i>
                <span>Delete</span>
            </button>
        </form>
        @endif
        @if($model->status)
        <form id="form-status{{$model->id}}" action="{{ route('service.status', $model->slug) }}" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="status" value="0">
            <button type="button" data-id="{{$model->id}}" class="dropdown-item w-100" id="btn-status">
                <i data-feather='eye-off'></i>
                <span>Non-Active</span>
            </button>
        </form>
        @else
        <form id="form-status{{$model->id}}" action="{{ route('service.status', $model->slug) }}" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="status" value="1">
            <button type="button" data-id="{{$model->id}}" class="dropdown-item w-100" id="btn-status">
                <i data-feather='eye'></i>
                <span>Active</span>
            </button>
        </form>
        @endif
    </div>
</div>