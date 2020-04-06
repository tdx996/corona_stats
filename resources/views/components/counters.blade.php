<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="info-box">
            <span class="info-box-icon bg-warning">
                <i class="fas fa-lungs-virus"></i>
            </span>

            <div class="info-box-content pt-0 pb-0 pr-0">
                <span class="info-box-text">@lang('messages.total_cases')</span>
                <span class="info-box-number">
                    {{ $reportYesterday->total_cases }}
                    <x-difference-indicator :value="$reportYesterday->new_cases" inverse="true" class="ml-1" />
                </span>
                <span class="text-xs text-gray float-right text-uppercase">
                    {{ $reportYesterday->reported_at->format('j. F') }}
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="info-box">
            <span class="info-box-icon bg-orange">
                <i class="fas fa-hospital-symbol"></i>
            </span>

            <div class="info-box-content pt-0 pb-0 pr-0">
                <span class="info-box-text">@lang('messages.total_hospitalized')</span>
                <span class="info-box-number">
                    {{ $reportToday->total_hospitalized }}
                    <x-difference-indicator :value="$reportToday->new_hospitalized" inverse="true" class="ml-1" />
                </span>
                <span class="text-xs text-gray float-right text-uppercase">
                    {{ $reportToday->reported_at->format('j. F') }}
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="info-box">
            <span class="info-box-icon bg-red">
                <i class="fas fa-procedures"></i>
            </span>

            <div class="info-box-content pt-0 pb-0 pr-0">
                <span class="info-box-text">@lang('messages.total_critical')</span>
                <span class="info-box-number">
                    {{ $reportToday->total_critical }}
                    <x-difference-indicator :value="$reportToday->new_critical" inverse="true" class="ml-1" />
                </span>
                <span class="text-xs text-gray float-right text-uppercase">
                    {{ $reportToday->reported_at->format('j. F') }}
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="info-box">
            <span class="info-box-icon bg-dark">
                <i class="fas fa-skull-crossbones"></i>
            </span>

            <div class="info-box-content pt-0 pb-0 pr-0">
                <span class="info-box-text">@lang('messages.total_deaths')</span>
                <span class="info-box-number">
                    {{ $reportToday->total_deaths }}
                    <x-difference-indicator :value="$reportToday->new_deaths" inverse="true" class="ml-1" />
                </span>
                <span class="text-xs text-gray float-right text-uppercase">
                    {{ $reportToday->reported_at->format('j. F') }}
                </span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-primary">
                <i class="fas fa-vial"></i>
            </span>

            <div class="info-box-content pt-0 pb-0 pr-0">
                <span class="info-box-text">@lang('messages.total_tests')</span>
                <span class="info-box-number">
                    {{ $reportYesterday->total_tests }}
                    <x-difference-indicator :value="$reportYesterday->new_tests" class="ml-1" />
                </span>
                <span class="text-xs text-gray float-right text-uppercase">
                    {{ $reportYesterday->reported_at->format('j. F') }}
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-success">
                <i class="fas fa-walking"></i>
            </span>

            <div class="info-box-content pt-0 pb-0 pr-0">
                <span class="info-box-text">@lang('messages.total_recovered')</span>
                <span class="info-box-number">
                    {{ $reportToday->total_recovered }}
                     <x-difference-indicator :value="$reportToday->new_recovered" class="ml-1" />
                </span>
                <span class="text-xs text-gray float-right text-uppercase">
                    {{ $reportToday->reported_at->format('j. F') }}
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-warning">
                <i class="fas fa-virus"></i>
            </span>

            <div class="info-box-content pt-0 pb-0 pr-0">
                <span class="info-box-text">@lang('messages.total_active')</span>
                <span class="info-box-number">
                    {{ $totalActive }}
                     <x-difference-indicator :value="$newActive" class="ml-1" inverse="true" />
                </span>
                <span class="text-xs text-gray float-right text-uppercase">
                    {{ $reportToday->reported_at->format('j. F') }}
                </span>
            </div>
        </div>
    </div>
</div>
