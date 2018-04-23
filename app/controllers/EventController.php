<?php
use Phalcon\Mvc\View;
class EventController extends ControllerBase{
 
  public function beforeExecuteRoute(){ // function ที่ทำงานก่อนเริ่มการทำงานของระบบทั้งระบบ
	  $this->checkAuthen();
   } 


 public function indexAction(){
	
  }
  public function toEditAction($id)
  {
    
    $this->session->set('id', $id);
    $this->response->redirect('edit');
  }
  public function deleteAction($id)
  {
    $kuy=Event::findFirst("id='$id'");
    $kuy->delete();
    $this->response->redirect('event');
  }
}
