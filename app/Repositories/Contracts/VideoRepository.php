<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/18/18
 * Time: 4:33 PM
 */

namespace App\Repositories\Contracts;


interface VideoRepository
{
    public function findBySlug($slug);

    public function createTopics($videoId, array $properties);
}