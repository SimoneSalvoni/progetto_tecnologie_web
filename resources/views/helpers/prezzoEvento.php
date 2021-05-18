@php
$data = date('Y-m-d', strtotime($evento->data));
$costo = $evento->costo;
$sconto = $evento->sconto;
$giorniSconto = $evento->giornisconto;
$data_attuale = Carbon\Carbon::now();
$data1 = new DateTime($data);
$data2 = new DateTime($data_attuale);
$intervallo = $data1->diff($data2);
$giorni = $intervallo->format('%a');
@endphp
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
