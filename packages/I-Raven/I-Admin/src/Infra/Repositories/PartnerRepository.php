<?php


namespace IRaven\IAdmin\Infra\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use IRaven\IAdmin\Domain\Contracts\Repositories\PartnerRepositoryContract;
use IRaven\IAdmin\Domain\Models\Partner;

/**
 * Class PartnerRepository
 * @package IRaven\IAdmin\Infra\Repositories
 */
class PartnerRepository implements PartnerRepositoryContract
{
    private $partner;

    /**
     * PartnerRepository constructor.
     * @param Partner $partner
     */
    public function __construct(Partner $partner)
    {
        $this->partner = $partner;
    }
}
