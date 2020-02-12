<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Task extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tasks';

    protected $fillable = ['name', 'description', 'status_id', 'user_id'];

    /**
     * Get the comments for the task.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public static function getDataWithCommentsNumber()
    {
        return DB::table('tasks')
            ->leftJoin('comments', 'tasks.id', '=', 'comments.task_id')
            ->select(
                'tasks.id',
                'tasks.status_id',
                'tasks.name',
                'tasks.description',
                DB::raw('COUNT(comments.content) as comment_count')
            )
            ->orderBy('tasks.status_id')
            ->orderBy('tasks.created_at')
            ->groupBy('tasks.id')
            ->get();
    }
}
