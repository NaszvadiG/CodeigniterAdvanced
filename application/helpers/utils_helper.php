<?php
function getRelativeTime($date) {
	$date_a_comparer = new DateTime ( $date );
	$date_actuelle = new DateTime ( "now" );
	
	$intervalle = $date_a_comparer->diff ( $date_actuelle );
	
	if ($date_a_comparer > $date_actuelle) {
		$prefixe = 'dans ';
	} else {
		$prefixe = 'il y a ';
	}
	
	$ans = $intervalle->format ( '%y' );
	$mois = $intervalle->format ( '%m' );
	$jours = $intervalle->format ( '%d' );
	$heures = $intervalle->format ( '%h' );
	$minutes = $intervalle->format ( '%i' );
	$secondes = $intervalle->format ( '%s' );
	
	if ($ans != 0) {
		$relative_date = $prefixe . $ans . ' an' . (($ans > 1) ? 's' : '');
		if ($mois >= 6)
			$relative_date .= ' et demi';
	} elseif ($mois != 0) {
		$relative_date = $prefixe . $mois . ' mois';
		if ($jours >= 15)
			$relative_date .= ' et demi';
	} elseif ($jours != 0) {
		$relative_date = $prefixe . $jours . ' jour' . (($jours > 1) ? 's' : '');
	} elseif ($heures != 0) {
		$relative_date = $prefixe . $heures . ' heure' . (($heures > 1) ? 's' : '');
	} elseif ($minutes != 0) {
		$relative_date = $prefixe . $minutes . ' minute' . (($minutes > 1) ? 's' : '');
	} else {
		$relative_date = $prefixe . ' quelques secondes';
	}
	
	return $relative_date;
}

function wd_remove_accents($str, $charset = 'utf-8') {
	$str = htmlentities ( $str, ENT_NOQUOTES, $charset );
	
	$str = preg_replace ( '#&([A-za-z])(?:acute|cedil|caron|circ|grave|orn|ring|slash|th|tilde|uml);#', '\1', $str );
	$str = preg_replace ( '#&([A-za-z]{2})(?:lig);#', '\1', $str ); // pour les ligatures e.g. '&oelig;'
	$str = preg_replace ( '#&[^;]+;#', '', $str ); // supprime les autres caractères
	
	return $str;
}
function newObject()
{
    return new stdClass();
}
?>