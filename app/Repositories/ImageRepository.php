<?php
namespace App\Repositories;

use Image;

class ImageRepository
{
    public function uploadAvatar($img)
    {
        $imagename = time().'.'.$img->getClientOriginalExtension();
        $destinationPath = public_path('/avatar/');
        $image = Image::make($img->getRealPath())
            ->resize(80, 80)
            ->save($destinationPath.$imagename, 60);
        return $imagename;
    }
}
