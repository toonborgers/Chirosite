<?php 
# PHP Calendar (version 2.3), written by Keith Devens 
# http://keithdevens.com/software/php_calendar 
#  see example at http://keithdevens.com/weblog 
# License: http://keithdevens.com/software/license
# adjustments made by stijn hoskens ;)

include_once 'database/dbUtil.php';

function generate_coloredCalenderTable($nbOfMonths, $columns, $chiro, $editable = FALSE) {
	$verhuurd = array();
	if($editable) {
		$maand = intval(date("m", time()));
		$jaar = intval(date("Y", time()));
		for ($i=0; $i < $nbOfMonths; $i++, 	$maand = intval(date("m",strtotime("+".$i." months"))), 
											$jaar = intval(date("Y",strtotime("+".$i." months")))) { 
			$nbOfDays = cal_days_in_month(CAL_GREGORIAN, $maand, $jaar);
			for ($j=1; $j <= $nbOfDays; $j++) { 
				$verhuurd[$maand][$j] = array('database/addVerhuurdag.php?
				datum='.$j.'-'.$maand.'-'.$jaar,'linked-day');
			}
		}
	}
	$sql = "SELECT datum FROM new_verhuurdatum WHERE chiro = '$chiro'";
	$data = doSelectForMultipleResults($sql);
	foreach ($data as $rij) {
		$datum = $rij["datum"];
		$maand = intval(date("m",strtotime($datum)));
		$jaar = intval(date("Y",strtotime($datum)));
		if($jaar != date("Y"))
			$maand += ($jaar - date("Y"))*12;
		$dag = intval(date("j", strtotime($datum)));
		if($editable)
			$verhuurd[$maand][$dag] = 
			array('database/deleteVerhuurdag.php?datum='.$dag.'-'.$maand.'-'.$jaar,
			'linked-day','<span class="verhuurKleur">'.$dag.'</span>');
		else $verhuurd[$maand][$dag] = array(NULL, NULL,'<span class="verhuurKleur">'.$dag.'</span>');
	}
	generate_calendarTable($nbOfMonths, $columns, $verhuurd);
}

function generate_calendarTable($nbOfMonths, $columns, $verhuurd = array()) {
	# verhuurd moet een array zijn met daarin een array met de maand en de dag
	$oldlocale = setlocale(LC_TIME, NULL); #save current locale 
    setlocale(LC_TIME, 'nl_NL'); #dutch 
    $time = time();
    $year = date('Y', $time);
	$month = date('n', $time);
	echo "<table class='verhuur'><tr>";
	for($i=0; $i < $nbOfMonths; $i++, $month++) {
		$days = $verhuurd[$month];
		if($i%$columns == 0 && $i != 0)
			echo "</tr><tr>";
		echo "<td class='verhuur'>";
		echo generate_calendar($year, $month, $days);
		echo "</td>";
	}
	echo "</tr></table>";
	setlocale(LC_TIME, $oldlocale); 
}

function generate_calendar($year, $month, $days = array(), $day_name_length = 2, $month_href = NULL, $first_day = 1, $pn = array()){ 
    $first_of_month = gmmktime(0,0,0,$month,1,$year); 
    #remember that mktime will automatically correct if invalid dates are entered 
    # for instance, mktime(0,0,0,12,32,1997) will be the date for Jan 1, 1998 
    # this provides a built in "rounding" feature to generate_calendar() 

    $day_names = array(); #generate all the day names according to the current locale 
    for($n=0,$t=(3+$first_day)*86400; $n<7; $n++,$t+=86400) #January 4, 1970 was a Sunday 
        $day_names[$n] = ucfirst(gmstrftime('%A',$t)); #%A means full textual day name 

    list($month, $year, $month_name, $weekday) = explode(',',gmstrftime('%m,%Y,%B,%w',$first_of_month)); 
    $weekday = ($weekday + 7 - $first_day) % 7; #adjust for $first_day 
    $title   = htmlentities(ucfirst($month_name)).'&nbsp;'.$year;  #note that some locales don't capitalize month and day names 

    #Begin calendar. Uses a real <caption>. See http://diveintomark.org/archives/2002/07/03 
    @list($p, $pl) = each($pn); @list($n, $nl) = each($pn); #previous and next links, if applicable 
    if($p) $p = '<span class="calendar-prev">'.($pl ? '<a href="'.htmlspecialchars($pl).'">'.$p.'</a>' : $p).'</span>&nbsp;'; 
    if($n) $n = '&nbsp;<span class="calendar-next">'.($nl ? '<a href="'.htmlspecialchars($nl).'">'.$n.'</a>' : $n).'</span>'; 
    $calendar = '<table class="calendar">'."\n". 
        '<caption class="calendar-month">'.$p.($month_href ? '<a href="'.htmlspecialchars($month_href).'">'.$title.'</a>' : $title).$n."</caption>\n<tr>"; 

    if($day_name_length){ #if the day names should be shown ($day_name_length > 0) 
        #if day_name_length is >3, the full name of the day will be printed 
        foreach($day_names as $d) 
            $calendar .= '<th abbr="'.htmlentities($d).'">'.htmlentities($day_name_length < 4 ? substr($d,0,$day_name_length) : $d).'</th>'; 
        $calendar .= "</tr>\n<tr>"; 
    } 

    if($weekday > 0) $calendar .= '<td colspan="'.$weekday.'">&nbsp;</td>'; #initial 'empty' days 
    for($day=1,$days_in_month=gmdate('t',$first_of_month); $day<=$days_in_month; $day++,$weekday++){ 
        if($weekday == 7){ 
            $weekday   = 0; #start a new week 
            $calendar .= "</tr>\n<tr>"; 
        } 
        if(isset($days[$day]) and is_array($days[$day])){ 
            @list($link, $classes, $content) = $days[$day]; 
            if(is_null($content))  $content  = $day; 
            $calendar .= '<td'.($classes ? ' class="'.htmlspecialchars($classes).'">' : '>'). 
                ($link ? '<a href="'.htmlspecialchars($link).'">'.$content.'</a>' : $content).'</td>'; 
        } 
        else $calendar .= "<td>$day</td>"; 
    } 
    if($weekday != 7) $calendar .= '<td colspan="'.(7-$weekday).'">&nbsp;</td>'; #remaining "empty" days 

    return $calendar."</tr>\n</table>\n"; 
} 
?>