@php
$data = $dataEvento->Fdate;
$attuale = Carbon\Carbon::now();
$data1 = new DateTime($fdate);
$data2 = new DateTime($attuale);
$intervallo = $data1->diff($datae2);
$giorni = $intervallo->format('%a');
@endphp
            @if($giorni<=$giorniSconto)
                    <span style="font-size: large">
                       {{$costo-($costo*$conto/100)}}&nbsp&nbsp&nbsp&nbsp
                    </span>
                    <span style="font-size: small">
                        <s>{{$costo}}</s>
                    </span> 
            @else
                {{$costo}}
            @endif 
