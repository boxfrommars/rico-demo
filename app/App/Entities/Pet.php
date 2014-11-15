<?php
namespace App\Entities;

use Rutorika\Dashboard\Entities\Entity;
use Rutorika\Sortable\SortableTrait;

class Pet extends Entity
{
    use SortableTrait;

    protected $table = 'pets';
    protected $fillable = ['title', 'description', 'image', 'human_id'];

    public function human()
    {
        return $this->belongsTo('\App\Entities\Human');
    }
}
