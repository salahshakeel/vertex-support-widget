@if(auth()->check() && config('vertex-support.enabled'))

<link rel="stylesheet"
href="{{ asset('vendor/vertex-support/css/widget.css') }}">


<button
id="vertex-support-btn"
style="
background:
{{config('vertex-support.button_color')}};
">

<svg width="28" height="28" viewBox="0 0 24 24"
fill="none"
stroke="{{config('vertex-support.icon_color')}}"
stroke-width="2"
stroke-linecap="round"
stroke-linejoin="round">

<path d="M21 11.5a8.38 8.38 0 0 1-1 3.8
8.5 8.5 0 0 1-7.5 4.7
8.38 8.38 0 0 1-3.8-1
L3 21l1.9-5.7
A8.38 8.38 0 0 1 3 11.5
a8.5 8.5 0 0 1 4.7-7.5
8.38 8.38 0 0 1 3.8-1
h.5
a8.5 8.5 0 0 1 8.5 8.5z"/>

</svg>

</button>


<script src="{{asset(
'vendor/vertex-support/js/widget.js'
)}}"></script>


@endif