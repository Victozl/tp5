<?php
namespace app\admin\model;
use think\Model;
class Admin extends Model{
    protected static function init()
    {
        //TODO:自定义的初始化
    }

    public function add_admin($data)
    {
        if(empty($data) || !is_array($data))
        {
            return false;
        }
        if($data['password'])
        {
            $data['password']=md5($data['password']);
        }
        if($this->save($data))
        {
            return true;
        }else{
            return false;
        }
    }

    public function getAdmin()
    {
        return $this::paginate(10);
    }

    public function del_id($id)
    {
        if($this::destroy($id))
        {
            return 1;
        }else{
            return 0;
        }

    }


    public function logout()
    {

    }

}