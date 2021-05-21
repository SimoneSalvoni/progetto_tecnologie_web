@php
<<<<<<< HEAD
$data = date('Y-m-d', strToTime($evento->data));
$costo=$evento->costo;
$sconto=$evento->sconto;
$giorniSconto=$evento->giornisconto;
$data_attuale = Carbon\Carbon::now();
$data1 = new DateTime($data);
$data2 = new DateTime($adata_attuale);
$intervallo = $data1->diff($datae2);
$giorni = $intervallo->format('%a');
@endphp

@if(isset($evento->sconto)
@if($giorni<=$giorniSconto)
<span style="font-size: large">
    {{$costo-($costo*$sconto/100)}}&nbsp&nbsp&nbsp&nbsp
</span>
<span style="font-size: small">
    <s>{{$costo}}</s>
</span> 
@else
{{$costo}}
@endif 
@endif
