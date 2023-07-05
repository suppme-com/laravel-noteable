<?php

namespace Suppme\ModelNotes\Events;

use Suppme\ModelNotes\Note;

class NoteAdded {

    public $note;

    public function __construct(Note $note) {
        $this->note = $note;
    }
}
