<?php
namespace app\admin\controller;
use think\Controller;
class Common extends Controller{
 public function _initialize()
 {
     if(!session('id') || !session('name'))
     {
         $this->error('请登入',url('login/login'));
     }
 }


}
