@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">  {{ __('menu.dependants')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">  {{ __('menu.home')}}</a></li>
                    <li class="breadcrumb-item active">  Wategemezi</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-body">
                        searc
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                      
                        <button type="button" class="btn  btn-rounded btn-icon btn-secondary float-right" 
                                    data-toggle="modal" data-target="#addMember">Ongeza Mtegemezi
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        @if ($dependants->isNotEmpty())
                        <table id="mydatatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mzazi</th>
                                    <th>Jina la Mtegemezi</th>
                                    <th>Jinsia</th>
                                    <th>Tarehe ya Kuzaliwa</th>
                                    <th>Uhusiano</th>
                                </tr>
                            </thead>
                            <tbody>
                           
                                @foreach ($dependants as $p)
                                    <tr>
                                        <td>{{ $p->parent->name }}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->gender }}</td>
                                        <td>{{$p->dob }}</td>
                                        <td>{{ $p->relationship->name }}</td>

                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    @else

                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="icon fas fa-info"></i>
                            Hakuna Wategemezi
                        </div>
                    @endif

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

        $('.select2').select2()

        $(function() {
            $('#datetimepicker1').datetimepicker({
                format: 'DD/MM/YYYY'
            });
        });

    </script>

@endpush
