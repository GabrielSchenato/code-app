<?php

namespace CodePress\CodeApp\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property string frontLayout Get/Set property frontLayout
 */
class AppConfig extends Model
{

    protected $table = 'codepress_appconfig';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'options',
    ];
    protected $casts = [
        'options' => 'array'
    ];
    protected $optionsFields = [
        'frontLayout'
    ];

    public function __get($key)
    {
        if ($key != 'options' && in_array($key, $this->optionsFields)) {
            return parent::__get('options')[$key];
        }
        return parent::__get($key);
    }

    public function __set($key, $value)
    {
        if ($key != 'options' && in_array($key, $this->optionsFields)) {
            $options = $this->options;
            $options[$key] = $value;
            return parent::__set('options', $options);
        }
        return parent::__set($key, $value);
    }

}
