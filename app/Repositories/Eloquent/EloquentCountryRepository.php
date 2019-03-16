<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:37 PM
 */

namespace App\Repositories\Eloquent;

use App\Models\Directory\Country;
use App\Repositories\Contracts\CountryRepository;
use App\Repositories\RepositoryAbstract;

class EloquentCountryRepository extends RepositoryAbstract implements CountryRepository
{
    public function entity() {

        return Country::class;
    }
}