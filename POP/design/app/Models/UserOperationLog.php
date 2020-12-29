<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserOperationLog extends Model
{
    protected $table = 'user_operation_logs';

    protected $fillable = ['user_id','uri','operate','params'];

    public static function setOperateLog($user_id,$uri,$operate,$params=array()){
        if(is_array($params)){
            $params = json_encode($params,360);
        }
        $status = self::create([
            'user_id' => $user_id,
            'uri' => $uri,
            'operate' => $operate,
            'params' => $params,
        ]);
        if(!$status){
            throw new \Exception('日志记录失败');
        }
        return true;
    }
}
