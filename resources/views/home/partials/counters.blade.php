<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="info-box">
            <span class="info-box-icon bg-warning">
                <i class="fas fa-lungs-virus"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">@lang('messages.total_cases')</span>
                <span class="info-box-number">
                    {{ $reports->last()->total_cases }}
                    <x-difference-indicator :value="$reports->whereNotNull('new_cases')->last()->new_cases" inverse="true" class="ml-1" />
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
                    {{ $reports->last()->total_hospitalized }}
                    <x-difference-indicator :value="$reports->whereNotNull('new_hospitalized')->last()->new_hospitalized" inverse="true" class="ml-1" />
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
                    {{ $reports->last()->total_critical }}
                    <x-difference-indicator :value="$reports->whereNotNull('new_critical')->last()->new_critical" inverse="true" class="ml-1" />
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
                    {{ $reports->last()->total_deaths }}
                    <x-difference-indicator :value="$reports->whereNotNull('new_deaths')->last()->new_deaths" inverse="true" class="ml-1" />
                </span>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="info-box">
            <span class="info-box-icon bg-primary">
                <i class="fas fa-vial"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">@lang('messages.total_tests')</span>
                <span class="info-box-number">
                    {{ $reports->last()->total_tests }}
                    <x-difference-indicator :value="$reports->whereNotNull('new_tests')->last()->new_tests" class="ml-1" />
                </span>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="info-box">
            <span class="info-box-icon bg-primary">
                <i class="fas fa-calendar-alt"></i>
            </span>

            <div class="info-box-content">
                <span class="info-box-text">@lang('messages.last_updated_at')</span>
                <span class="info-box-number">
                    {{ $reports->last()->reported_at->format('d.m.Y') }}
                </span>
            </div>
        </div>
    </div>
</div>
