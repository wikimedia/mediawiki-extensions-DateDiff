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
 * @version 0.4.0 TBD
 *
 * @copyright Copyright (C) 2010, David Raison
 *
 * @author David Raison
 * @author Jeroen De Dauw
 *
 * @license CC-BY-SA-3.0
 */

// Ensure that the script cannot be executed outside of MediaWiki
if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This is an extension to MediaWiki and cannot be run standalone.' );
}

if ( function_exists( 'wfLoadExtension' ) ) {
	wfLoadExtension( 'DateDiff' );
	// Keep i18n globals so mergeMessageFileList.php doesn't break
	$wgMessagesDirs['DateDiff'] = __DIR__ . '/i18n';
	$wgExtensionMessagesFiles['DateDiffMagic'] = __DIR__ . '/DateDiff.i18n.magic.php';
	wfWarn(
		'Deprecated PHP entry point used for the DateDiff extension. ' .
		'Please use wfLoadExtension() instead, ' .
		'see https://www.mediawiki.org/wiki/Special:MyLanguage/Manual:Extension_registration for more details.'
	);
	return;
} else {
	die( 'This version of the DateDiff extension requires MediaWiki 1.35+' );
}
