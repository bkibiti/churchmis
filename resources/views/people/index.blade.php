@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Washirika</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Nyumbani</a></li>
                    <li class="breadcrumb-item active">Washirika</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-body">
                        searc
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <a href="{{ route('people.create') }}">
                            <button type="button" class="btn btn-info float-right">
                                Ongeza Msharika
                            </button>
                        </a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="mydatatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Jina</th>
                                    <th>Jinsia</th>
                                    <th>Anuani</th>
                                    <th>Simu</th>
                                    <th>Eneo la Makazi</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($people as $p)
                                    <tr>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->gender }}</td>
                                        <td>{{ $p->address }}</td>
                                        <td>{{ $p->mobile_phone }}</td>
                                        <td>{{ $p->residential_area }}</td>
                                        <td>
                                            <a href="{{ route('people.show', $p->id) }}">
                                                <span class="badge badge-success">
                                                    <i class="fas fa-eye"></i>
                                                </span>
                                            </a>
                                            <a href="{{ route('people.edit', $p->id) }}">
                                                <span class="badge badge-primary">
                                                    <i class="fas fa-edit "></i>
                                                </span>
                                            </a>

                                            <span class="badge badge-danger">
                                                <i class="fas fa-trash"></i>
                                            </span>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>

        </div>

    </div><!-- /.container-fluid -->
@endsection

@push('page_scripts')
    @include('partials.notification')

    <script>
        $('#mydatatable').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });

    </script>

@endpush
