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
                        <x-value-with-diff :value="$report->new_cases"/>
                    </td>
                    <td>
                        {{ $report->total_deaths }}
                        <x-value-with-diff :value="$report->new_deaths"/>
                    </td>
                    <td>
                        {{ $report->total_hospitalized }}
                        <x-value-with-diff :value="$report->new_hospitalized"/>
                    </td>
                    <td>
                        {{ $report->total_intense_care }}
                        <x-value-with-diff :value="$report->new_intense_care"/>
                    </td>
                    <td>
                        {{ $report->total_tests }}
                        <x-value-with-diff :value="$report->new_tests" color="success"/>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
