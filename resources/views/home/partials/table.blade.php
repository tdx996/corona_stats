<div class="card">
    <div class="card-body">
        <table class="table table-sm">
            <thead>
            <th>@lang('messages.reported_at')</th>
            <th>@lang('messages.total_cases')</th>
            <th>@lang('messages.total_deaths')</th>
            <th>@lang('messages.total_hospitalized')</th>
            <th>@lang('messages.total_intense_care')</th>
            <th>@lang('messages.total_tests_performed')</th>
            </thead>
            <tbody>
            @foreach ($reports->reverse() as $report)
                <tr>
                    <td>
                        {{ $report->reported_at->format('d.m.Y') }}
                    </td>
                    <td>
                        {{ $report->total_cases }}
                        <small class="text-gray">
                            @if (isset($report->new_cases))
                                +{{ $report->new_cases }}
                            @else
                                Ni podatka
                            @endif
                        </small>
                    </td>
                    <td>
                        {{ $report->total_deaths }}
                        <small class="text-gray">
                            @if (isset($report->new_deaths))
                                +{{ $report->new_deaths }}
                            @else
                                Ni podatka
                            @endif
                        </small>
                    </td>
                    <td>
                        {{ $report->total_hospitalized }}
                        <small class="text-gray">
                            @if (isset($report->new_hospitalized))
                                +{{ $report->new_hospitalized }}
                            @else
                                Ni podatka
                            @endif
                        </small>
                    </td>
                    <td>
                        {{ $report->total_intense_care }}
                        <small class="text-gray">
                            @if (isset($report->new_intense_care))
                                +{{ $report->new_intense_care }}
                            @else
                                Ni podatka
                            @endif
                        </small>
                    </td>
                    <td>
                        {{ $report->total_tests_performed }}
                        <small class="text-gray">
                            @if (isset($report->new_tests_performed))
                                +{{ $report->new_tests_performed }}
                            @else
                                Ni podatka
                            @endif
                        </small>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
