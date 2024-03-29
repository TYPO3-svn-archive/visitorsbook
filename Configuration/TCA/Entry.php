<?php
if (!defined ('TYPO3_MODE')) {
	die ('Access denied.');
}

$TCA['tx_visitorsbook_domain_model_entry'] = array(
	'ctrl' => $TCA['tx_visitorsbook_domain_model_entry']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, name, email, ip, entry, notification, approved, spam, child_entries, feuser',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, name, email, ip, entry, notification, approved, spam, child_entries, feuser,--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.access,starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_visitorsbook_domain_model_entry',
				'foreign_table_where' => 'AND tx_visitorsbook_domain_model_entry.pid=###CURRENT_PID### AND tx_visitorsbook_domain_model_entry.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'name' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:visitorsbook/Resources/Private/Language/locallang_db.xml:tx_visitorsbook_domain_model_entry.name',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'email' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:visitorsbook/Resources/Private/Language/locallang_db.xml:tx_visitorsbook_domain_model_entry.email',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'ip' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:visitorsbook/Resources/Private/Language/locallang_db.xml:tx_visitorsbook_domain_model_entry.ip',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim,required'
			),
		),
		'entry' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:visitorsbook/Resources/Private/Language/locallang_db.xml:tx_visitorsbook_domain_model_entry.entry',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim,required',
				'wizards' => array(
					'RTE' => array(
						'icon' => 'wizard_rte2.gif',
						'notNewRecords'=> 1,
						'RTEonly' => 1,
						'script' => 'wizard_rte.php',
						'title' => 'LLL:EXT:cms/locallang_ttc.xml:bodytext.W.RTE',
						'type' => 'script'
					)
				)
			),
			'defaultExtras' => 'richtext[]',
		),
		'notification' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:visitorsbook/Resources/Private/Language/locallang_db.xml:tx_visitorsbook_domain_model_entry.notification',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'approved' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:visitorsbook/Resources/Private/Language/locallang_db.xml:tx_visitorsbook_domain_model_entry.approved',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'spam' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:visitorsbook/Resources/Private/Language/locallang_db.xml:tx_visitorsbook_domain_model_entry.spam',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'child_entries' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:visitorsbook/Resources/Private/Language/locallang_db.xml:tx_visitorsbook_domain_model_entry.child_entries',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_visitorsbook_domain_model_entry',
				'foreign_field' => 'entry',
				'maxitems'      => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'feuser' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:visitorsbook/Resources/Private/Language/locallang_db.xml:tx_visitorsbook_domain_model_entry.feuser',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'fe_users',
				'minitems' => 0,
				'maxitems' => 1,
			),
		),
		'entry' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);

?>