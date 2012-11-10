<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'Show',
	'Visitors Book'
);

t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Visitors Book');

t3lib_extMgm::addLLrefForTCAdescr('tx_visitorsbook_domain_model_entry', 'EXT:visitorsbook/Resources/Private/Language/locallang_csh_tx_visitorsbook_domain_model_entry.xml');
t3lib_extMgm::allowTableOnStandardPages('tx_visitorsbook_domain_model_entry');
$TCA['tx_visitorsbook_domain_model_entry'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:visitorsbook/Resources/Private/Language/locallang_db.xml:tx_visitorsbook_domain_model_entry',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'origUid' => 't3_origuid',
		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,email,ip,entry,notification,approved,spam,child_entries,feuser,',
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'Configuration/TCA/Entry.php',
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_visitorsbook_domain_model_entry.gif'
	),
);

?>