<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Client;
use Cake\Event\Event;
use Cake\Http\Response;
use Cake\Mailer\Email;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 *
 * @method \App\Model\Entity\Student[] paginate($object = null, array $settings = [])
 */
class StudentsController extends AppController
{


    public function showPoint(){

    $this->viewBuilder()->layout('');

        $http = new Client([
      'host' => 'daa.uit.edu.vn',
      'scheme' => 'https',
      'ssl_verify_peer' => false,
      'ssl_verify_depth' => false,
      'ssl_verify_host' => false

    ]);

      


    $student_points = $this->Students->find();

    foreach ($student_points as $student_point) {

    $respone = $http->post('/sinhvien/kqhoctap',[ 'name' => $student_point->student_code, 'pass' => base64_decode($student_point->student_password), 'form_build_id'=>'', 'form_id' => 'user_login_block' ]);

    $respone = $http->get('/sinhvien/kqhoctap')->body();


    $curent_term_info = $this->Point->getTermInfo($respone);

    $respone = $http->post('/user/logout');

    if(is_array($curent_term_info) == false)
    {
        //Trường hợp này chưa có điểm cho học kì hiện tại, $current_term_info đang là string: "Hiện tại chưa có dữ liệu"
        continue;
    }

  

    $point = '';
        foreach ($curent_term_info as $key) {

        $point .= "<tr> <td> ".$key['MaHp']." </td> <td> ".$key['TenHp']." </td> <td> ".$key['QT']." </td> <td> ".$key['GK']." </td> <td> ".$key['TH']." </td> <td> ".$key['CK']." </td> <td> ".$key['DiemHP']." </td> </tr> ";
         }

    $foot_mess = $this->Template->emailFoot();
    //Nếu đây là query lần đầu của sinh viên mới thì gửi mail thông báo "Bạn đăng kí nhận thông báo thành công"
    if($student_point->student_html_point == null){

        $new_point = $this->Students->get($student_point->id);
        $new_point->student_html_point = $point;
        if($this->Students->save($new_point)){

         $head_first_mess = $this->Template->emailFirstHead();

         $email = new Email();
         $email->transport('gmail3');
         $subject='Thông báo đăng kí nhận thông báo điểm từ Daa thành công';
         $mess_first = "<div style = 'margin-top: 20px; margin-bottom: 20px'><b>Cám ơn bạn đã tin tưởng sử dụng hệ thống báo điểm của chúng tôi! <br> Bạn sẽ nhận được bảng điểm mới qua email này khi có điểm vừa cập nhật!</b></div>";

         $mess_ok = $head_first_mess.$mess_first.$foot_mess;
         $email->from(['ngoclazy719@gmail.com' => 'UIT Point Reminder'])
              ->to($student_point->student_email)
              ->setHeaders(['Content-type' => 'text/html'])
              ->subject($subject)                  
              ->send($mess_ok);

        }

      
        continue;

    }

    $head_mess = $this->Template->emailHead();
    //Xử lý nếu point có thay đổi thì lưu thông tin và gửi mail


     // $res =  $this->Point->htmlDiff(" à à à à á ạ ả ã â ầ ấ ậ ẩ ẫ ă  ằ ắ ặ ẳ ẵ è é ẹ ẻ ẽ ê ề ế ệ ể ễ ì í ị ỉ ĩ ò ó ọ ỏ õ ô ồ ố ộ ổ ỗ ơ ờ ớ ợ ở ỡ ù ú ụ ủ ũ ư ừ ứ ự ử ữ ỳ ý ỵ ỷ ỹ đ À Á Ạ Ả Ã Â Ầ Ấ Ậ Ẩ Ẫ Ă Ằ Ắ Ặ Ẳ Ẵ È É Ẹ Ẻ Ẽ Ê Ề Ế Ệ Ể Ễ Í Ị Ỉ Ĩ Ò Ó Ọ Ỏ Õ Ô Ồ Ố Ộ Ổ Ỗ Ơ Ờ Ớ Ợ Ở Ỡ Ù Ú Ụ Ủ Ũ Ư Ừ Ứ Ự Ử Ữ Ỳ Ý Ỵ Ỷ Ỹ Đ", "à à à à á ạ ả ã â ầ ấ ậ ẩ ẫ ă  ằ ắ ặ ẳ ẵ è é ẹ ẻ ẽ ê ề ế ệ ể ễ ì í ị ỉ ĩ ò ó ọ ỏ õ ô ồ ố ộ ổ ỗ ơ ờ ớ ợ ở ỡ ù ú ụ ủ ũ ư ừ ứ ự ử ữ ỳ ý ỵ ỷ ỹ đ À Á Ạ Ả Ã Â Ầ Ấ Ậ Ẩ Ẫ Ă Ằ Ắ Ặ Ẳ Ẵ È É Ẹ Ẻ Ẽ Ê Ề Ế Ệ Ể Ễ Í Ị Ỉ Ĩ Ò Ó Ọ Ỏ Õ Ô Ồ Ố Ộ Ổ Ỗ Ơ Ờ Ớ Ợ Ở Ỡ Ù Ú Ụ Ủ Ũ Ư Ừ Ứ Ự Ử Ữ Ỳ Ý Ỵ Ỷ Ỹ Đ hehe");

        // print  "<pre>".$res."</pre>";

    if($point != $student_point->student_html_point){

        $res =  $this->Point->htmlDiff($student_point->student_html_point, $point);
        $new_point = $this->Students->get($student_point->id);
        $new_point->student_html_point = $point;
        $this->Students->save($new_point);
        
       
        $final_mess = $head_mess.$res.$foot_mess;
       // $ret = $this->Point->htmlDiff($student_point->student_html_point, $point);
   
       //echo '<pre>'.$final_mess.'</pre>';
       
         $email = new Email();
         $email->transport('gmail3');
         $subject='Điểm thi cập nhật ngày '.date('d-m-Y');
         $email->from(['ngoclazy719@gmail.com' => 'UIT Point Reminder'])
              ->to($student_point->student_email)
              ->setHeaders(['Content-type' => 'text/html'])
              ->subject($subject)                  
              ->send($final_mess);
     //   echo $student_point->student_email;

    }



    }

 }
    


}
