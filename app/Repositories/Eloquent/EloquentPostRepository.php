<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:37 PM
 */

namespace App\Repositories\Eloquent;


use App\Models\Topic;
use App\Repositories\Contracts\PostRepository;
use App\Repositories\RepositoryAbstract;

class EloquentPostRepository extends RepositoryAbstract implements PostRepository
{

    public function entity() {

        return Topic::class;
    }

    public function findBySlug($slug)
    {
        return $this->findWhereFirst('slug', $slug);
    }
}