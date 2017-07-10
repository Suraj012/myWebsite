<?php
class Profile extends CI_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('ProfileModel');
    }

    function index()
    {
        // $this->load->view('user');
    }

    //Profile Start..
    public function profile_add(){
//            for decoding blob image
//         $imageB = $this->input->post('image');
//         $image = base64_decode($imageB);
        $param= array(
            'uid' => $this->input->post('uid'),
            'name' => $this->input->post('name'),
            'designation' => $this->input->post('designation'),
            'description' => $this->input->post('description'),
            'facebook' => $this->input->post('facebook'),
            'google' => $this->input->post('google'),
            'twitter' => $this->input->post('twitter'),
            'instagram' => $this->input->post('instagram'),
            'websites' => $this->input->post('websites'),
            'image' => $this->input->post('image')
        );
        if (isset($_POST['uid']) && isset($_POST['name']) && isset($_POST['designation'])&& isset($_POST['description'])&& isset($_POST['facebook'])&& isset($_POST['google']) && isset($_POST['twitter']) && isset($_POST['instagram']) && isset($_POST['websites']) && isset($_POST['image']) && count($_POST) == 10) {
            $data = $this->ProfileModel->addProfile($param);
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
  
  public function profile_get(){
      $param= array(
          'uid' => $this->input->post('uid'),
          'deviceId' => $this->input->post('deviceId')
      );
      if (isset($_POST['uid']) && isset($_POST['deviceId']) && count($_POST) == 2) {
          $data = $this->ProfileModel->getProfile($param);
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
  
  //Profile End..
  
  //Experience Start...
  
  public function experience_get(){
      $param= array(
          'uid' => $this->input->post('uid'),
          'deviceId' => $this->input->post('deviceId')
      );
      if (isset($_POST['uid']) && isset($_POST['deviceId']) && count($_POST) == 2) {
          $data = $this->ProfileModel->getExperience($param);
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
  
  public function experience_add(){
      $param= array(
          'uid' => $this->input->post('uid'),
          'title' => $this->input->post('title'),
          'company' => $this->input->post('company'),
          'description' => $this->input->post('description'),
          'datefrom' => $this->input->post('datefrom'),
          'dateto' => $this->input->post('dateto')
      );
      if (isset($_POST['uid']) && isset($_POST['title']) && isset($_POST['company'])&& isset($_POST['description'])&& isset($_POST['datefrom'])&& isset($_POST['dateto']) && count($_POST) == 6) {
          $data = $this->ProfileModel->addExperience($param);
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
  
  public function experience_edit(){
      $param= array(
          'id' => $this->input->post('id'),
          'title' => $this->input->post('title'),
          'company' => $this->input->post('company'),
          'description' => $this->input->post('description'),
          'datefrom' => $this->input->post('datefrom'),
          'dateto' => $this->input->post('dateto')
      );
      if (isset($_POST['id']) && isset($_POST['title']) && isset($_POST['company'])&& isset($_POST['description'])&& isset($_POST['datefrom'])&& isset($_POST['dateto']) && count($_POST) == 6) {
          $data = $this->ProfileModel->editExperience($param);
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
  
  public function experience_delete(){
      $param= array(
          'id' => $this->input->post('id')         
      );
      if (isset($_POST['id']) && count($_POST) == 1) {
          $data = $this->ProfileModel->deleteExperience($param);
           $result = json_encode($data);
           echo $result;
      }else {
          $data = array(
              'status' => 1,
              'message' => "invalid"
          );
          $result = json_encode($data);
          echo $result;
      }
  }
  //Experience End..
  
  //Skill Start..
  
  public function skill_get(){
      $param= array(
          'uid' => $this->input->post('uid'),
          'deviceId' => $this->input->post('deviceId')
      );
      if (isset($_POST['uid']) && count($_POST) == 2) {
          $data = $this->ProfileModel->getSkill($param);
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
  
  public function skill_add(){
      $param= array(
          'uid' => $this->input->post('uid'),
          'skill' => $this->input->post('skill'),
          'rate' => $this->input->post('rate')
      );
      if (isset($_POST['uid']) && isset($_POST['skill']) && isset($_POST['rate']) && count($_POST) == 3) {
          $data = $this->ProfileModel->addSkill($param);
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
  
  public function skill_edit(){
      $param= array(
          'id' => $this->input->post('id'),
          'skill' => $this->input->post('skill'),
          'rate' => $this->input->post('rate')
      );
      if (isset($_POST['id']) && isset($_POST['skill']) && isset($_POST['rate']) && count($_POST) == 3) {
          $data = $this->ProfileModel->editSkill($param);
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
  
  public function skill_delete(){
      $param= array(
          'id' => $this->input->post('id')
      );
      if (isset($_POST['id']) && count($_POST) == 1) {
          $data = $this->ProfileModel->deleteSkill($param);
          $result = json_encode($data);
          echo $result;
      }else {
          $data = array(
              'status' => 1,
              'message' => "invalid"
          );
          $result = json_encode($data);
          echo $result;
      }
  }
  
  //Skill End..
  
  //Education Start..
  
  public function education_get(){
      $param= array(
          'uid' => $this->input->post('uid'),
          'deviceId' => $this->input->post('deviceId')
      );
      if (isset($_POST['uid']) && isset($_POST['deviceId']) && count($_POST) == 2) {
          $data = $this->ProfileModel->getEducation($param);
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
  
  public function education_add(){
      $param= array(
          'uid' => $this->input->post('uid'),
          'degree' => $this->input->post('degree'),
          'college' => $this->input->post('college'),
          'university' => $this->input->post('university'),
          'marks' => $this->input->post('marks'),
          'start_date' => $this->input->post('start_date'),
          'end_date' => $this->input->post('end_date')
      );
      if (isset($_POST['uid']) && isset($_POST['degree']) && isset($_POST['college']) && isset($_POST['university']) && isset($_POST['marks']) && isset($_POST['start_date']) && isset($_POST['end_date']) && count($_POST) == 7) {
          $data = $this->ProfileModel->addEducation($param);
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
  
  public function education_edit(){
       $param= array(
          'id' => $this->input->post('id'),
          'degree' => $this->input->post('degree'),
          'college' => $this->input->post('college'),
          'university' => $this->input->post('university'),
          'marks' => $this->input->post('marks'),
          'start_date' => $this->input->post('start_date'),
          'end_date' => $this->input->post('end_date')
      );
      if (isset($_POST['id']) && isset($_POST['degree']) && isset($_POST['college']) && isset($_POST['university']) && isset($_POST['marks']) && isset($_POST['start_date']) && isset($_POST['end_date']) && count($_POST) == 7) {
          $data = $this->ProfileModel->editEducation($param);
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
  
  public function education_delete(){
      $param= array(
          'id' => $this->input->post('id')
      );
      if (isset($_POST['id']) && count($_POST) == 1) {
          $data = $this->ProfileModel->deleteEducation($param);
          $result = json_encode($data);
          echo $result;
      }else {
          $data = array(
              'status' => 1,
              'message' => "invalid"
          );
          $result = json_encode($data);
          echo $result;
      }
  }
  
  //Education End..
  
  //Contact Start..
  public function contact_add(){
      $param= array(
          'uid' => $this->input->post('uid'),
          'address' => $this->input->post('address'),
          'city' => $this->input->post('city'),
          'country' => $this->input->post('country'),
          'latitude' => $this->input->post('latitude'),
          'longitude' => $this->input->post('longitude'),
          'phone' => $this->input->post('phone'),
          'primaryEmail' => $this->input->post('primaryEmail'),
          'secondaryEmail' => $this->input->post('secondaryEmail')
      );
      if (isset($_POST['uid']) && isset($_POST['address']) && isset($_POST['city'])&& isset($_POST['country'])&& isset($_POST['latitude'])&& isset($_POST['longitude']) && isset($_POST['phone']) && isset($_POST['primaryEmail']) && isset($_POST['secondaryEmail']) && count($_POST) == 9) {
          $data = $this->ProfileModel->addContact($param);
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
  
  public function contact_get(){
      $param= array(
          'uid' => $this->input->post('uid'),
          'deviceId' => $this->input->post('deviceId')
      );
      if (isset($_POST['uid']) && isset($_POST['deviceId']) && count($_POST) == 2) {
          $data = $this->ProfileModel->getContact($param);
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
  
  //Contact End..
  
  //Category Start..
  
  public function category_get(){
      $param= array(
          'uid' => $this->input->post('uid')
      );
      if (isset($_POST['uid']) && count($_POST) == 1) {
          $data = $this->ProfileModel->getCategory($param);
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
  
  public function category_add(){
      $param= array(
          'uid' => $this->input->post('uid'),
          'category' => $this->input->post('category')
      );
      if (isset($_POST['uid']) && isset($_POST['category']) == 2) {
          $data = $this->ProfileModel->addCategory($param);
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
  
  public function category_edit(){
      $param= array(
          'id' => $this->input->post('id'),
          'category' => $this->input->post('category')        
      );
      if (isset($_POST['id']) && isset($_POST['category']) == 2) {
          $data = $this->ProfileModel->editCategory($param);
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
  
  public function category_delete(){
      $param= array(
          'id' => $this->input->post('id')
      );
      if (isset($_POST['id']) && count($_POST) == 1) {
          $data = $this->ProfileModel->deleteCategory($param);
          $result = json_encode($data);
          echo $result;
      }else {
          $data = array(
              'status' => 1,
              'message' => "invalid"
          );
          $result = json_encode($data);
          echo $result;
      }
  }
  
  //Category End..
  
  //Portfolio Start..
  
  public function portfolio_get(){
      $param= array(
          'id' => $this->input->post('id')
      );
      if (isset($_POST['uid']) && count($_POST) == 1) {
          $data = $this->ProfileModel->getCategory($param);
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
  
  public function portfolio_add(){
      $param= array(
          'uid' => $this->input->post('uid'),
          'category' => $this->input->post('category')
      );
      if (isset($_POST['uid']) && isset($_POST['category']) == 2) {
          $data = $this->ProfileModel->addCategory($param);
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
  
  public function profile_edit(){
      $param= array(
          'id' => $this->input->post('id'),
          'category' => $this->input->post('category')
      );
      if (isset($_POST['id']) && isset($_POST['category']) == 2) {
          $data = $this->ProfileModel->editCategory($param);
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
  
  public function profile_delete(){
      $param= array(
          'id' => $this->input->post('id')
      );
      if (isset($_POST['id']) && count($_POST) == 1) {
          $data = $this->ProfileModel->deleteCategory($param);
          $result = json_encode($data);
          echo $result;
      }else {
          $data = array(
              'status' => 1,
              'message' => "invalid"
          );
          $result = json_encode($data);
          echo $result;
      }
  }
  
  //Portfolio End..
  
}
?>