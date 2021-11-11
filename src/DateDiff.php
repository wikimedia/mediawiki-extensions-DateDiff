<?php
/**
 * The DateDiff extension to MediaWiki provides parser function #dates allowing to return
 * a list of intermediary days.
 *
 * @link https://www.mediawiki.org/wiki/Extension:DateDiff Homepage
 * @link https://phabricator.wikimedia.org/diffusion/EDAD/browse/master/README.md Documentation
 * @link https://www.mediawiki.org/wiki/Extension_talk:DateDiff Support
 * @link https://phabricator.wikimedia.org/maniphest/task/edit/form/1/ Issue tracker
 * @link https://phabricator.wikimedia.org/diffusion/EDAD/repository/master/ Source Code
 * @link https://github.com/wikimedia/mediawiki-extensions-DateDiff/releases Downloads
 *
 * @file
 * @ingroup Extensions
 * @package MediaWiki
 *
 * @version 0.3.1 2016-10-29
 *
 * @copyright Copyright (C) 2010, David Raison
 *
 * @author David Raison
 * @author Jeroen De Dauw
 *
 * @licence https://creativecommons.org/licenses/by-sa/3.0/ Creative Commons "Attribution-ShareAlike" 3.0
 */

class DateDiff {
	/**
	 * @param Parser &$parser
	 */
	public static function efDDDateDiff( Parser &$parser ) {
		$parser->setFunctionHook( 'dates', [ __CLASS__, 'efDDCalcDates' ] );
	}

	/**
	 * @param Parser &$parser
	 * @return string
	 */
	public static function efDDCalcDates( &$parser ) {
		$params = func_get_args();

		// We already know the $parser ...
		array_shift( $params );

		while ( empty( $params[0] ) ) {
			array_shift( $params );
		}

		$dates = array();

		foreach ( $params as $pair ) {
			// We currently ignore the label of the date.
			$dates[] = substr( $pair, strpos( $pair, '=' ) + 1 );
		}

		$time1 = strtotime( $dates[0] );
		$time2 = strtotime( $dates[1] );

		$a = ( $time2 > $time1 ) ? $time2 : $time1; // higher
		$b = ( $a == $time1 ) ? $time2 : $time1; // lower
		$datediff = $a - $b;

		$oneday = 86400;
		$days = array();

		for ( $i = 0; $i <= $datediff; $i += $oneday ) {
			$days[] = date( 'c', strtotime( $dates[0] ) + $i );
		}

		return implode( ',', $days );
	}
}
