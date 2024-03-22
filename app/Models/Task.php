<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function reporter()
    {
        return $this->hasOne(User::class, 'id', 'reporter_id');
    }

    public function assignee()
    {
        return $this->hasOne(User::class, 'id', 'assignee_id');
    }

    public function priority()
    {
        return $this->hasOne(Priority::class, 'id', 'priority_id');
    }

    public function taskStatus()
    {
        return $this->hasOne(TaskStatus::class, 'id', 'status_id');
    }
}
