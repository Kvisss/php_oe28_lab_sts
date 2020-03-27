<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserTask extends Model
{
    protected $table = 'user_task';
    protected $fillable = [
        'user_id',
        'task_id',
        'report',
    ];

    public static function getReport($user_id, $id_task){
        $report = DB::table('task_user')
            ->where([
                ['user_id', '=', 2],
                ['task_id', '=', 1]
            ])
            ->get();
        return $report;
    }
}
