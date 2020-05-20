<div class="table-action-buttons">
    {{-- <a class="view button button-box button-xs button-primary" href="invoice-details.html"><i class="zmdi zmdi-more"></i></a> --}}
    {{-- <a class="btn btn-primary btn-sm" href="{{route('team.imgView', $model->id)}}"><i class="fas fa-image"></i></a> --}}
    <a class="btn btn-info btn-sm" href="{{route('team.player', $id)}}"><i class="fa fa-user"></i></a>
    <a class="btn btn-primary btn-sm" href="{{route('team.edit', $id)}}"><i class="fa fa-edit"></i></a>
    <form action="{{route('team.destroy', $id)}}"
        onsubmit="return confirm('Are you sure?')" class="d-inline"
        method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">

        <button type="submit" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button>
    </form>
    {{-- <a class="delete button button-box button-xs button-danger" href="#"><i class="zmdi zmdi-delete"></i></a> --}}
</div>