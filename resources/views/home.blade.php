@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="info-box">
                <span class="info-box-icon bg-info">
                    <i class="fas fa-virus"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ trans('messages.total_cases') }}</span>
                    <span class="info-box-number">
                        {{ $reports->last()->total_cases }}
                        <small class="text-red">
                            +{{ $reports->last()->new_cases }}
                        </small>
                    </span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="info-box">
                <span class="info-box-icon bg-danger">
                    <i class="fas fa-skull-crossbones"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ trans('messages.total_deaths') }}</span>
                    <span class="info-box-number">
                        {{ $reports->last()->total_deaths }}
                        <small class="text-red">
                            +{{ $reports->last()->new_deaths }}
                        </small>
                    </span>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex p-0">
                    <h3 class="card-title p-3">
                        {{ trans('messages.total_cases') }}
                    </h3>
                    <ul class="nav nav-pills ml-auto p-2">
                        <li class="nav-item">
                            <button class="nav-link active" data-chart="total_cases" data-axis-scale="linear">{{ trans('messages.linear') }}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-chart="total_cases" data-axis-scale="logarithmic">{{ trans('messages.logarithmic') }}</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <canvas id="total_cases"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex p-0">
                    <h3 class="card-title p-3">
                        {{ trans('messages.total_deaths') }}
                    </h3>
                    <ul class="nav nav-pills ml-auto p-2">
                        <li class="nav-item">
                            <button class="nav-link active" data-chart="total_deaths" data-axis-scale="linear">{{ trans('messages.linear') }}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-chart="total_deaths" data-axis-scale="logarithmic">{{ trans('messages.logarithmic') }}</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <canvas id="total_deaths"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex p-0">
                    <h3 class="card-title p-3">
                        {{ trans('messages.new_cases') }}
                    </h3>
                </div>
                <div class="card-body">
                    <canvas id="new_cases"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex p-0">
                    <h3 class="card-title p-3">
                        {{ trans('messages.new_deaths') }}
                    </h3>
                </div>
                <div class="card-body">
                    <canvas id="new_deaths"></canvas>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        $(document).ready(function () {
            var charts = {};
            var chartConfig = {
                linear: [{
                    type: 'linear',
                }],
                logarithmic: [{
                    type: 'logarithmic',
                    ticks: {
                        min: 0,
                        max: 10000,
                        stepSize: 100,
                        callback: function (value) {
                            return Number(value.toString());
                        }
                    },
                    afterBuildTicks: function (chart) {
                        chart.ticks = [0.1, 1, 10, 100, 1000, 10000];
                    }
                }]
            };
            var defaultOptions = {
                legend: {
                    display: false
                },
                responsive: true,
                scales: {
                    yAxes: chartConfig.linear
                }
            };
            charts.total_cases = new Chart('total_cases', {
                type: 'line',
                data: {
                    labels: @json($dateLabels),
                    datasets: [
                        {
                            label: 'Total Cases',
                            data: @json($reports->pluck('total_cases')->toArray()),
                            borderWidth: 1,
                            backgroundColor: 'rgba(0, 221, 221, 0.3)',
                            borderColor: 'rgb(0, 221, 221)',
                        },
                    ]
                },
                options: defaultOptions
            });

            new Chart('new_cases', {
                type: 'bar',
                data: {
                    labels: @json($dateLabels),
                    datasets: [
                        {
                            label: 'New Cases',
                            data: @json($reports->pluck('new_cases')->toArray()),
                            borderWidth: 1,
                            backgroundColor: 'rgba(0, 221, 221, 0.3)',
                            borderColor: 'rgb(0, 221, 221)',
                        },
                    ]
                },
                options: defaultOptions
            });

            charts.total_deaths = new Chart('total_deaths', {
                type: 'line',
                data: {
                    labels: @json($dateLabels),
                    datasets: [
                        {
                            label: 'Total Deaths',
                            data: @json($reports->pluck('total_deaths')->toArray()),
                            borderWidth: 1,
                            backgroundColor: 'rgba(221,0,35, 0.3)',
                            borderColor: 'rgb(221,0,35)',
                        },
                    ]
                },
                options: defaultOptions
            });

            new Chart('new_deaths', {
                type: 'bar',
                data: {
                    labels: @json($dateLabels),
                    datasets: [
                        {
                            label: 'New Deaths',
                            data: @json($reports->pluck('new_deaths')->toArray()),
                            borderWidth: 1,
                            backgroundColor: 'rgba(221,0,35, 0.3)',
                            borderColor: 'rgb(221,0,35)',
                        },
                    ]
                },
                options: defaultOptions
            });

            $('canvas').closest('.card').find('[data-axis-scale]').on('click', function () {
                var axisScale = $(this).data('axis-scale');
                var chart = $(this).data('chart');
                charts[chart].options.scales.yAxes = chartConfig[axisScale];
                charts[chart].update();

                $(this).closest('ul').find('button').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
@endsection
