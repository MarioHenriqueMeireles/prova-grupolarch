<?php

namespace App\Packages\Address\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Packages\Address\Repositories\AddressRepository;
use App\Packages\Address\Models\Address;
use App\Packages\Address\Presenters\AddressPresenter;
use App\Packages\Address\Validators\AddressValidator;

/**
 * Class AddressRepositoryEloquent
 * @package namespace App\Packages\Address\Repositories;
 */
class AddressRepositoryEloquent extends BaseRepository implements AddressRepository
{

    protected $skipPresenter = true;

    public function model()
    {
        return Address::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function states()
    {
        return Address::STATES;
    }

    public function presenter()
    {
        return AddressPresenter::class;
    }

}
