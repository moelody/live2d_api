<?php class modelList {
    
    /* 获取模型列表 */
    function get_list($listName) {
        return json_decode(file_get_contents('../'.$listName.'.json'), 1);
    }
    
    /* 获取模组名称 */
    function id_to_name($listName, $id) {
        $list = self::get_list($listName);
        return $list['models'][(int)$id-1];
    }
    
    /* 转换模型名称 */
    function name_to_id($name) {
        $list = self::get_list();
        $id = array_search($name, $list['models']);
        return is_numeric($id) ? $id + 1 : false;
    }
    
}
