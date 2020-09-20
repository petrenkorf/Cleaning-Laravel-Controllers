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
        $clonedAttributes = $attributes;

        $this->fillBooleansByExistence($clonedAttributes);

        return parent::fill($clonedAttributes);
    }

    protected function fillBooleansByExistence(array &$attributes)
    {
        foreach ($this->casts as $field => $type) {
            if ($type == 'boolean') {
                $this->is_active = array_key_exists($field, $attributes);
            }
        }
    }
}
