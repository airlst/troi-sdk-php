<?php

declare(strict_types=1);

namespace Troi\V2;

use Saloon\Http\Auth\BasicAuthenticator;
use Saloon\Http\Connector;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;
use Troi\V2\Resource\Absences;
use Troi\V2\Resource\AccountGroups;
use Troi\V2\Resource\AccountingEntries;
use Troi\V2\Resource\AccountingEntryCollections;
use Troi\V2\Resource\Accounts;
use Troi\V2\Resource\Billing;
use Troi\V2\Resource\BookingYear;
use Troi\V2\Resource\CalculationPositions;
use Troi\V2\Resource\CalendarEventParticipants;
use Troi\V2\Resource\CalendarEvents;
use Troi\V2\Resource\Categories;
use Troi\V2\Resource\Clients;
use Troi\V2\Resource\ContactAccessGroups;
use Troi\V2\Resource\Contacts;
use Troi\V2\Resource\Customers;
use Troi\V2\Resource\Projects;
use Troi\V2\Resource\Suppliers;

/**
 * Troi API.
 *
 * This is the official API documentation of Troi.
 *
 * # Authentication
 *
 * Troi offers basic auth for authentication.
 *
 * <security-definitions />
 */
class TroiSDK extends Connector
{
    use AlwaysThrowOnErrors;

    public function __construct(
        protected readonly string $customer,
        protected readonly string $username,
        protected readonly string $password,
    ) {}

    public function resolveBaseUrl(): string
    {
        return "https://{$this->customer}.troi.software/api/v2/rest";
    }

    public function absences(): Absences
    {
        return new Absences($this);
    }

    public function accountGroups(): AccountGroups
    {
        return new AccountGroups($this);
    }

    public function accountingEntries(): AccountingEntries
    {
        return new AccountingEntries($this);
    }

    public function accountingEntryCollections(): AccountingEntryCollections
    {
        return new AccountingEntryCollections($this);
    }

    public function accounts(): Accounts
    {
        return new Accounts($this);
    }

    public function billing(): Billing
    {
        return new Billing($this);
    }

    public function bookingYear(): BookingYear
    {
        return new BookingYear($this);
    }

    public function calculationPositions(): CalculationPositions
    {
        return new CalculationPositions($this);
    }

    public function calendarEventParticipants(): CalendarEventParticipants
    {
        return new CalendarEventParticipants($this);
    }

    public function calendarEvents(): CalendarEvents
    {
        return new CalendarEvents($this);
    }

    public function categories(): Categories
    {
        return new Categories($this);
    }

    public function clients(): Clients
    {
        return new Clients($this);
    }

    public function contactAccessGroups(): ContactAccessGroups
    {
        return new ContactAccessGroups($this);
    }

    public function contacts(): Contacts
    {
        return new Contacts($this);
    }

    public function customers(): Customers
    {
        return new Customers($this);
    }

    public function projects(): Projects
    {
        return new Projects($this);
    }

    public function suppliers(): Suppliers
    {
        return new Suppliers($this);
    }

    protected function defaultAuth(): BasicAuthenticator
    {
        return new BasicAuthenticator($this->username, $this->password);
    }
}
