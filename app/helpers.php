<?php
// servicss popur les vues
if (!function_exists('formatNumber')) {
    function formatNumber($number)
    {
        if ($number >= 1000 && $number < 1000000) {
            return number_format($number / 1000, 1) . 'k';
        } elseif ($number >= 1000000 && $number < 1000000000) {
            return number_format($number / 1000000, 1) . 'M';
        } elseif ($number >= 1000000000) {
            return number_format($number / 1000000000, 1) . 'T';
        }
        return $number;
    }
}

// pour les heures d  visionnage
if (!function_exists('convertMinutesToHours')) {
    function convertMinutesToHours($minutes)
    {
        try {
            if ($minutes) {

                // Calcul des heures et des minutes restantes
                $hours = floor($minutes / 60);
                $remainingMinutes = $minutes % 60;

                // Retourne les minutes seules si elles ne dépassent pas une heure
                if ($hours == 0) {
                    return "{$remainingMinutes}m";
                }

                // Retourne les heures et minutes si elles dépassent une heure
                return "{$hours}h {$remainingMinutes}m";
            }
        } catch (InvalidArgumentException $e) {
            return "Une erreur s'est produite lors de l'affichage de la durée rafraichissez la page !";
        }
    }
}
