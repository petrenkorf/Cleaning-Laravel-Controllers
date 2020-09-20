<?php

namespace Studies;

use Illuminate\Database\Eloquent\Model;

class SampleStore extends Model
{
    protected $fillable = [
        'is_active',
        'antifraud_enabled',
        'name',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'antifraud_enabled' => 'boolean'
    ];

    public function fill(array $attributes)
    {
        $clonedAttributes = $this->fillBooleansByExistence($attributes);

        return parent::fill($clonedAttributes);
    }

    protected function fillBooleansByExistence(array $attributes)
    {
        foreach ($this->casts as $field => $type) {
            if ($type == 'boolean') {
                $attributes[$field] = array_key_exists($field, $attributes);
            }
        }

        return $attributes;
    }
}
