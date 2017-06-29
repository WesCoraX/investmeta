<?php
//get current month for example
$beginday = ($_POST ["cam_inicio"]);
$lastday  = ($_POST ["cam_fim"]);

$nr_work_days = getWorkingDays($beginday, $lastday);
echo $nr_work_days;

function getWorkingDays($startDate, $endDate)
{
    $begin = strtotime($startDate);
    $end   = strtotime($endDate);
    if ($begin > $end) {
        echo "startdate is in the future! <br />";

        return 0;
    } else {
        $no_days  = 0;
        $weekends = 0;
        while ($begin <= $end) {
            $no_days++; // no of days in the given interval
            $what_day = date("N", $begin);
            if ($what_day > 5) { // 6 and 7 are weekend days
                $weekends++;
            };
            $begin += 86400; // +1 day
        };
        $working_days = $no_days - $weekends;

        return $working_days;
    }
}

//<form method="post" id="Cform" name="Tform" action="diasuteis2.php">
//    <label for="Cinsem">Data inicial:</label>
//   <input type="date" name="Tinsem3" id="Cinsem" size="6">
//    <label for="Cdesl22">Data final:</label>
//   <input type="date" name="Tdesl" id="Cdesl22" size="6"><br><br>
//    <p align="center">
//  <input type="submit" id="enviar"></p>
//</form>