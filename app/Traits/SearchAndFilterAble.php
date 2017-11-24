<?php namespace App\Traits;

use Exception;

trait SearchAndFilterAble {
    public function scopeSearch($query, $text) {
        if (!$this->searchable) {
            throw new Exception("The searchable is require in model which use SearchAndFilterAble");
        }
        if ($this->searchable) {
            foreach($this->searchable as $field) {
                $query->orWhere($field, 'LIKE', '%' . $text . '%');
            }
        }
        return $query;
    }
}