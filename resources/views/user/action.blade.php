<div class="dropdown">
    <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
        <i class="fa-solid fa-ellipsis-vertical"></i>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="{{ route('user.edit', $model->slug) }}">
            <i class="fa-solid fa-pencil"></i>
            <span>Edit</span>
        </a>
        <form id="form-reset{{$model->id}}" action="{{ route('user.reset.pass', $model->slug) }}" method="post">
            @csrf
            @method('patch')
            <button type="button" data-id="{{$model->id}}" class="dropdown-item w-100" id="btn-reset">
                <i data-feather='key'></i>
                <span>Reset Pass</span>
            </button>
        </form>
        @if(!$model->userActive)
        <form id="form-delete{{$model->id}}" action="{{ route('user.destroy', $model->slug) }}" method="post">
            @csrf
            @method('delete')
            <button type="button" data-id="{{$model->id}}" class="dropdown-item w-100" id="btn-hapus">
                <i class="fa-regular fa-trash-can"></i>
                <span>Delete</span>
            </button>
        </form>
        @endif
    </div>
</div>