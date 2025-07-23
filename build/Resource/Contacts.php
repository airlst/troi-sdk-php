<?php

declare(strict_types=1);

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
     * @param bool   $syncItem      Fetch Contacts and return them as Sync Item
     * @param int    $from          Fetch Contacts from the given ID, use togehter with "from"
     * @param int    $size          Fetch Contacts for the given size use together with "size"
     * @param string $since         Fetch Contacts for the given date time (only items modified since ETag will be returned)
     * @param bool   $favoritesOnly Fetch favorites Contacts only
     * @param string $contactType   Fetch Contacts for the given Contact Type
     * @param string $search        Fetch Contacts for the given Search Term
     * @param string $searchField   Fetch Contacts for the given Search Field
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
     * @param int    $withCustomFields         Fetch Contacts for the given with Custom Field
     * @param int    $parentId                 Fetch Contacts for the given parent ID
     * @param bool   $isAssociatedWithCustomer show all contacts that associated with some customer
     * @param bool   $onlyInactive             show all inactive contacts
     * @param string $externalId               <PUT SOME DESCRIPTION>
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
    ): Response {
        return $this->connector->send(new FetchAllContacts($syncItem, $from, $size, $since, $favoritesOnly, $contactType, $search, $searchField, $withCustomFields, $parentId, $isAssociatedWithCustomer, $onlyInactive, $externalId));
    }

    public function saveContact(
        ?string $type = null,
        ?string $name = null,
        ?string $salutation = null,
        ?string $name1 = null,
        ?string $name2 = null,
        ?string $name3 = null,
        ?array $categories = null,
        ?string $title = null,
        ?string $privateFax = null,
        ?string $privateMail = null,
        ?string $privateMobile = null,
        ?string $privatePhone = null,
        ?string $privateWeb = null,
        ?string $privateAddressCity = null,
        ?string $privateAddressCountry = null,
        ?string $privateAddressCountryIso = null,
        ?string $privateAddressState = null,
        ?string $privateAddressStreet = null,
        ?string $privateAddressZipCode = null,
        ?string $birthday = null,
        ?string $position = null,
        ?string $officePhone = null,
        ?string $officeMobile = null,
        ?string $officeFax = null,
        ?string $officeMail = null,
        ?string $companyPhone = null,
        ?string $companyFax = null,
        ?string $companyWeb = null,
        ?string $companyMail = null,
        ?string $companyAddressCity = null,
        ?string $companyAddressCountry = null,
        ?string $companyAddressCountryIso = null,
        ?string $companyAddressState = null,
        ?string $companyAddressStreet = null,
        ?string $companyAddressZipCode = null,
        ?string $remark = null,
        ?array $parent = null,
        ?array $employee = null,
        ?array $department = null,
        ?bool $isFavorite = null,
        ?bool $isInactive = null,
        ?string $externalId = null,
        ?int $accessGroup = null,
        ?array $createdBy = null,
        ?int $id = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new SaveContact($type, $name, $salutation, $name1, $name2, $name3, $categories, $title, $privateFax, $privateMail, $privateMobile, $privatePhone, $privateWeb, $privateAddressCity, $privateAddressCountry, $privateAddressCountryIso, $privateAddressState, $privateAddressStreet, $privateAddressZipCode, $birthday, $position, $officePhone, $officeMobile, $officeFax, $officeMail, $companyPhone, $companyFax, $companyWeb, $companyMail, $companyAddressCity, $companyAddressCountry, $companyAddressCountryIso, $companyAddressState, $companyAddressStreet, $companyAddressZipCode, $remark, $parent, $employee, $department, $isFavorite, $isInactive, $externalId, $accessGroup, $createdBy, $id, $path, $etag, $isDeleted, $className));
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
    public function updateContact(
        int $id,
        ?string $type = null,
        ?string $name = null,
        ?string $salutation = null,
        ?string $name1 = null,
        ?string $name2 = null,
        ?string $name3 = null,
        ?array $categories = null,
        ?string $title = null,
        ?string $privateFax = null,
        ?string $privateMail = null,
        ?string $privateMobile = null,
        ?string $privatePhone = null,
        ?string $privateWeb = null,
        ?string $privateAddressCity = null,
        ?string $privateAddressCountry = null,
        ?string $privateAddressCountryIso = null,
        ?string $privateAddressState = null,
        ?string $privateAddressStreet = null,
        ?string $privateAddressZipCode = null,
        ?string $birthday = null,
        ?string $position = null,
        ?string $officePhone = null,
        ?string $officeMobile = null,
        ?string $officeFax = null,
        ?string $officeMail = null,
        ?string $companyPhone = null,
        ?string $companyFax = null,
        ?string $companyWeb = null,
        ?string $companyMail = null,
        ?string $companyAddressCity = null,
        ?string $companyAddressCountry = null,
        ?string $companyAddressCountryIso = null,
        ?string $companyAddressState = null,
        ?string $companyAddressStreet = null,
        ?string $companyAddressZipCode = null,
        ?string $remark = null,
        ?array $parent = null,
        ?array $employee = null,
        ?array $department = null,
        ?bool $isFavorite = null,
        ?bool $isInactive = null,
        ?string $externalId = null,
        ?int $accessGroup = null,
        ?array $createdBy = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new UpdateContact($id, $type, $name, $salutation, $name1, $name2, $name3, $categories, $title, $privateFax, $privateMail, $privateMobile, $privatePhone, $privateWeb, $privateAddressCity, $privateAddressCountry, $privateAddressCountryIso, $privateAddressState, $privateAddressStreet, $privateAddressZipCode, $birthday, $position, $officePhone, $officeMobile, $officeFax, $officeMail, $companyPhone, $companyFax, $companyWeb, $companyMail, $companyAddressCity, $companyAddressCountry, $companyAddressCountryIso, $companyAddressState, $companyAddressStreet, $companyAddressZipCode, $remark, $parent, $employee, $department, $isFavorite, $isInactive, $externalId, $accessGroup, $createdBy, $path, $etag, $isDeleted, $className));
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
    public function updateContactByExternalId(
        int $id,
        ?string $type = null,
        ?string $name = null,
        ?string $salutation = null,
        ?string $name1 = null,
        ?string $name2 = null,
        ?string $name3 = null,
        ?array $categories = null,
        ?string $title = null,
        ?string $privateFax = null,
        ?string $privateMail = null,
        ?string $privateMobile = null,
        ?string $privatePhone = null,
        ?string $privateWeb = null,
        ?string $privateAddressCity = null,
        ?string $privateAddressCountry = null,
        ?string $privateAddressCountryIso = null,
        ?string $privateAddressState = null,
        ?string $privateAddressStreet = null,
        ?string $privateAddressZipCode = null,
        ?string $birthday = null,
        ?string $position = null,
        ?string $officePhone = null,
        ?string $officeMobile = null,
        ?string $officeFax = null,
        ?string $officeMail = null,
        ?string $companyPhone = null,
        ?string $companyFax = null,
        ?string $companyWeb = null,
        ?string $companyMail = null,
        ?string $companyAddressCity = null,
        ?string $companyAddressCountry = null,
        ?string $companyAddressCountryIso = null,
        ?string $companyAddressState = null,
        ?string $companyAddressStreet = null,
        ?string $companyAddressZipCode = null,
        ?string $remark = null,
        ?array $parent = null,
        ?array $employee = null,
        ?array $department = null,
        ?bool $isFavorite = null,
        ?bool $isInactive = null,
        ?string $externalId = null,
        ?int $accessGroup = null,
        ?array $createdBy = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new UpdateContactByExternalId($id, $type, $name, $salutation, $name1, $name2, $name3, $categories, $title, $privateFax, $privateMail, $privateMobile, $privatePhone, $privateWeb, $privateAddressCity, $privateAddressCountry, $privateAddressCountryIso, $privateAddressState, $privateAddressStreet, $privateAddressZipCode, $birthday, $position, $officePhone, $officeMobile, $officeFax, $officeMail, $companyPhone, $companyFax, $companyWeb, $companyMail, $companyAddressCity, $companyAddressCountry, $companyAddressCountryIso, $companyAddressState, $companyAddressStreet, $companyAddressZipCode, $remark, $parent, $employee, $department, $isFavorite, $isInactive, $externalId, $accessGroup, $createdBy, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id external contact ID
     */
    public function deleteContactByExternalId(int $id): Response
    {
        return $this->connector->send(new DeleteContactByExternalId($id));
    }
}
