@if($type == 'register_status')
<script>swal({"timer":40000,"title":"Pending Registration: {{ $call->pending }}, Total Registration: {{ $call->registered }}","showConfirmButton":true,"type":"info"});</script>
@endif

@if($type == 'registered_male')
<script>swal({"timer":40000,"title":"Pending Male Registration: {{ $call->pending }}, Total Male Registration: {{ $call->registered }}","showConfirmButton":true,"type":"info"});</script>
@endif

@if($type == 'registered_female')
<script>swal({"timer":40000,"title":"Pending Female Registration: {{ $call->pending }}, Total Female Registration: {{ $call->registered }}","showConfirmButton":true,"type":"info"});</script>
@endif

@if($type == 'total_registrations_today')
<script>swal({"timer":40000,"title":"Total Registrations Today: {{ $call->count }}","showConfirmButton":true,"type":"info"});</script>
@endif

@if($type == 'vaccinated_children')
<script>swal({"timer":40000,"title":"Vaccinated Male: {{ $call->male }}, Vaccinated Female: {{ $call->female }}, Total Vaccinated: {{ $call->total }}","showConfirmButton":true,"type":"info"});</script>
@endif
