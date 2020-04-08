<div class="row">
    <div class="col-md-4 ad-container">
        <script type="text/javascript">
            atOptions = {
                'key' : '9b6ffc479b1b245933e187882c3f24e7',
                'format' : 'iframe',
                'height' : 250,
                'width' : 300,
                'params' : {}
            };
            document.write('<scr' + 'ipt type="text/javascript" src="http' + (location.protocol === 'https:' ? 's' : '') + '://www.hiprofitnetworks.com/9b6ffc479b1b245933e187882c3f24e7/invoke.js"></scr' + 'ipt>');
        </script>
    </div>
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
