
<?php
$dataEvento = strToTime($evento->data);
$differenza=$dataEvento - time();
$giorniMancanti=floor($differenza/(60*60*24));
$giorniSconto= $evento->giornisconto;
$sconto=$evento->sconto;
$costo=$evento->costo;
?>
@if($giorniMancanti<=$giorniSconto)
<p>
    COSTO: <?=$costo?>€
</p>
<p style="font-size: small">
    <s><?=($costo/(100-$sconto))*100?>€</s>
</p> }
@else
    COSTO: <?=$costo?>}€
@endif
