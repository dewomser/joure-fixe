<?php

// Termine für regelmäßige Treffen zb. Jeden 2. Donnerstag im Monat

/**
   *
   *  Gets the first weekday of that month and year
   *
   *  @param  int   The day of the week (0 = sunday, 1 = monday ... , 6 = saturday)
   *  @param  int   The month (if false use the current month)
   *  @param  int   The year (if false use the current year)
   *
   *  @return int   The timestamp of the first day of that month
   *
   **/ 
function get_first_day($day_number=1, $month=false, $year=false, $week)
{
$daystowait=($week-1)*7+1;
$month=($month === false) ? strftime("%m"): $month;
$year=($year === false) ? strftime("%Y"): $year;
$first_day = $daystowait + ((7+$day_number - strftime("%w", mktime(0,0,0,$month, 1, $year)))%7);
return mktime(0,0,0,$month, $first_day, $year);
}


// These variables  are to configure
$tag=4;
//day  of the week
$tagname="Donnerstag";
//day
$woche=2;
//the week beginnig with 1-4


$monat=date("m");
$jahr=date("y");
$datum_live = date("d,m,y");
$datum_termin=strftime("%d-%m-%Y", get_first_day($tag, $monat, $jahr, $woche));
// echo "datum_live =".$datum_live."datum_termin=".$datum_termin;
$tages_differenz = date("d")-strftime("%d", get_first_day($tag, $monat, $jahr, $woche));
// echo $tages_differenz;
if ($tages_differenz > 0){
$monat = $monat + 1;
}if ($monat > 12){
$monat = 1;
$jahr = $jahr +1;}
// this will output the 2. Donnerstag of 
// aktuelles Monat und Jahr(wed 03-01-2007)
echo $tagname ." ".strftime("%d-%m-%Y", get_first_day($tag, $monat , $jahr , $woche));
// Script ist hier zu Ende.
?>
