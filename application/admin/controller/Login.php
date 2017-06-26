<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Admin as AdminModel;
class Login extends controller{

    public function login()
    {
        if(request()->isPost())
        {
            $admin = AdminModel::getByname(input('name'));
            if(input('name')==$admin['name'] && md5(input('password'))==$admin['password'])
            {
                session('id',$admin['id']);
                session('name',$admin['name']);
                $this->success('登入成功',url('Index/index'));
            }else{
                $this->error('用户名或密码错误');
            }
        }
        return view();

    }
    public function logout()
    {
        session(null);
        $this->success('退出系统成功',url('admin/login/login'));

    }


}
