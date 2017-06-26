<?php
namespace app\admin\controller;
use app\admin\model\Admin as AdminModel;
class Admin extends Common{
    public function lst(){

        $admin =new AdminModel();
        $data =$admin->getAdmin();
        $this->assign('data',$data);
        return view();
    }

    public function add(){
        if(request()->isPost()) {
            $admin = new AdminModel();
            if($admin->add_admin(input('post.'))) {
                $this->success('添加成功',url('lst'));
            }else{
                $this->success('添加失败',url('lst'));
            };
            return ;
        }
        return view();
    }

    public function edit($id){
        $res = AdminModel::find($id);
        if(request()->isPost())
        {
            $data = input('post.');
            if(!$data['password'])
            {
                $data['password'] =$res['password'];
            }else{
                $data['password'] =md5($data['password']);
            }

            if ($res->update($data) !==false)
            {
                $this->success('修改成功',url('lst'));
            }else{
                $this->error('修改失败');
            }
            return;
        }
        if (!$res)
        {
            $this->error('管理员不存在',url('lst'));
        }
        $this->assign('res',$res);
        return view();
    }

    public function del($id)
    {
        $admin = new AdminModel();
        $delnmu =$admin->del_id($id);
        if($delnmu =='1')
        {
            $this->success('删除成功',url('lst'));
        }else{
            $this->error('删除失败');
        }
    }



}
