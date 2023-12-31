<?php

namespace Suppme\ModelNotes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Note extends Model {

    protected $guarded = [];

    protected $table = 'notes';

    protected $casts = ['created_at' => 'datetime'];

    public function model(): MorphTo
    {
        return $this->morphTo();
    }

    public function __toString(): string
    {
        return $this->note;
    }

    public function getTimeAgoAttribute() {
        return $this->created_at? $this->created_at->diffForHumans() : '';
    }
}
