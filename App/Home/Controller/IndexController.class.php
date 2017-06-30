<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display();
    }
    public function article(){
        $this->display();
    }
    public function notice(){
        $this->display();
    }
    public function comment(){
        $this->display();
    }
    public function category(){
        $this->display();
    }
    public function flink(){
        $this->display();
    }
    public function manage(){
        $this->display();
    }
    public function loginlog(){
        $this->display();
    }
    public function setting(){
        $this->display();
    }
    public function readset(){
        $this->display();
    }
    public function add_article(){
        $this->display();
    }
    public function add_category(){
        $this->display();
    }
    public function add_flink(){
        $this->display();
    }
    public function add_notice(){
        $this->display();
    }
    /*         public function login(){
     $this->display();
     } */
    public function update_article(){
        $this->display();
    }
    public function update_category(){
        $this->display();
    }
    public function update_flink(){
        $this->display();
    }
    //-=注册--界面
    public function zhuce(){
        $this->display();
    }


    
    //--上传图片
    public function wenjian(){
        $model=M("tupian");
        $res=$model->select();
        $this->assign("data",$res);//赋值给模板
        $this->display();
    }
    public function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728 ;// 设置附件上传大小
        $upload->autoSub=false; //这个属性设置成FALSE就没有时间文件夹
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath = './Uploads/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录 // 上传文件          分类管理
        $info = $upload->upload();
        print_r($info);
        if(!$info) {
            // 上传错误提示错误信息
            $this->error($upload->getError());
        }else{
            // 上传成功
            $this->success('上传成功！');
        }
        $model=M("tupian");
        $model->title = $info["photo"]["savename"];
        $model->add();
    }
    public function dell(){
        $model=M("tupian");
        $id=I("get.id");
        $model->delete($id);
        $this->success("删除成功",'wenjian');
        //             $this->display("Index/iew");
    
    }
    
    //--------验证码----------
    public function code(){
//        $Verify = new \Think\Verify();
//        $Verify->entry();

        $Verify = new \Think\Verify();
        $Verify->fontSize=25;
        $Verify->length=3;
        $Verify->useCurve=false;
        $Verify->entry(8);
    }
    public function yan(){
    $Verify = new \Think\Verify();
    $code=I("post.ycode");
    if($Verify->check($code,8)){
//        echo "验证码成功";
        $this->success("验证码成功",'login');
    }else{
        echo "验证码错误";
    }
//            $Verify->entry();
}
    
    /*---------------头像处理--------------------*/
    public function img(){
        $img= new \Think\Image();
        $img->open('./try.jpg');
        echo $img->width();//获取宽
        //            echo $img->height();//获取高
        //            echo $img->mime();//获取图片信息
        //            $img->crop(400,400)->save("./crop.jpg");//裁剪
        $img->thumb(150,150)->save("./crop.jpg");
    
    }
    
    
    
    
}
















