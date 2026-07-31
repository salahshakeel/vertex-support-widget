@if(auth()->check() && config('vertex-support.enabled'))

<link rel="stylesheet"
href="{{ asset('vendor/vertex-support/css/widget.css') }}">


<button
id="vertex-support-btn"
style="
background:
{{config('vertex-support.button_color')}};
">

<svg
width="28"
height="28"
viewBox="0 0 24 24"
fill="{{config('vertex-support.icon_color')}}">

<path d="
M12 2C6.48 2 2 6.48
2 12s4.48 10 10 10
10-4.48 10-10S17.52 2
12 2z"/>

</svg>

</button>


<script src="{{asset(
'vendor/vertex-support/js/widget.js'
)}}"></script>


@endif