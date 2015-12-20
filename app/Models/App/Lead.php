<?php

namespace Curema\Models\App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use SoftDeletes;

    protected $guarded = [];

    public function changes()
    {
        return $this->hasMany('Curema\Models\App\Change')
            ->orderBy('updated_at', 'DESC');
    }

    public function user()
    {
        return $this->belongsTo('Curema\Models\User')
            ->withTrashed()
            ->orderBy('updated_at', 'DESC');
    }
}
