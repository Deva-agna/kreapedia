<div class="dropdown">
    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
        <i data-feather="more-vertical"></i>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('testimoni.edit', $model->slug) }}">
            <i data-feather="edit-2"></i>
            <span>Edit</span>
        </a>
        @if(!$model->status)
        <form id="form-delete{{$model->id}}" action="{{ route('testimoni.destroy', $model->slug) }}" method="post">
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