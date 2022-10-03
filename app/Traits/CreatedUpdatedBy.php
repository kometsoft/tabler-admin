<?php

namespace Tabler\App\Traits;

use App\Models\User;

trait CreatedUpdatedBy
{
	public static function bootCreatedUpdatedBy()
	{
		static::creating(function ($model) {
			$model->created_by = auth()->id();
		});

		static::updating(function ($model) {
			$model->updated_by = auth()->id();
		});
	}

	public function creator()
	{
		return $this->belongsTo(User::class, 'created_by')->withDefault();
	}

	public function updator()
	{
		return $this->belongsTo(User::class, 'updated_by')->withDefault();
	}
}
