<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todolist extends Model
{
    public function tasks()
    {
        return $this->hasMany('App\Task');
    }
}
