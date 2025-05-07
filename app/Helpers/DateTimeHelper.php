<?php
namespace App\Helpers;

class DateTimeHelper 
{
    public function wk_inout_format(string $date) : array {
        [$startStr, $endStr] = explode(' - ', $date);
        $start = \DateTime::createFromFormat('m/d/Y H:i:s', $startStr . ' 00:00:00');
        $end   = \DateTime::createFromFormat('m/d/Y H:i:s', $endStr . ' 23:59:59');
        $startFormatted = $start->format('YmdHis'); 
        $endFormatted   = $end->format('YmdHis');  
        return [$startFormatted,$endFormatted];
    }
}

