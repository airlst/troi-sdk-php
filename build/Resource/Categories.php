<?php

declare(strict_types=1);

namespace Troi\V2\Resource;

use Saloon\Http\Response;
use Troi\V2\Requests\Categories\DeleteContactCategorie;
use Troi\V2\Requests\Categories\FetchAllContactCategories;
use Troi\V2\Requests\Categories\FetchContactCategorieById;
use Troi\V2\Requests\Categories\SaveContactCategory;
use Troi\V2\Requests\Categories\UpdateContactCategorie;
use Troi\V2\Resource;

class Categories extends Resource
{
    /**
     * @param int $contactId  Fetch all contact categories for the given contact ID
     * @param int $categoryId Fetch all contact categories for the given category ID
     * @param int $size       Fetch contact categories for the given size use together with "from"
     * @param int $from       Fetch contact category from the given ID use together with "size"
     */
    public function fetchAllContactCategories(
        ?int $contactId = null,
        ?int $categoryId = null,
        ?int $size = null,
        ?int $from = null,
    ): Response {
        return $this->connector->send(new FetchAllContactCategories($contactId, $categoryId, $size, $from));
    }

    public function saveContactCategory(
        ?string $name = null,
        ?array $category = null,
        ?array $contact = null,
        ?int $id = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new SaveContactCategory($name, $category, $contact, $id, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Fetch contact categorie by ID
     */
    public function fetchContactCategorieById(int $id): Response
    {
        return $this->connector->send(new FetchContactCategorieById($id));
    }

    /**
     * @param int $id Contact categorie ID
     */
    public function updateContactCategorie(
        int $id,
        ?string $name = null,
        ?array $category = null,
        ?array $contact = null,
        ?string $path = null,
        ?string $etag = null,
        ?bool $isDeleted = null,
        ?string $className = null,
    ): Response {
        return $this->connector->send(new UpdateContactCategorie($id, $name, $category, $contact, $path, $etag, $isDeleted, $className));
    }

    /**
     * @param int $id Contact categorie ID
     */
    public function deleteContactCategorie(int $id): Response
    {
        return $this->connector->send(new DeleteContactCategorie($id));
    }
}
