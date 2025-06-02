<?php

namespace Troi\V2\Requests\ContactAccessGroups;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all access groups for contacts
 *
 * Fetch all access groups for contacts
 */
class FetchAllAccessGroupsForContacts extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/contactAccessGroups";
	}


	public function __construct()
	{
	}
}
