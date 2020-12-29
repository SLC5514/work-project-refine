<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends \Spatie\Permission\Models\Permission
{
    protected $fillable = [
        'name', 'display_name', 'parent_id', 'sort',
    ];

    protected $hidden = [
        'route',
    ];

    public $id_pid_list;
    public $pids;

    public function __construct(array $attributes = [])
    {
        $this->getIdPidList();

        $attributes['guard_name'] = $attributes['guard_name'] ?? config('auth.defaults.guard');

        parent::__construct($attributes);
    }

    //子权限
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }

    /**
     * Notes: 获取子权限的父级权限
     * User: HuFei
     * Name: getIdLink
     * DateTime: 2020/10/28 10:49
     * @param $id
     * @param array $list
     * @return array
     */
    public function getIdLink($id, $list = array()){
        if(!$id){
            return $list;
        }
        if(!in_array($id,$list)) {
            array_unshift($list, $id);
        }
        if(!$this->id_pid_list[$id]){
            return $list;
        }
        $list = $this->getIdLink($this->id_pid_list[$id],$list);
        return $list;
    }

    /**
     * Notes: 根据权限id列表，获取所有上级id
     * User: HuFei
     * Name: getLinkByIds
     * DateTime: 2020/10/28 11:13
     * @param $ids
     * @return array
     */
    public function getLinkByIds($ids){
        if(!$this->id_pid_list){
            $this->getIdPidList();
        }
        $list = array();
        foreach ($ids as $id){
            $arr = $this->getIdLink($id);
            $list = array_merge($list,$arr);
        }
        return $list;
    }

    /**
     * Notes: 获取非叶子节点id
     * User: HuFei
     * Name: getPidList
     * DateTime: 2020/10/28 16:05
     */
    public function getPidList(){
        if(!$this->id_pid_list){
            $this->getIdPidList();
        }
        $list = array();
        foreach ($this->id_pid_list as $id=>$pid){
            if($pid > 0 && !in_array($pid, $list)){
                $list[] = $pid;
            }
        }
        $this->pids = $list;
    }

    /**
     * Notes: 排除非叶子节点id
     * User: HuFei
     * Name: delPids
     * DateTime: 2020/10/28 16:10
     * @param $ids
     * @return array
     */
    public function delPids($ids){
        if(!$this->pids){
            $this->getPidList();
        }
        //先取交集，再取差集
        $list = array_diff($ids,array_intersect($ids,$this->pids));
        return array_values($list);
    }

    protected function getIdPidList(){
        $list = self::pluck('parent_id','id');
        $this->id_pid_list = $list;
    }
}
