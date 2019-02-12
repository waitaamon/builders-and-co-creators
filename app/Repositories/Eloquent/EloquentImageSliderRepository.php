<?php
/**
 * Created by PhpStorm.
 * User: amon
 * Date: 9/19/18
 * Time: 9:00 AM
 */

namespace App\Repositories\Eloquent;


use App\Models\SliderImage;
use App\Repositories\Contracts\ImageSliderRepository;
use App\Repositories\RepositoryAbstract;

class EloquentImageSliderRepository extends RepositoryAbstract implements ImageSliderRepository
{
    public function entity() {

        return SliderImage::class;
    }

}