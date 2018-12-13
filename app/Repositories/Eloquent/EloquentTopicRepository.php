<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:37 PM
 */

namespace App\Repositories\Eloquent;


use App\Repositories\Contracts\TopicRepository;
use App\Repositories\RepositoryAbstract;
use App\Topic;

class EloquentTopicRepository extends RepositoryAbstract implements TopicRepository
{

    public function entity() {

        return Topic::class;
    }

    public function findBySlug($slug)
    {
        return $this->findWhereFirst('slug', $slug);
    }
}