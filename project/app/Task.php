<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function project(){

        return $this->belongsTo(Project::class);
    }

    protected $guarded = [];

    public function complete($completed = true){
        $this->update(compact('completed'));
    }

    public function incomplete(){
        $this->complete(false);
    }
}
