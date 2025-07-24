<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Contacts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

use function is_null;

/**
 * Save contact.
 *
 * Save contact
 */
class SaveContact extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected ?string $type = null,
        protected ?string $name = null,
        protected ?string $salutation = null,
        protected ?string $name1 = null,
        protected ?string $name2 = null,
        protected ?string $name3 = null,
        protected ?array $categories = null,
        protected ?string $title = null,
        protected ?string $privateFax = null,
        protected ?string $privateMail = null,
        protected ?string $privateMobile = null,
        protected ?string $privatePhone = null,
        protected ?string $privateWeb = null,
        protected ?string $privateAddressCity = null,
        protected ?string $privateAddressCountry = null,
        protected ?string $privateAddressCountryIso = null,
        protected ?string $privateAddressState = null,
        protected ?string $privateAddressStreet = null,
        protected ?string $privateAddressZipCode = null,
        protected ?string $birthday = null,
        protected ?string $position = null,
        protected ?string $officePhone = null,
        protected ?string $officeMobile = null,
        protected ?string $officeFax = null,
        protected ?string $officeMail = null,
        protected ?string $companyPhone = null,
        protected ?string $companyFax = null,
        protected ?string $companyWeb = null,
        protected ?string $companyMail = null,
        protected ?string $companyAddressCity = null,
        protected ?string $companyAddressCountry = null,
        protected ?string $companyAddressCountryIso = null,
        protected ?string $companyAddressState = null,
        protected ?string $companyAddressStreet = null,
        protected ?string $companyAddressZipCode = null,
        protected ?string $remark = null,
        protected ?array $parent = null,
        protected ?array $employee = null,
        protected ?array $department = null,
        protected ?bool $isFavorite = null,
        protected ?bool $isInactive = null,
        protected ?string $externalId = null,
        protected ?int $accessGroup = null,
        protected ?array $createdBy = null,
        protected ?int $id = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/contacts';
    }

    public function defaultBody(): array
    {
        return array_filter([
            'Type' => $this->type,
            'Name' => $this->name,
            'Salutation' => $this->salutation,
            'Name1' => $this->name1,
            'Name2' => $this->name2,
            'Name3' => $this->name3,
            'Categories' => $this->categories,
            'Title' => $this->title,
            'PrivateFax' => $this->privateFax,
            'PrivateMail' => $this->privateMail,
            'PrivateMobile' => $this->privateMobile,
            'PrivatePhone' => $this->privatePhone,
            'PrivateWeb' => $this->privateWeb,
            'PrivateAddressCity' => $this->privateAddressCity,
            'PrivateAddressCountry' => $this->privateAddressCountry,
            'PrivateAddressCountryIso' => $this->privateAddressCountryIso,
            'PrivateAddressState' => $this->privateAddressState,
            'PrivateAddressStreet' => $this->privateAddressStreet,
            'PrivateAddressZipCode' => $this->privateAddressZipCode,
            'Birthday' => $this->birthday,
            'Position' => $this->position,
            'OfficePhone' => $this->officePhone,
            'OfficeMobile' => $this->officeMobile,
            'OfficeFax' => $this->officeFax,
            'OfficeMail' => $this->officeMail,
            'CompanyPhone' => $this->companyPhone,
            'CompanyFax' => $this->companyFax,
            'CompanyWeb' => $this->companyWeb,
            'CompanyMail' => $this->companyMail,
            'CompanyAddressCity' => $this->companyAddressCity,
            'CompanyAddressCountry' => $this->companyAddressCountry,
            'CompanyAddressCountryIso' => $this->companyAddressCountryIso,
            'CompanyAddressState' => $this->companyAddressState,
            'CompanyAddressStreet' => $this->companyAddressStreet,
            'CompanyAddressZipCode' => $this->companyAddressZipCode,
            'Remark' => $this->remark,
            'Parent' => $this->parent,
            'Employee' => $this->employee,
            'Department' => $this->department,
            'IsFavorite' => $this->isFavorite,
            'IsInactive' => $this->isInactive,
            'ExternalId' => $this->externalId,
            'AccessGroup' => $this->accessGroup,
            'CreatedBy' => $this->createdBy,
            'Id' => $this->id,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ], fn (mixed $value): bool => ! is_null($value));
    }
}
