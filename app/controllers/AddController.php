<?php
use Phalcon\Mvc\View;
class AddController extends ControllerBase{
 
 public function indexAction(){
  if($this->request->isPost()){
    $kuy=new Event();
    $kuy->name=trim($this->request->getPost('name'));
    $kuy->date=trim($this->request->getPost('birth'));
    $kuy->detail=trim($this->request->getPost('detail'));
    $kuy->picture=trim($this->request->getPost('file'));
    $kuy->save();
    $this->response->redirect('event');
  }
    
    
  }
}
