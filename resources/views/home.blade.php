@extends('layouts.app')

@section('content')
    <h2>
        Koronavirus v Sloveniji
    </h2>
    <p>
        Koronavirus (COVID-19) je nalezljiva bolezen, ki jo povzroča novo odkrit koronavirus. V Sloveniji je bil prvič odkrit 4. Marca, najverjetneje se je prenesel iz Italije.
    </p>
    <p>
        Slovenija je 12. marca ob 18. uri na podlagi 7. člena zakona o nalezljivih boleznih zaradi naraščanja števila primerov okužb s koronavirusom razglasila epidemijo. Aktiviran je tudi državni načrt. Podlaga za razglasitev epidemije je strokovno mnenje NIJZ. S tem sledimo razglasitvi pandemije Svetovne zdravstvene organizacije.
    </p>
    <div class="row">
        <div class="col-md-6">
            <div class="info-box">
                <span class="info-box-icon bg-warning">
                    <i class="fas fa-lungs-virus"></i>
                </span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ trans('messages.total_cases') }}</span>
                    <span class="info-box-number">
                        {{ $reports->last()->total_cases }}
                        <small class="text-red ml-1">
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
                        <small class="text-red ml-1">
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
                            <button class="nav-link btn-sm mr-1 active" data-chart="total_cases" data-axis-scale="linear">{{ trans('messages.linear') }}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link btn-sm" data-chart="total_cases" data-axis-scale="logarithmic">{{ trans('messages.logarithmic') }}</button>
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
                            <button class="nav-link btn-sm mr-1 active" data-chart="total_deaths" data-axis-scale="linear">{{ trans('messages.linear') }}</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link btn-sm" data-chart="total_deaths" data-axis-scale="logarithmic">{{ trans('messages.logarithmic') }}</button>
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

    <h3>Simptomi</h3>
    <p>
        Pri večini ljudi, okuženih z virusom COVID-19, se bodo pojavile blage do zmerne bolezni dihal in okrevale, ne da bi pri tem potrebovali posebno zdravljenje. Starejše osebe in tisti z osnovnimi zdravstvenimi težavami, kot so srčno-žilne bolezni, diabetes, kronične bolezni dihal in rak, imajo večjo verjetnost, da bodo razvili resne bolezni.
    </p>

    <h3>Kako se širi?</h3>
    <p>
        Virus COVID-19 se širi predvsem skozi kapljice sline ali izcedek iz nosu, ko okuženi človek kašlja ali kiha, zato je pomembno, da prakticirate tudi dihalno etiketo (na primer s kašljanjem na upognjen komolec) in uporabo ustrezne zaščitne maske in rokavic.
    </p>

    <h3>Preprečevanje okužbe</h3>
    <p>
        Najboljši način za preprečevanje in upočasnitev prenosa je dobro informiranje o virusu COVID-19, kako nastane in kako se širi. Zaščitite sebe in druge pred okužbo tako, da si pogosto umivate roke ali uporabljate alkoholno drgnjenje in se ne dotikate obraza.
    </p>

    <div class="card">
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                <th>@lang('messages.reported_at')</th>
                <th>@lang('messages.total_cases')</th>
                <th>@lang('messages.new_cases')</th>
                <th>@lang('messages.total_deaths')</th>
                <th>@lang('messages.new_deaths')</th>
                </thead>
                <tbody>
                @foreach ($reports->reverse() as $report)
                    <tr>
                        <td>
                            {{ $report->reported_at->format('d.m.Y') }}
                        </td>
                        <td>
                            {{ $report->total_cases }}
                        </td>
                        <td class="bg-warning">
                            {{ $report->new_cases }}
                        </td>
                        <td>
                            {{ $report->total_deaths }}
                        </td>
                        <td class="bg-danger">
                            {{ $report->new_deaths }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <h3>
        Ali vas skrbi, da ste okuženi? 
    </h3>

    <p>
        Če ste zboleli (kašelj, vročina, težko dihanje), prosimo, da:
        <ul>
            <li>Ostanete doma in se izogibajte stikom z ljudmi.</li>
            <li>Pokličete osebnega zdravnika oz. dežurnega zdravnika v najbližji dežurni ambulanti, če kličete izven delovnega časa vašega zdravnika.</li>
            <li>Zdravnik bo potrdil ali ovrgel sum na okužbo. Če bo sum upravičen, vas bo napotil na najbližjo zdravstveno ustanovo - vstopno točko za odvzem brisa.</li>
            <li>Do te zdravstvene ustanove se peljite z osebnim avtomobilom in ne z javnim prevozom (vlak, avtobus, taksi). Kašljajte v robec ali rokav. Pred odhodom od doma si umijte roke z vodo in milom.</li>
            <li>Zdravnik, ki vam bo vzel bris, bo glede na vaše zdravstveno stanje ocenil, kje boste počakali na rezultate testa.</li>
            <li>Po prejemu rezultata vas bo zdravnik obvestil o nadaljnjih ukrepih.</li>
        </ul>
    </p>

    <p>
        V pomoč prebivalcem pri iskanju zanesljivih informacij v zvezi z novim koronavirusom je Urad vlade za komuniciranje v sodelovanju z Ministrstvom za zdravje, Nacionalnim inštitutom za javno zdravje, Infekcijsko kliniko, Upravo RS za zaščito in reševanje ter Ministrstvom za javno upravo vzpostavil klicni center.
    </p>
    <p>
        Na brezplačni telefonski številki 080 1404 lahko dobite informacije vsak dan med 8. in 20. uro. Če kličete iz tujine, je klicni center dosegljiv na +386 1 478 7550
    </p>
    <p>
        Klicateljem na vprašanja odgovarjajo študentje višjih letnikov Medicinske fakultete pod mentorstvom ustreznih strokovnih služb / strokovnjakov.
    </p>
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
                            backgroundColor: 'rgba(255, 193, 5, 0.3)',
                            borderColor: 'rgb(255, 193, 5)',
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
                            backgroundColor: 'rgba(255, 193, 5, 0.3)',
                            borderColor: 'rgb(255, 193, 5)',
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
                            backgroundColor: 'rgba(220, 53, 69, 0.3)',
                            borderColor: 'rgb(220, 53, 69)',
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
                            backgroundColor: 'rgba(220, 53, 69, 0.3)',
                            borderColor: 'rgb(220, 53, 69)',
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
