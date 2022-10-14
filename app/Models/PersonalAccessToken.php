<?php

namespace Tabler\App\Models;

use Laravel\Sanctum\PersonalAccessToken as Model;
 
class PersonalAccessToken extends Model
{
    public function getLastUsedAttribute()
    {
        $last_used = $this->last_used_at ? $this->last_used_at->diffForHumans() : 'Never';
        
        return <<<TEXT
        Last used: {$last_used}
        TEXT;
    }
}