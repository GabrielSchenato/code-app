<?php

namespace CodePress\CodeApp\Models;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{

    protected $table = 'codepress_layouts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'dirname',
    ];
}
