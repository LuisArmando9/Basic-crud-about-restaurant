<?php
const PENDIG = 'PENDIG';
const DELIVERED = 'DELIVERED';
const CANCELLED = 'CANCELLED';

function showTagLabel($message, $background){
    return "<label class='p-1 {$background}'><small>{$message}</small></label>";
}
function getStatus($status){
    return match($status){
        PENDIG => showTagLabel("PENDIENTE", "bg-primary"),
        DELIVERED => showTagLabel("ENTREGADO", "bg-success"),
        CANCELLED => showTagLabel("CANCELADO", "bg-danger"),
        default => showTagLabel("DESCONOCIDO", "bg-warnig"), 
    };
}