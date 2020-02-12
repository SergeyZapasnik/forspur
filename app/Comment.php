<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'comments';

    protected $fillable = ['content', 'task_id', 'user_id'];

    /**
     * Get the task that owns the comment.
     */
    public function task()
    {
        return $this->belongsTo('App\Task');
    }

    /**
     * @param $taskId
     * @return \Illuminate\Support\Collection
     */
    public static function getDataByTaskId($taskId)
    {
        return DB::table('comments')
            ->select('content', 'task_id')
            ->where('task_id', '=', $taskId)
            ->orderBy('id')
            ->get();
    }
}
