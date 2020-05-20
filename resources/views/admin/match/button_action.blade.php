<div class="table-action-buttons">
    {{-- <a class="view button button-box button-xs button-primary" href="invoice-details.html"><i class="zmdi zmdi-more"></i></a> --}}
    {{-- <a class="btn btn-primary btn-sm" href="{{route('team.imgView', $model->id)}}"><i class="fas fa-image"></i></a> --}}
    @if ($model->waktu >= \Carbon\Carbon::now())
        <a class="btn btn-primary btn-sm modal-show edit" href="{{route('match.edit', $id)}}"><i class="fa fa-edit"></i></a>
        <form action="{{route('match.destroy', $id)}}"
            onsubmit="return confirm('Are you sure?')" class="d-inline"
            method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">

            <button type="submit" class="btn btn-danger btn-sm" ><i class="fa fa-trash"></i></button>
        </form>
    @elseif ($model->score_away == null)
        <a class="btn btn-primary btn-sm modal-show edit" href="{{route('match.editScore', $id)}}">Score</a>
    @else
        <a class="btn btn-info btn-sm btn-show" href="{{route('match.detail', $id)}}">Hasil</a>
    @endif
    
    {{-- <a class="delete button button-box button-xs button-danger" href="#"><i class="zmdi zmdi-delete"></i></a> --}}
</div>