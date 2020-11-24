@extends("layouts.master")


@section('content-header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">{{ __('menu.dashboard') }}</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">{{ __('menu.home') }}</a></li>
                    <li class="breadcrumb-item active">{{ __('menu.dashboard') }}</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection

@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $personCount[0]->count + $personCount[1]->count }}</h3>

                        <p>Washarika {{ '(Me ' . $personCount[1]->count . ', Ke ' . $personCount[0]->count . ')' }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('people.index') }}" class="small-box-footer">{{ __('menu.moreinfo') }} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $dependants[0]->total + $dependants[1]->total }}</h3>

                        <p>{{ __('menu.dependents') }} {{ '(Me ' . $dependants[1]->total . ', Ke ' . $dependants[0]->total . ')' }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="" class="small-box-footer">{{ __('menu.moreinfo') }} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $groupCount }}</h3>

                        <p>{{ __('menu.groups') }}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('services.index') }}" class="small-box-footer">{{ __('menu.moreinfo') }} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $event }}</h3>

                        <p>{{ __('menu.events') }} </p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('events.index') }}" class="small-box-footer">{{ __('menu.moreinfo') }} <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-6">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-chart-bar"></i> {{ __('menu.memberpos') }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <label class="col-lg-5">Nafasi </label>
                            <label class="col-lg-5">Asilimia (%) </label>
                            <label class="col-lg-2">Idadi </label>
                        </div>

                        @foreach ($classification as $c)
                            <div class="row">
                                <div class="col-lg-5">{{ $c->name }} </div>
                                <div class="col-lg-5">
                                    <div class="progress mb-3">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                            style="width: {{ ($c->total / ($personCount[0]->count + $personCount[1]->count)) * 100 }}%"> </div>
                                    </div>

                                </div>
                                <div class="col-lg-2">{{ $c->total }} </div>
                            </div>
                        @endforeach

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-md-6">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"> <i class="fas fa-chart-bar"></i> {{ __('menu.memberage') }}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="stackedBarChart" style="min-height: 200px; height: 200px; max-height: 200px; max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title"> <i class="fas fa-chart-bar"></i> {{ __('members.attendancedash') }}</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="chart">
                            <canvas id="attendancetrend" style="min-height: 250px; height: 250px;   max-width: 100%;"></canvas>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>




    </div><!-- /.container-fluid -->
@endsection

@push('page_scripts')

    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

    <script>
        $(function() {

            // console.log(@json($ageCategory));
            var males = [];
            var females = [];

            $.each(@json($ageCategory[0]), function(key, value) {
                if (value != 'Ke') {
                    females.push(value);
                }
            });
            $.each(@json($ageCategory[1]), function(key, value) {
                if (value != 'Me') {
                    males.push(value);
                }
            });


            var chartData = {
                labels: ['Under 10', '10 - 19', '20 - 29', '30 - 39', '40 - 49', '50 - 59', '60 - 69', '70 - 79', 'Over 80'],
                datasets: [{
                        label: 'Wanaume',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        data: males
                    },
                    {
                        label: 'Wanawake',
                        backgroundColor: 'rgba(66, 138, 107, 1)',
                        borderColor: 'rgba(66, 138, 107, 1)',
                        data: females
                    },
                ]
            }


            var chartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }

            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: chartData,
                options: chartOptions
            })

        })

    </script>
    <script>
        var attendance = @json($attendance);
     
        datasets = [];
        labels = [];

        for (line = 1; line < 4; line++) {
            pointset = {};
            pointset.backgroundColor = 'transparent';
            pointset.borderColor = getRandomColor();
            pointset.pointBorderColor = getRandomColor();
            pointset.pointBackgroundColor = getRandomColor();
            pointset.fill = false;
            data = [];

            $.each(@json($attendance), function(key, value) {
                if (line == value.id) {
                    pointset.label = value.title;
                    data.push(value.total);
                    if ($.inArray(value.date, labels) < 0) {
                        labels.push(value.date)
                    }

                }
            });
            if (data.length) {
                pointset.data = data;
                pointset.labels = labels;
                datasets.push(pointset);
            }

            
        }
        var chartOptions = {
            legend: {
                display: true,
                position: 'top',

            }
        };
  

        var $attendanceChart = $('#attendancetrend')

        var attendanceChart = new Chart($attendanceChart, {
            type: 'line',
            data: {
                labels: labels,
                datasets: datasets
            },
            options: chartOptions
        });

    



        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }

    </script>


@endpush
