<?php

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\Contacts\DeleteContact;
use Troi\V2\Requests\Contacts\DeleteContactByExternalId;
use Troi\V2\Requests\Contacts\FetchAllContacts;
use Troi\V2\Requests\Contacts\FetchContactByExternalId;
use Troi\V2\Requests\Contacts\FetchContactForTheGivenId;
use Troi\V2\Requests\Contacts\SaveContact;
use Troi\V2\Requests\Contacts\UpdateContact;
use Troi\V2\Requests\Contacts\UpdateContactByExternalId;
use Troi\V2\Resource;

class Contacts extends Resource
{
	/**
	 * @param bool $syncItem Fetch Contacts and return them as Sync Item
	 * @param int $from Fetch Contacts from the given ID, use togehter with "from"
	 * @param int $size Fetch Contacts for the given size use together with "size"
	 * @param string $since Fetch Contacts for the given date time (only items modified since ETag will be returned)
	 * @param bool $favoritesOnly Fetch favorites Contacts only
	 * @param string $contactType Fetch Contacts for the given Contact Type
	 * @param string $search Fetch Contacts for the given Search Term
	 * @param string $searchField Fetch Contacts for the given Search Field
	 *
	 * single value:
	 * searchField={"categoryId":392}
	 *
	 * multiple values:
	 * searchField={"categoryId":[392,396]}
	 *
	 * available search options:
	 * `categoryId` - string|array
	 * `firstName` - string
	 * `middleName` - string
	 * `lastName` - string
	 * `fullName` - string
	 * `privateEmail` - string
	 * `officeEmail` - string
	 * `companyEmail` - string
	 * `isDeleted` - bool
	 * @param int $withCustomFields Fetch Contacts for the given with Custom Field
	 * @param int $parentId Fetch Contacts for the given parent ID
	 * @param bool $isAssociatedWithCustomer show all contacts that associated with some customer
	 * @param bool $onlyInactive show all inactive contacts
	 * @param string $externalId <PUT SOME DESCRIPTION>
	 */
	public function fetchAllContacts(
		?bool $syncItem = null,
		?int $from = null,
		?int $size = null,
		?string $since = null,
		?bool $favoritesOnly = null,
		?string $contactType = null,
		?string $search = null,
		?string $searchField = null,
		?int $withCustomFields = null,
		?int $parentId = null,
		?bool $isAssociatedWithCustomer = null,
		?bool $onlyInactive = null,
		?string $externalId = null,
	): Response
	{
		return $this->connector->send(new FetchAllContacts($syncItem, $from, $size, $since, $favoritesOnly, $contactType, $search, $searchField, $withCustomFields, $parentId, $isAssociatedWithCustomer, $onlyInactive, $externalId));
	}


	public function saveContact(): Response
	{
		return $this->connector->send(new SaveContact());
	}


	/**
	 * @param int $id Fetch contact for the given ID
	 */
	public function fetchContactForTheGivenId(int $id): Response
	{
		return $this->connector->send(new FetchContactForTheGivenId($id));
	}


	/**
	 * @param int $id Contact ID
	 */
	public function updateContact(int $id): Response
	{
		return $this->connector->send(new UpdateContact($id));
	}


	/**
	 * @param int $id Contact ID
	 */
	public function deleteContact(int $id): Response
	{
		return $this->connector->send(new DeleteContact($id));
	}


	/**
	 * @param int $id external contact ID
	 */
	public function fetchContactByExternalId(int $id): Response
	{
		return $this->connector->send(new FetchContactByExternalId($id));
	}


	/**
	 * @param int $id external contact ID
	 */
	public function updateContactByExternalId(int $id): Response
	{
		return $this->connector->send(new UpdateContactByExternalId($id));
	}


	/**
	 * @param int $id external contact ID
	 */
	public function deleteContactByExternalId(int $id): Response
	{
		return $this->connector->send(new DeleteContactByExternalId($id));
	}
}
