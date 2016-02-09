<?php

/**
 * Remplace la première occurence de $serach par $repalce dans la chaine $subject
 * @param string $search Expression recherchée
 * @param string $replace Chaine de remplacement
 * @param string $subject Chaine de recherche
 * @return string Chaine modifiée
 */
function str_replace_first($search, $replace, $subject) {
    $pos = strpos($subject, $search);
    if ($pos !== false) {
        $subject = substr_replace($subject, $replace, $pos, strlen($search));
    }
    return $subject;
}