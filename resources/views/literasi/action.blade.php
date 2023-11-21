<div class="dropdown">
    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
        <i data-feather="more-vertical"></i>
    </button>
    <div class="dropdown-menu">
        <button data-id="{{ $model->id }}" class="btn-preview dropdown-item w-100" type="button">
            <i data-feather='eye'></i>
            <span>Preview</span>
        </button>
        @if(!$model->status)
        <a class="dropdown-item" href="{{ route('literasi.edit', $model->slug) }}">
            <i data-feather="edit-2"></i>
            <span>Edit</span>
        </a>
        <form id="form-delete{{$model->id}}" action="{{ route('literasi.destroy', $model->slug) }}" method="post">
            @csrf
            @method('delete')
            <button type="button" data-id="{{$model->id}}" class="dropdown-item w-100" id="btn-hapus">
                <i data-feather='trash'></i>
                <span>Delete</span>
            </button>
        </form>
        @endif
    </div>
</div>