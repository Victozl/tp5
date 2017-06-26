<?php
namespace app\admin\controller;
use app\admin\model\Cate as CateModel;
class Cate extends Common
{
    public function lst()
    {
        $cate =new CateModel();
        $data = $cate->cateTree();
        $this->assign('data',$data);
        return view();
    }

    public function add()
    {
        $cate =new CateModel();
        if(request()->isPost())
        {
            $cate->data(input('post.'));
            $add = $cate->save();
            if ($add)
            {
                $this->success('添加成功',url('lst'));
            }else{
                $this->error('添加失败');
            }
        }
        $cateRes = $cate->cateTree();
        $this->assign('cateres',$cateRes);
        return view();
    }
}
