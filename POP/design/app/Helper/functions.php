<?php

use App\Models\Permission;
use Illuminate\Support\Facades\App;

if (!function_exists('tree')) {
    /**
     * 处理权限分类
     * @param array $list
     * @param string $pk
     * @param string $pid
     * @param string $child
     * @param int $root
     * @param int $type     返回数组需求：1-索引数组，2-关联数组
     * @return array
     */
    function tree($list = [], $pk = 'id', $pid = 'parent_id', $child = '_child', $root = 0, $type = 1)
    {
        if (empty($list)) {
            $list = Permission::get()->toArray();
        }
        // 创建Tree
        $tree = array();
        if (is_array($list)) {
            // 创建基于主键的数组引用
            $refer = array();
            foreach ($list as $key => $data) {
                if (strpos($data[$pid], ',')) {
                    unset($list[$key]);
                    $parent_arr = explode(',', $data[$pid]);
                    foreach ($parent_arr as $parentid) {
                        $data[$pid] = $parentid;
                        $list[] = $data;
                    }

                }
                $refer[$data[$pk]] =& $list[$key];
            }
            foreach ($list as $key => $data) {
                if (empty($data)) {
                    continue;
                }
                // 判断是否存在parent
                $parentId = $data[$pid];
                if ($root == $parentId) {
                    $tree[] =& $list[$key];
                } else {
                    if (isset($refer[$parentId])) {
                        $parent =& $refer[$parentId];
                        if($type === 2){   //关联数组
                            $parent[$child][$key] =& $list[$key];
                        }else {
                            $parent[$child][] =& $list[$key];
                        }
                    }
                }
            }
        }
        return $tree;
    }

    if (!function_exists('unicodeDecode') && !function_exists('replace_unicode_escape_sequence')) {
        /**
         * Notes: unicode字符串解码
         * User: HuFei
         * Name: unicodeDecode
         * DateTime: 2020/10/28 10:05
         * @param $data
         * @return string|string[]|null
         */
        function unicodeDecode($data)
        {
            $rs = preg_replace_callback('/\\\\u([0-9a-f]{4})/i', 'replace_unicode_escape_sequence', $data);

            return $rs;
        }
        function replace_unicode_escape_sequence($match)
        {
            return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UCS-2BE');
        }
    }
}
