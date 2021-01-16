@extends("layouts.master")

@section('page_css')

@endsection

@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">  {{ __('menu.approve')}}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">  {{ __('menu.home')}}</a></li>
                    <li class="breadcrumb-item active">  {{ __('menu.members')}}</li>
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
                        <form class="form-horizontal" action="{{ route('people.search') }}" method="POST">
                             @csrf

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Tafuta Washarika </label>
                                <div class="col-sm-4">
                                    <select class="form-control select2" id="status" name="status" required>
                                        <option value="">--Chagua--</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Ambao Hawajakamlisha Taarifa</option>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Waliotuma Taarifa</option>
                                        <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Taarifa Zimekataliwa</option>

                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <button type="submit" class="btn btn-success float-right">{{ __('members.search')}}</button>
                                </div>
                                
                            </div>
                            
                        </form>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="mydatatable" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> {{ __('members.name2')}}</th>
                                    <th>{{ __('members.gender')}}</th>
                                    <th>{{ __('members.address')}}</th>
                                    <th>{{ __('members.phone')}}</th>
                                    <th>{{ __('members.arearesidential')}}</th>
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
