Vprašanje: {{ $question }}

<br>

Odgovori: {{ collect($answers)->filter()->join(', ') }}
