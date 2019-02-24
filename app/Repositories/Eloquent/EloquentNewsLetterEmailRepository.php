<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:37 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\NewsLetterEmail;
use App\Repositories\Contracts\NewLetterEmailRepository;
use App\Repositories\RepositoryAbstract;

class EloquentNewsLetterEmailRepository extends RepositoryAbstract implements NewLetterEmailRepository
{

    public function entity() {

        return NewsLetterEmail::class;
    }
}