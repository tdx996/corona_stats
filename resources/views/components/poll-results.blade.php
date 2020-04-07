<div class="row">
    @foreach ($polls as $poll)
        <div class="col-md-4">
            <div class="card" style="height: calc(100% - 1rem);">
                <div class="card-body">
                    <p class="font-weight-bold">
                        {{ $poll->question }}
                    </p>

                    @foreach($poll->options_extended as $option)
                        <div class="progress-group">
                            {{ $option->value }}
                            <span class="float-right">
                                {{ $option->percentage }}%
                            </span>
                            <div class="progress progress-xs">
                                <div class="progress-bar bg-gray" style="width: {{ $option->percentage }}%"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
