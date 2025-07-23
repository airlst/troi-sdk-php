<?php

declare(strict_types=1);

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\Billing\DeleteBilling;
use Troi\V2\Requests\Billing\FetchAllBillingsForTheGivenParameter;
use Troi\V2\Requests\Billing\FetchBillingForTheGivenBillingId;
use Troi\V2\Requests\Billing\SaveBilling;
use Troi\V2\Requests\Billing\UpdateBilling;
use Troi\V2\Resource;

class Billing extends Resource
{
    /**
     * @param int    $clientId              employeeId or calculationPositionId or projectId or subprojectId or startDate+endDate is mandatory
     * @param int    $calculationPositionId Fetch all billings for the given calculation position ID
     * @param int    $projectId             Fetch all billings for the given project ID
     * @param int    $subprojectId          Fetch all billings for the given subproject ID
     * @param string $startDate             Fetch all billings for the given start date
     * @param string $endDate               Fetch all billings for the given end date
     * @param bool   $extendedObject        extended object contains the full calculation position display path
     * @param bool   $fillsyncitems         Fetch all billings and fill the empty objects if there are any
     */
    public function fetchAllBillingsForTheGivenParameter(
        int $clientId,
        ?int $calculationPositionId = null,
        ?int $projectId = null,
        ?int $subprojectId = null,
        ?string $startDate = null,
        ?string $endDate = null,
        ?bool $extendedObject = null,
        ?bool $fillsyncitems = null,
    ): Response {
        return $this->connector->send(new FetchAllBillingsForTheGivenParameter($clientId, $calculationPositionId, $projectId, $subprojectId, $startDate, $endDate, $extendedObject, $fillsyncitems));
    }

    /**
     * @param float|int $quantity
     */
    public function saveBilling(
        mixed $client = null,
        mixed $calculationPosition = null,
        ?array $service = null,
        mixed $employee = null,
        ?string $date = null,
        float|int|null $quantity = null,
        ?string $remark = null,
        ?bool $isBillable = null,
        ?bool $isBilled = null,
        ?bool $isInvoiced = null,
        ?bool $isApproved = null,
        ?int $id = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new SaveBilling($client, $calculationPosition, $service, $employee, $date, $quantity, $remark, $isBillable, $isBilled, $isInvoiced, $isApproved, $id, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int  $id             Fetch Billing for the given Billing ID
     * @param bool $extendedObject extended object contains the full calculation position display path
     */
    public function fetchBillingForTheGivenBillingId(int $id, ?bool $extendedObject = null): Response
    {
        return $this->connector->send(new FetchBillingForTheGivenBillingId($id, $extendedObject));
    }

    /**
     * @param int       $id       Billing id
     * @param float|int $quantity
     */
    public function updateBilling(
        int $id,
        mixed $client = null,
        mixed $calculationPosition = null,
        ?array $service = null,
        mixed $employee = null,
        ?string $date = null,
        float|int|null $quantity = null,
        ?string $remark = null,
        ?bool $isBillable = null,
        ?bool $isBilled = null,
        ?bool $isInvoiced = null,
        ?bool $isApproved = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new UpdateBilling($id, $client, $calculationPosition, $service, $employee, $date, $quantity, $remark, $isBillable, $isBilled, $isInvoiced, $isApproved, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Billing id
     */
    public function deleteBilling(int $id): Response
    {
        return $this->connector->send(new DeleteBilling($id));
    }
}
