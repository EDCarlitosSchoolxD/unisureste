<?php
namespace App\Repositories;

use App\Models\Image;

class ImageRepository extends BaseRepository{

    public function __construct(Image $image)
    {
        parent::__construct($image);
    }

}