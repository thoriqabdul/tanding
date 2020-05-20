@extends('admin.layouts.base')

@section('content')
    <!-- Hero -->
<div class="bg-body-light">
    <div class="content content-full">
        <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
            <h1 class="flex-sm-fill h3 my-2">
                Match <small class="d-block d-sm-inline-block mt-2 mt-sm-0 font-size-base font-w400 text-muted">Menejemen Match</small>
            </h1>
            <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-alt">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item" aria-current="page">
                        <a class="#" href="">Match</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<!-- END Hero -->

<!-- Page Content -->
<div class="content">
    <!-- Your Block -->
    <div class="block">
        <div class="block-header">
            <h3 class="block-title">
                Match Data
            </h3>
            <div class="block-options">
                <a href="{{route('match.create')}}" class="btn-block-option modal-show" title="Tambah Match">
                    <i class="si si-plus"></i>Add
                </a>
            </div>
        </div>
        <div class="block-content block-content-full">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _es6/pages/be_tables_datatables.js -->
            <table class="table table-bordered table-striped table-vcenter " id="roles-table">
                
            </table>
        </div>
    </div>
    <!-- END Your Block -->
</div>
<!-- END Page Content -->
    @include('admin.layouts._modal')
@endsection

@push('js_after')
    <script>
        $(function () {
            $('#roles-table').DataTable({
                serverSide: true,
                processing: true,
                searchDelay: 1000,
                ajax: '{{ route('match.data') }}',
                columns: [
                    {data: 'home.nama', title: 'Home'},
                    {data: 'away.nama', title: 'Away'},
                    {data: 'waktu', title: 'Waktu'},
                    {data: 'home.nama_markas', title: 'Tempat'},
                    {data: 'status', title: 'Status'},
                    {data: 'action', orderable: false, searchable: false, title:'action'}
                ]
            });
        });
    </script>
    <script>
        // global app configuration object
        var config = {
            routes: {
                zone: '{{route('match.playerList')}}'
            }
        };
    </script>
    <script src="{{asset('js/modal.js')}}"></script>
@endpush