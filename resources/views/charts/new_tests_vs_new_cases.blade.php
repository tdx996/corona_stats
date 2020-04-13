@include('layouts.head')

<style>
    .card.card-chart .card-body {
        min-height: 400px;
    }
</style>

<div class="card card-chart">
    <div class="card-body">
        <canvas id="new_tests_vs_new_cases"></canvas>
    </div>
</div>

<script src="{{ mix('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    $(document).ready(function () {
        new Chart('new_tests_vs_new_cases', {
            type: 'bar',
            data: {
                labels: @json($dateLabels),
                datasets: [
                    {
                        label: '@lang('messages.new_tests')',
                        data: @json($reports->pluck('new_tests')->toArray()),
                        borderWidth: 1,
                        yAxisID: 'A',
                        backgroundColor: 'rgba(8,130,220, 0.3)',
                        borderColor: 'rgb(8,130,220)',
                    },
                    {
                        label: '@lang('messages.new_cases')',
                        data: @json($reports->pluck('new_cases')->toArray()),
                        borderWidth: 1,
                        yAxisID: 'B',
                        backgroundColor: 'rgba(255, 193, 5, 0.3)',
                        borderColor: 'rgb(255, 193, 5)',
                    },
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        id: 'A',
                        type: 'linear',
                        position: 'left',
                        ticks: {
                            max: 1800,
                            min: 0
                        }
                    }, {
                        id: 'B',
                        type: 'linear',
                        position: 'right',
                        ticks: {
                            max: 180,
                            min: 0
                        }
                    }]
                }
            }
        });
    });
</script>
