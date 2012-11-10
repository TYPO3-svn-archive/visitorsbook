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
class Tx_Visitorsbook_Domain_Model_Entry extends Tx_Extbase_DomainObject_AbstractEntity {

	/**
	 * name
	 *
	 * @var string
	 */
	protected $name;

	/**
	 * email
	 *
	 * @var string
	 */
	protected $email;

	/**
	 * IP of user
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $ip;

	/**
	 * entry
	 *
	 * @var string
	 * @validate NotEmpty
	 */
	protected $entry;

	/**
	 * Notification if new entries
	 *
	 * @var boolean
	 */
	protected $notification = FALSE;

	/**
	 * If approved, entry will be displayed
	 *
	 * @var boolean
	 */
	protected $approved = FALSE;

	/**
	 * Mark entry as spam
	 *
	 * @var boolean
	 */
	protected $spam = FALSE;

	/**
	 * childEntries
	 *
	 * @var Tx_Extbase_Persistence_ObjectStorage<Tx_Visitorsbook_Domain_Model_Entry>
	 * @lazy
	 */
	protected $childEntries;

	/**
	 * feuser
	 *
	 * @var Tx_Extbase_Domain_Model_FrontendUser
	 */
	protected $feuser;

	/**
	 * __construct
	 *
	 * @return void
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all Tx_Extbase_Persistence_ObjectStorage properties.
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		/**
		 * Do not modify this method!
		 * It will be rewritten on each save in the extension builder
		 * You may modify the constructor of this class instead
		 */
		$this->childEntries = new Tx_Extbase_Persistence_ObjectStorage();
	}

	/**
	 * Returns the name
	 *
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 *
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the email
	 *
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Sets the email
	 *
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Returns the ip
	 *
	 * @return string $ip
	 */
	public function getIp() {
		return $this->ip;
	}

	/**
	 * Sets the ip
	 *
	 * @param string $ip
	 * @return void
	 */
	public function setIp($ip) {
		$this->ip = $ip;
	}

	/**
	 * Returns the entry
	 *
	 * @return string $entry
	 */
	public function getEntry() {
		return $this->entry;
	}

	/**
	 * Sets the entry
	 *
	 * @param string $entry
	 * @return void
	 */
	public function setEntry($entry) {
		$this->entry = $entry;
	}

	/**
	 * Returns the notification
	 *
	 * @return boolean $notification
	 */
	public function getNotification() {
		return $this->notification;
	}

	/**
	 * Sets the notification
	 *
	 * @param boolean $notification
	 * @return void
	 */
	public function setNotification($notification) {
		$this->notification = $notification;
	}

	/**
	 * Returns the boolean state of notification
	 *
	 * @return boolean
	 */
	public function isNotification() {
		return $this->getNotification();
	}

	/**
	 * Returns the approved
	 *
	 * @return boolean $approved
	 */
	public function getApproved() {
		return $this->approved;
	}

	/**
	 * Sets the approved
	 *
	 * @param boolean $approved
	 * @return void
	 */
	public function setApproved($approved) {
		$this->approved = $approved;
	}

	/**
	 * Returns the boolean state of approved
	 *
	 * @return boolean
	 */
	public function isApproved() {
		return $this->getApproved();
	}

	/**
	 * Returns the spam
	 *
	 * @return boolean $spam
	 */
	public function getSpam() {
		return $this->spam;
	}

	/**
	 * Sets the spam
	 *
	 * @param boolean $spam
	 * @return void
	 */
	public function setSpam($spam) {
		$this->spam = $spam;
	}

	/**
	 * Returns the boolean state of spam
	 *
	 * @return boolean
	 */
	public function isSpam() {
		return $this->getSpam();
	}

	/**
	 * Adds a Entry
	 *
	 * @param Tx_Visitorsbook_Domain_Model_Entry $childEntry
	 * @return void
	 */
	public function addChildEntry(Tx_Visitorsbook_Domain_Model_Entry $childEntry) {
		$this->childEntries->attach($childEntry);
	}

	/**
	 * Removes a Entry
	 *
	 * @param Tx_Visitorsbook_Domain_Model_Entry $childEntryToRemove The Entry to be removed
	 * @return void
	 */
	public function removeChildEntry(Tx_Visitorsbook_Domain_Model_Entry $childEntryToRemove) {
		$this->childEntries->detach($childEntryToRemove);
	}

	/**
	 * Returns the childEntries
	 *
	 * @return Tx_Extbase_Persistence_ObjectStorage<Tx_Visitorsbook_Domain_Model_Entry> $childEntries
	 */
	public function getChildEntries() {
		return $this->childEntries;
	}

	/**
	 * Sets the childEntries
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage<Tx_Visitorsbook_Domain_Model_Entry> $childEntries
	 * @return void
	 */
	public function setChildEntries(Tx_Extbase_Persistence_ObjectStorage $childEntries) {
		$this->childEntries = $childEntries;
	}

	/**
	 * Returns the feuser
	 *
	 * @return Tx_Extbase_Domain_Model_FrontendUser $feuser
	 */
	public function getFeuser() {
		return $this->feuser;
	}

	/**
	 * Sets the feuser
	 *
	 * @param Tx_Extbase_Domain_Model_FrontendUser $feuser
	 * @return void
	 */
	public function setFeuser(Tx_Extbase_Domain_Model_FrontendUser $feuser) {
		$this->feuser = $feuser;
	}

}
?>