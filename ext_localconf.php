<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'Show',
	array(
		'Show' => 'list, form, manage',
		
	),
	// non-cacheable actions
	array(
		'Show' => 'form, manage',
		
	)
);

?>