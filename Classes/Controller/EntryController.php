<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2012 Thomas Löffler <loeffler@spooner-web.de>, Spooner Web
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package visitorsbook
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_Visitorsbook_Controller_EntryController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * entryRepository
	 *
	 * @var Tx_Visitorsbook_Domain_Repository_EntryRepository
	 */
	protected $entryRepository;

	/**
	 * injectEntryRepository
	 *
	 * @param Tx_Visitorsbook_Domain_Repository_EntryRepository $entryRepository
	 * @return void
	 */
	public function injectEntryRepository(Tx_Visitorsbook_Domain_Repository_EntryRepository $entryRepository) {
		$this->entryRepository = $entryRepository;
	}

	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$entries = $this->entryRepository->findAll();
		$this->view->assign('entries', $entries);
	}

	/**
	 * action new
	 *
	 * @param Tx_Visitorsbook_Domain_Model_Entry $newEntry
	 * @dontvalidate $newEntry
	 * @return void
	 */
	public function newAction(Tx_Visitorsbook_Domain_Model_Entry $newEntry = NULL) {
		if ($newEntry == NULL) { // workaround for fluid bug ##5636
			$newEntry = t3lib_div::makeInstance('Tx_Visitorsbook_Domain_Model_Entry');
		}
		$this->view->assign('newEntry', $newEntry);
	}

	/**
	 * action create
	 *
	 * @param Tx_Visitorsbook_Domain_Model_Entry $newEntry
	 * @return void
	 */
	public function createAction(Tx_Visitorsbook_Domain_Model_Entry $newEntry) {
		$this->entryRepository->add($newEntry);
		$this->flashMessageContainer->add('Your new Entry was created.');
		$this->redirect('list');
	}

	/**
	 * action edit
	 *
	 * @param Tx_Visitorsbook_Domain_Model_Entry $entry
	 * @return void
	 */
	public function editAction(Tx_Visitorsbook_Domain_Model_Entry $entry) {
		$this->view->assign('entry', $entry);
	}

	/**
	 * action update
	 *
	 * @param Tx_Visitorsbook_Domain_Model_Entry $entry
	 * @return void
	 */
	public function updateAction(Tx_Visitorsbook_Domain_Model_Entry $entry) {
		$this->entryRepository->update($entry);
		$this->flashMessageContainer->add('Your Entry was updated.');
		$this->redirect('list');
	}

	/**
	 * action delete
	 *
	 * @param Tx_Visitorsbook_Domain_Model_Entry $entry
	 * @return void
	 */
	public function deleteAction(Tx_Visitorsbook_Domain_Model_Entry $entry) {
		$this->entryRepository->remove($entry);
		$this->flashMessageContainer->add('Your Entry was removed.');
		$this->redirect('list');
	}

}
?>