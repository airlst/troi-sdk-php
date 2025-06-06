<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Contacts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all contacts.
 *
 * Fetch all contacts
 */
class FetchAllContacts extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param bool|null   $syncItem      Fetch Contacts and return them as Sync Item
     * @param int|null    $from          Fetch Contacts from the given ID, use togehter with "from"
     * @param int|null    $size          Fetch Contacts for the given size use together with "size"
     * @param string|null $since         Fetch Contacts for the given date time (only items modified since ETag will be returned)
     * @param bool|null   $favoritesOnly Fetch favorites Contacts only
     * @param string|null $contactType   Fetch Contacts for the given Contact Type
     * @param string|null $search        Fetch Contacts for the given Search Term
     * @param string|null $searchField   Fetch Contacts for the given Search Field
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
     * @param int|null    $withCustomFields         Fetch Contacts for the given with Custom Field
     * @param int|null    $parentId                 Fetch Contacts for the given parent ID
     * @param bool|null   $isAssociatedWithCustomer show all contacts that associated with some customer
     * @param bool|null   $onlyInactive             show all inactive contacts
     * @param string|null $externalId               <PUT SOME DESCRIPTION>
     */
    public function __construct(
        protected ?bool $syncItem = null,
        protected ?int $from = null,
        protected ?int $size = null,
        protected ?string $since = null,
        protected ?bool $favoritesOnly = null,
        protected ?string $contactType = null,
        protected ?string $search = null,
        protected ?string $searchField = null,
        protected ?int $withCustomFields = null,
        protected ?int $parentId = null,
        protected ?bool $isAssociatedWithCustomer = null,
        protected ?bool $onlyInactive = null,
        protected ?string $externalId = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/contacts';
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'syncItem' => $this->syncItem,
            'from' => $this->from,
            'size' => $this->size,
            'since' => $this->since,
            'favoritesOnly' => $this->favoritesOnly,
            'contactType' => $this->contactType,
            'search' => $this->search,
            'searchField' => $this->searchField,
            'withCustomFields' => $this->withCustomFields,
            'parentId' => $this->parentId,
            'isAssociatedWithCustomer' => $this->isAssociatedWithCustomer,
            'onlyInactive' => $this->onlyInactive,
            'externalId' => $this->externalId,
        ]);
    }
}
