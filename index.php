<?php

function whichWeek(int $year, int $month, int $day)
{
    // walidacja czy sprawdzana data jest poprawna
    if (checkdate($month, $day, $year)) {
        // nowy obiekt DataTime -> początek roku -> pierwszy czwartek marca
        $firstThursdayOfYear = new DateTime('First Thursday of March ' . $year);
        // nowy obiekt DataTime -> sprawdzana data 
        $currentDate = new DateTime($year . '-' . $month . '-' . $day);

        // sprawdzanie czy sprawdzana data jest przed pierwszym czwartkiem marca
        if ($currentDate < $firstThursdayOfYear)
            // modyfikacja daty o rok wstecz
            $firstThursdayOfYear = new DateTime('First Thursday of March ' . $year - 1);

        // roznica dni miedzy datami        
        $days = $currentDate->diff($firstThursdayOfYear);
        // liczba tygodni
        $weeks = $days->days / 7 + 1;
        // zwracam liczbe tygodni
        return floor($weeks);
    } else {
        // zwracam informacje o błędnej dacie
        return 'Niepoprawna data.';
    }
}

echo 'Gdy podam datę 01.03.2018 funkcja zwraca: ' . whichWeek(2018, 3, 1);
echo '<br>';
echo 'Gdy podam datę 12.03.2018 funkcja zwraca: ' . whichWeek(2018, 3, 12);
echo '<br>';
echo 'Gdy podam datę 19.04.2017 funkcja zwraca: ' . whichWeek(2017, 4, 19);
echo '<br>';
echo 'Gdy podam datę 27.03.2015 funkcja zwraca: ' . whichWeek(2015, 3, 27);
echo '<br>';
echo 'Gdy podam datę 04.03.2019 funkcja zwraca: ' . whichWeek(2019, 3, 4);
echo '<br>';

echo 'jest: ' . whichWeek(2020, 02, 28) . ", a powinno być = 52 <br>\n";
echo 'jest: ' . whichWeek(2020, 02, 29) . ", a powinno być = 52<br>\n";
echo 'jest: ' . whichWeek(2020, 03, 01) . ", a powinno być = 52<br>\n";
echo 'jest: ' . whichWeek(2020, 03, 02) . ", a powinno być = 52<br>\n";
echo 'jest: ' . whichWeek(2020, 03, 03) . ", a powinno być = 52<br>\n";
echo 'jest: ' . whichWeek(2020, 03, 04) . ", a powinno być = 52<br>\n";
echo 'jest: ' . whichWeek(2020, 03, 05) . ", a powinno być = 1  // <= pierwszy czwartek marca <br>\n";
echo 'jest: ' . whichWeek(2020, 03, 06) . ", a powinno być = 1<br>\n";






//return $week;