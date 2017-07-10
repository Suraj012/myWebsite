<?php
class User extends CI_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('UserModel');
    }

    function index()
    {
        // $this->load->view('user');
    }

    public function users_add(){
        $param= array(
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'pass' => $this->input->post('password'),
            'gender' => $this->input->post('gender'),
            'contact' => $this->input->post('contact'),
            'deviceId' => $this->input->post('deviceId')
        );
        if (isset($_POST['name']) && isset($_POST['email'])&& isset($_POST['username'])&& isset($_POST['password'])&& isset($_POST['contact']) && isset($_POST['gender']) && isset($_POST['deviceId']) && count($_POST) == 7) {
            $data = $this->UserModel->addUser($param);
            echo $data;
        }else {
            $data = array(
                    'status' => 1,
                    'message' => "invalid"
            );
            $result = json_encode($data);
            echo $result;
    }
  }
  
  public function test(){
      $param= array(
          'name' => $this->input->get('name'),
          'email' => $this->input->get('email'),
          'mobile'=> $this->input->post('mobile'),
          'address'=>$this->input->post('address')
      );
      if (isset($_POST['name']) && isset($_POST['email']) && count($_POST) == 2) {
      //if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address']) && count($_POST) == 4) {
          $data = array(array(
              'status' => 0,
              'message' => "Success",
              'name' => $param['name'],
              'email' => $param['email']
          ));
          $result = json_encode($data);
          echo $result;
      }else {
          $data = array(array(
              'status' => 1,
              'name' => $param['name'],
              'email' => $param['email'],
              'message' => "invalid"
          ));
          $result = json_encode($data);
          echo $result;
      }
  }
    
  public function test_123(){
      $param= array(
          'token_id' => $this->input->post('token_id'),
          'personName' => $this->input->post('personName'),
          'personEmail'=> $this->input->post('personEmail'),
          'photoURL'=>$this->input->post('photoURL')
      );
      if (isset($_POST['token_id']) && isset($_POST['personName']) && isset($_POST['photoUrl']) && isset($_POST['personEmail']) && count($_POST) == 4) {
          //if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['mobile']) && isset($_POST['address']) && count($_POST) == 4) {
          $data =array(
              'status' => 0,
              'message' => "Success",
              'personName' => $param['personName'],
              'personEmail' => $param['personEmail'],
              'photoURL' => $param['photoURL'],
              'token_id' => $param['token_id']
          );
          $result = json_encode($data);
          echo $result;
      }else {
          $data = array(
              'status' => 1,
              'personName' => $param['personName'],
              'personEmail' => $param['personEmail'],
              'photoURL' => $param['photoURL'],
              'token_id' => $param['token_id'],
              'message' => "invalid"
          );
          $result = json_encode($data);
          echo $result;
      }
  }
  
  public function test_add(){
      $param= array(
          'id' => $this->input->post('id'),
          'name' => $this->input->post('name'),
          'address' => $this->input->post('address'),
          'added_by' => $this->input->post('added_by')
      );
      if (isset($_POST['id']) && isset($_POST['name'])&& isset($_POST['address'])&& isset($_POST['added_by']) && count($_POST) == 4) {
          $data = $this->UserModel->addTest($param);
          echo $data;
      }else {
          $data = array(
              'status' => 1,
              'message' => "invalid"
          );
          $result = json_encode($data);
          echo $result;
      }
  }
  public function test_get(){
//       $param= array(
//           'email' => $this->input->post('email')
//       );
//       if (isset($_POST['email']) && count($_POST) == 1) {
          $data = $this->UserModel->getTest();
          echo $data;
//       }else {
//           $data = array(
//               'status' => 1,
//               'message' => "invalid"
//           );
//           $result = json_encode($data);
//           echo $result;
//       }
  }
  
  
  public function authentication(){
      $param= array(
          'username' => $this->input->post('username'),
          'pass' => $this->input->post('password'),
          'deviceId'=>$this->input->post('deviceId')
      );
      if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['deviceId']) && count($_POST) == 3) {
          $data = $this->UserModel->userLogin($param);
          echo $data;
      }else {
          $data = array(
              'status' => 1,
              'message' => "invalid"
          );
          $result = json_encode($data);
          echo $result;
      }
  }
  public function pdf(){
      
  }
}
?>