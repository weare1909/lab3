<?php
use Phalcon\Mvc\View;
class EditController extends ControllerBase{
 
  public function beforeExecuteRoute(){ // function ที่ทำงานก่อนเริ่มการทำงานของระบบทั้งระบบ
	  $this->checkAuthen();
   } 

 public function indexAction(){
	if($this->request->isPost()){

      $photoUpdate='';
      if($this->request->hasFiles() == true){
          $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
       $uploads = $this->request->getUploadedFiles();
     
         $isUploaded = false;			
         foreach($uploads as $upload){
           if(in_array($upload->gettype(), $allowed)){					
            $photoName=md5(uniqid(rand(), true)).strtolower($upload->getname());
            $path = '../public/img/'.$photoName;
            ($upload->moveTo($path)) ? $isUploaded = true : $isUploaded = false;
           }
         }
                
         if($isUploaded)  $photoUpdate=$photoName ;
     }else
          die('You must choose at least one file to send. Please try again.');
    
    $id=$this->session->get('id');
    $kuy=Event::findFirst("id='$id'");
    $kuy->name=trim($this->request->getPost('name'));
    $kuy->date=trim($this->request->getPost('birth'));
    $kuy->detail=trim($this->request->getPost('detail'));
    $kuy->picture=$photoUpdate;
    $kuy->save();
    $this->response->redirect('event');
  }
  }

}
