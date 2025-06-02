<?php

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\ContactAccessGroups\FetchAllAccessGroupsForContacts;
use Troi\V2\Resource;

class ContactAccessGroups extends Resource
{
	public function fetchAllAccessGroupsForContacts(): Response
	{
		return $this->connector->send(new FetchAllAccessGroupsForContacts());
	}
}
