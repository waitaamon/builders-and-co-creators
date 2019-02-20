<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:37 PM
 */

namespace App\Repositories\Eloquent;

use App\Models\Video;
use App\Repositories\Contracts\VideoRepository;
use App\Repositories\RepositoryAbstract;

class EloquentVideoRepository extends RepositoryAbstract implements VideoRepository
{

    public function entity() {

        return Video::class;
    }

    public function findBySlug($slug)
    {
        return $this->findWhereFirst('slug', $slug);
    }

    public function createTopics($videoId, array $properties)
    {
        return $this->find($videoId)->topics()->sync($properties);
    }
}