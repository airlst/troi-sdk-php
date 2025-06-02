<?php

namespace Troi\V2\Requests\AccountGroups;

use DateTime;
use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Fetch all account groups for the given clientId
 *
 * Fetch all account groups for the given clientId
 */
class FetchAllAccountGroupsForTheGivenClientId extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/accountGroups";
	}


	/**
	 * @param int $clientId Client ID
	 */
	public function __construct(
		protected int $clientId,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter(['clientId' => $this->clientId]);
	}
}
