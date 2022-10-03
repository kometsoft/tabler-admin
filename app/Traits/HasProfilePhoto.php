<?php

namespace Tabler\App\Traits;

trait HasProfilePhoto
{
    /**
     * Get the URL to the user's profile photo.
     *
     */
    public function getPhotoUrlAttribute()
    {
        // return "https://ui-avatars.com/api/?name=$this->name&color=333&background=e5e7eb";
        return "https://source.boringavatars.com/marble/120/$this->id?square&colors=264653,2a9d8f,e9c46a,f4a261,e76f51";
    }
}