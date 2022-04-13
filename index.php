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
