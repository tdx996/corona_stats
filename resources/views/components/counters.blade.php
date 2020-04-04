<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="info-box">
            <span class="info-box-icon bg-warning">
                <i class="fas fa-lungs-virus"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">@lang('messages.total_cases')</span>
                <span class="info-box-number">
                    {{ $totalCases }}
                    <x-difference-indicator :value="$newCases" inverse="true" class="ml-1" />
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="info-box">
            <span class="info-box-icon bg-orange">
                <i class="fas fa-hospital-symbol"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">@lang('messages.total_hospitalized')</span>
                <span class="info-box-number">
                    {{ $totalHospitalized }}
                    <x-difference-indicator :value="$newHospitalized" inverse="true" class="ml-1" />
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="info-box">
            <span class="info-box-icon bg-red">
                <i class="fas fa-procedures"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">@lang('messages.total_critical')</span>
                <span class="info-box-number">
                    {{ $totalCritical }}
                    <x-difference-indicator :value="$newCritical" inverse="true" class="ml-1" />
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="info-box">
            <span class="info-box-icon bg-dark">
                <i class="fas fa-skull-crossbones"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">@lang('messages.total_deaths')</span>
                <span class="info-box-number">
                    {{ $totalDeaths }}
                    <x-difference-indicator :value="$newDeaths" inverse="true" class="ml-1" />
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

            <div class="info-box-content">
                <span class="info-box-text">@lang('messages.total_tests')</span>
                <span class="info-box-number">
                    {{ $totalTests }}
                    <x-difference-indicator :value="$newTests" class="ml-1" />
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-success">
                <i class="fas fa-walking"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">@lang('messages.total_recovered')</span>
                <span class="info-box-number">
                    {{ $totalRecovered }}
                     <x-difference-indicator :value="$newRecovered" class="ml-1" />
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-warning">
                <i class="fas fa-virus"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">@lang('messages.total_active')</span>
                <span class="info-box-number">
                    {{ $totalActive }}
                     <x-difference-indicator :value="$newActive" class="ml-1" />
                </span>
            </div>
        </div>
    </div>
</div>
