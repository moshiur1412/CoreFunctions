<?php

namespace App\Models\Traits;

trait OrderableTrait {

    public function scopeLatestFirst($query) {
		return $query->orderBy('created_at', 'desc');
	}

	public function scopeOldestFirst($query) {
		return $query->orderBy('created_at', 'asc');
	}
}