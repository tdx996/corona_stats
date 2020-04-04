<div class="card">
    <div class="card-body">
        <table class="table table-sm">
            <thead>
            <th>@lang('messages.reported_at')</th>
            <th>@lang('messages.total_cases')</th>
            <th>@lang('messages.total_deaths')</th>
            <th>@lang('messages.total_hospitalized')</th>
            <th>@lang('messages.total_intense_care')</th>
            <th>@lang('messages.total_tests')</th>
            </thead>
            <tbody>
            @foreach ($reports->reverse() as $report)
                <tr>
                    <td>
                        {{ $report->reported_at->format('d.m.Y') }}
                    </td>
                    <td>
                        {{ $report->total_cases }}
                        <x-difference-indicator :value="$report->new_cases" inverse="true"/>
                    </td>
                    <td>
                        {{ $report->total_deaths }}
                        <x-difference-indicator :value="$report->new_deaths" inverse="true"/>
                    </td>
                    <td>
                        {{ $report->total_hospitalized }}
                        <x-difference-indicator :value="$report->new_hospitalized" inverse="true"/>
                    </td>
                    <td>
                        {{ $report->total_intense_care }}
                        <x-difference-indicator :value="$report->new_intense_care" inverse="true"/>
                    </td>
                    <td>
                        {{ $report->total_tests }}
                        <x-difference-indicator :value="$report->new_tests"/>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
