<?php

declare(strict_types=1);

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\Projects\DeleteProject;
use Troi\V2\Requests\Projects\FetchAllProjectsFromGivenClient;
use Troi\V2\Requests\Projects\FetchProjectForTheGivenProjectId;
use Troi\V2\Requests\Projects\SaveProject;
use Troi\V2\Requests\Projects\UpdateProject;
use Troi\V2\Resource;

class Projects extends Resource
{
    /**
     * @param int    $clientId           Client ID
     * @param int    $from               Fetch all projects for the given client ID and start with given project ID, use togehter with "size"
     * @param int    $size               Fetch all projects for the given client ID and start with given project ID, use togehter with "from"
     * @param string $since              Fetch all projects for the given client ID and given date, only items modified since ETag will be returned
     * @param bool   $syncItem           Fetch all projects for the given client ID and set syncitems "true" to return ApiSyncItems
     * @param string $customerId         Fetch all projects for the given client ID and given customer ID
     * @param bool   $customerIsActive   Fetch all projects for the given client ID and given parameter, set to "true" to get only projects of active customers
     * @param bool   $projectIsInProcess Fetch all projects for the given client ID and given parameter, set to "true" to get only "in process" projects
     * @param mixed  $projectStatusId    Fetch all projects for the given client ID and given project status ID
     * @param mixed  $projectTypeId      Fetch all projects for the given client ID and given project type ID
     * @param int    $projectLeaderId    Fetch all projects for the given client ID and given leader ID
     * @param string $search             Fetch all projects for the given client ID and givenSearch Term
     * @param bool   $extendedObject     Fetch all projects for the given client ID and extend it with real objects instead of sync item
     */
    public function fetchAllProjectsFromGivenClient(
        int $clientId,
        ?int $from = null,
        ?int $size = null,
        ?string $since = null,
        ?bool $syncItem = null,
        ?string $customerId = null,
        ?bool $customerIsActive = null,
        ?bool $projectIsInProcess = null,
        mixed $projectStatusId = null,
        mixed $projectTypeId = null,
        ?int $projectLeaderId = null,
        ?string $search = null,
        ?bool $extendedObject = null,
    ): Response {
        return $this->connector->send(new FetchAllProjectsFromGivenClient($clientId, $from, $size, $since, $syncItem, $customerId, $customerIsActive, $projectIsInProcess, $projectStatusId, $projectTypeId, $projectLeaderId, $search, $extendedObject));
    }

    public function saveProject(
        ?string $name = null,
        ?string $number = null,
        ?array $client = null,
        ?array $customer = null,
        ?string $externalDescription = null,
        ?string $internalDescription = null,
        mixed $status = null,
        ?array $currency = null,
        ?bool $isApproved = null,
        ?bool $isBlocked = null,
        ?array $blockedBy = null,
        ?array $leader = null,
        ?array $team = null,
        ?int $typeId = null,
        ?int $taxRateId = null,
        ?int $projectFolderId = null,
        ?int $foreignServicesCpIp = null,
        ?array $projectTypes = null,
        ?array $contact = null,
        ?int $invoiceRecipientId = null,
        ?int $invoiceRecipientPersonId = null,
        ?string $reportingDate = null,
        ?string $approvedDate = null,
        ?string $createdBy = null,
        ?string $modifiedBy = null,
        ?string $deletedBy = null,
        ?string $createdAt = null,
        ?string $modifiedAt = null,
        ?string $deletedAt = null,
        ?string $projectIssueTrackerProjectKey = null,
        ?int $id = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new SaveProject($name, $number, $client, $customer, $externalDescription, $internalDescription, $status, $currency, $isApproved, $isBlocked, $blockedBy, $leader, $team, $typeId, $taxRateId, $projectFolderId, $foreignServicesCpIp, $projectTypes, $contact, $invoiceRecipientId, $invoiceRecipientPersonId, $reportingDate, $approvedDate, $createdBy, $modifiedBy, $deletedBy, $createdAt, $modifiedAt, $deletedAt, $projectIssueTrackerProjectKey, $id, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Fetch project for the project ID
     */
    public function fetchProjectForTheGivenProjectId(int $id): Response
    {
        return $this->connector->send(new FetchProjectForTheGivenProjectId($id));
    }

    /**
     * @param int $id Project ID
     */
    public function updateProject(
        int $id,
        ?string $name = null,
        ?string $number = null,
        ?array $client = null,
        ?array $customer = null,
        ?string $externalDescription = null,
        ?string $internalDescription = null,
        mixed $status = null,
        ?array $currency = null,
        ?bool $isApproved = null,
        ?bool $isBlocked = null,
        ?array $blockedBy = null,
        ?array $leader = null,
        ?array $team = null,
        ?int $typeId = null,
        ?int $taxRateId = null,
        ?int $projectFolderId = null,
        ?int $foreignServicesCpIp = null,
        ?array $projectTypes = null,
        ?array $contact = null,
        ?int $invoiceRecipientId = null,
        ?int $invoiceRecipientPersonId = null,
        ?string $reportingDate = null,
        ?string $approvedDate = null,
        ?string $createdBy = null,
        ?string $modifiedBy = null,
        ?string $deletedBy = null,
        ?string $createdAt = null,
        ?string $modifiedAt = null,
        ?string $deletedAt = null,
        ?string $projectIssueTrackerProjectKey = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new UpdateProject($id, $name, $number, $client, $customer, $externalDescription, $internalDescription, $status, $currency, $isApproved, $isBlocked, $blockedBy, $leader, $team, $typeId, $taxRateId, $projectFolderId, $foreignServicesCpIp, $projectTypes, $contact, $invoiceRecipientId, $invoiceRecipientPersonId, $reportingDate, $approvedDate, $createdBy, $modifiedBy, $deletedBy, $createdAt, $modifiedAt, $deletedAt, $projectIssueTrackerProjectKey, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Project ID
     */
    public function deleteProject(int $id): Response
    {
        return $this->connector->send(new DeleteProject($id));
    }
}
