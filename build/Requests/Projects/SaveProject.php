<?php

declare(strict_types=1);

namespace Troi\V2\Requests\Projects;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Save project.
 *
 * Save project
 */
class SaveProject extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected ?string $name = null,
        protected ?string $number = null,
        protected ?array $client = null,
        protected ?array $customer = null,
        protected ?string $externalDescription = null,
        protected ?string $internalDescription = null,
        protected mixed $status = null,
        protected ?array $currency = null,
        protected ?bool $isApproved = null,
        protected ?bool $isBlocked = null,
        protected ?array $blockedBy = null,
        protected ?array $leader = null,
        protected ?array $team = null,
        protected ?int $typeId = null,
        protected ?int $taxRateId = null,
        protected ?int $projectFolderId = null,
        protected ?int $foreignServicesCpIp = null,
        protected ?array $projectTypes = null,
        protected ?array $contact = null,
        protected ?int $invoiceRecipientId = null,
        protected ?int $invoiceRecipientPersonId = null,
        protected ?string $reportingDate = null,
        protected ?string $approvedDate = null,
        protected ?string $createdBy = null,
        protected ?string $modifiedBy = null,
        protected ?string $deletedBy = null,
        protected ?string $createdAt = null,
        protected ?string $modifiedAt = null,
        protected ?string $deletedAt = null,
        protected ?string $projectIssueTrackerProjectKey = null,
        protected ?int $id = null,
        protected ?string $path = null,
        protected ?string $etag = null,
        protected ?bool $isDeleted = null,
        protected ?string $className = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/projects';
    }

    public function defaultBody(): array
    {
        return array_filter([
            'Name' => $this->name,
            'Number' => $this->number,
            'Client' => $this->client,
            'Customer' => $this->customer,
            'ExternalDescription' => $this->externalDescription,
            'InternalDescription' => $this->internalDescription,
            'Status' => $this->status,
            'Currency' => $this->currency,
            'IsApproved' => $this->isApproved,
            'IsBlocked' => $this->isBlocked,
            'BlockedBy' => $this->blockedBy,
            'Leader' => $this->leader,
            'Team' => $this->team,
            'TypeId' => $this->typeId,
            'TaxRateId' => $this->taxRateId,
            'ProjectFolderId' => $this->projectFolderId,
            'ForeignServicesCpIp' => $this->foreignServicesCpIp,
            'ProjectTypes' => $this->projectTypes,
            'Contact' => $this->contact,
            'InvoiceRecipientId' => $this->invoiceRecipientId,
            'InvoiceRecipientPersonId' => $this->invoiceRecipientPersonId,
            'ReportingDate' => $this->reportingDate,
            'ApprovedDate' => $this->approvedDate,
            'CreatedBy' => $this->createdBy,
            'ModifiedBy' => $this->modifiedBy,
            'DeletedBy' => $this->deletedBy,
            'CreatedAt' => $this->createdAt,
            'ModifiedAt' => $this->modifiedAt,
            'DeletedAt' => $this->deletedAt,
            'projectIssueTrackerProjectKey' => $this->projectIssueTrackerProjectKey,
            'Id' => $this->id,
            'Path' => $this->path,
            'ETag' => $this->etag,
            'IsDeleted' => $this->isDeleted,
            'ClassName' => $this->className,
        ]);
    }
}
