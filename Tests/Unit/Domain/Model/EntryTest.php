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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Tx_Visitorsbook_Domain_Model_Entry.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage Visitors Book
 *
 * @author Thomas Löffler <loeffler@spooner-web.de>
 */
class Tx_Visitorsbook_Domain_Model_EntryTest extends Tx_Extbase_Tests_Unit_BaseTestCase {
	/**
	 * @var Tx_Visitorsbook_Domain_Model_Entry
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new Tx_Visitorsbook_Domain_Model_Entry();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setNameForStringSetsName() { 
		$this->fixture->setName('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getName()
		);
	}
	
	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail() { 
		$this->fixture->setEmail('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getEmail()
		);
	}
	
	/**
	 * @test
	 */
	public function getIpReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setIpForStringSetsIp() { 
		$this->fixture->setIp('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getIp()
		);
	}
	
	/**
	 * @test
	 */
	public function getEntryReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setEntryForStringSetsEntry() { 
		$this->fixture->setEntry('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getEntry()
		);
	}
	
	/**
	 * @test
	 */
	public function getNotificationReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getNotification()
		);
	}

	/**
	 * @test
	 */
	public function setNotificationForBooleanSetsNotification() { 
		$this->fixture->setNotification(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getNotification()
		);
	}
	
	/**
	 * @test
	 */
	public function getApprovedReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getApproved()
		);
	}

	/**
	 * @test
	 */
	public function setApprovedForBooleanSetsApproved() { 
		$this->fixture->setApproved(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getApproved()
		);
	}
	
	/**
	 * @test
	 */
	public function getSpamReturnsInitialValueForBoolean() { 
		$this->assertSame(
			TRUE,
			$this->fixture->getSpam()
		);
	}

	/**
	 * @test
	 */
	public function setSpamForBooleanSetsSpam() { 
		$this->fixture->setSpam(TRUE);

		$this->assertSame(
			TRUE,
			$this->fixture->getSpam()
		);
	}
	
	/**
	 * @test
	 */
	public function getChildEntriesReturnsInitialValueForObjectStorageContainingTx_Visitorsbook_Domain_Model_Entry() { 
		$newObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->fixture->getChildEntries()
		);
	}

	/**
	 * @test
	 */
	public function setChildEntriesForObjectStorageContainingTx_Visitorsbook_Domain_Model_EntrySetsChildEntries() { 
		$childEntry = new Tx_Visitorsbook_Domain_Model_Entry();
		$objectStorageHoldingExactlyOneChildEntries = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneChildEntries->attach($childEntry);
		$this->fixture->setChildEntries($objectStorageHoldingExactlyOneChildEntries);

		$this->assertSame(
			$objectStorageHoldingExactlyOneChildEntries,
			$this->fixture->getChildEntries()
		);
	}
	
	/**
	 * @test
	 */
	public function addChildEntryToObjectStorageHoldingChildEntries() {
		$childEntry = new Tx_Visitorsbook_Domain_Model_Entry();
		$objectStorageHoldingExactlyOneChildEntry = new Tx_Extbase_Persistence_ObjectStorage();
		$objectStorageHoldingExactlyOneChildEntry->attach($childEntry);
		$this->fixture->addChildEntry($childEntry);

		$this->assertEquals(
			$objectStorageHoldingExactlyOneChildEntry,
			$this->fixture->getChildEntries()
		);
	}

	/**
	 * @test
	 */
	public function removeChildEntryFromObjectStorageHoldingChildEntries() {
		$childEntry = new Tx_Visitorsbook_Domain_Model_Entry();
		$localObjectStorage = new Tx_Extbase_Persistence_ObjectStorage();
		$localObjectStorage->attach($childEntry);
		$localObjectStorage->detach($childEntry);
		$this->fixture->addChildEntry($childEntry);
		$this->fixture->removeChildEntry($childEntry);

		$this->assertEquals(
			$localObjectStorage,
			$this->fixture->getChildEntries()
		);
	}
	
	/**
	 * @test
	 */
	public function getFeuserReturnsInitialValueForTx_Extbase_Domain_Model_FrontendUser() { }

	/**
	 * @test
	 */
	public function setFeuserForTx_Extbase_Domain_Model_FrontendUserSetsFeuser() { }
	
}
?>