<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name',
        'genre',
        'size',
        'description',
        'language',
        'release',
        'platform',
        'photo',
        'torrent',
    ];

    public function search($filter)
    {
        $results = $this
                    ->where('name', 'LIKE', "%{$filter}%")
                    ->orWhere('genre', 'LIKE', "%{$filter}%")
                    ->paginate(3);
        return $results;
    }
}
