<?php

namespace IRaven\IAdmin\Domain\Contracts\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use IRaven\IAdmin\Domain\Models\Partner;

/**
 * Interface PartnerRepositoryContract
 * @package IRaven\IAdmin\Domain\Contracts\Repositories
 */
interface PartnerRepositoryContract
{
    /**
     * @param string $slog
     * @return Partner
     * @throws ModelNotFoundException
     */
    public function getPartnerBySlog(string $slog): Partner;
}
