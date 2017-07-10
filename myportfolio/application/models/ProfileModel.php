<?php
class ProfileModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function addProfile($param)
    {
        $uid = $param['uid'];
        $name  = $param['name'];
        $designation  = $param['designation'];
        $description  = $param['description'];
        $facebook  = $param['facebook'];
        $google  = $param['google'];
        $twitter  = $param['twitter']; 
        $instagram = $param['instagram'];
        $websites = $param['websites'];
        $image = $param['image'];
        $sql = "SELECT * FROM tbl_user user, tbl_profile profile WHERE user.id = profile.uid";
        $query = $this->db->query($sql);
        $data = $query->result_array();
//         print_r($data);
//         die();
        if($data!=null){
            $this->db->set($param);
            $this->db->where("uid", $uid);
            if($this->db->update("tbl_profile", $param)){
                return "success";
            }
            
        }else{
        if($this->db->insert("tbl_profile", $param)){
            return "success";
           }
        }
    }
        
    public function getProfile($param)
    {
            $uid = $param['uid'];
            $deviceId  = $param['deviceId'];
            
            $sql = "SELECT * FROM tbl_profile profile WHERE uid = '$uid'";
            $query = $this->db->query($sql);
            $data = $query->result_array();
            //for encoding blob image
//             $data[0]['image'] = base64_encode( $data[0]['image']);
            if($data!=null){
                $data = array(
                    'status' => 0,
                    'data' => $data
                );
                $result = json_encode($data);
                return $result;        
            }else{
               $data = array(
              'status' => 1,
              'message' => "Not found any record"
          );
          $result = json_encode($data);
          return $result;
            }
    }
    
    //Experience Start..
    
    public function getExperience($param)
    {
        $uid = $param['uid'];
        $deviceId  = $param['deviceId'];
    
        $sql = "SELECT * FROM tbl_experience WHERE uid = '$uid'";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        if($data!=null){
            $data = array(
                'status' => 0,
                'data' => $data
            );
            $result = json_encode($data);
            return $result;
        }else{
            $data = array(
                'status' => 1,
                'message' => "invalid"
            );
            $result = json_encode($data);
            return $result;
        }
    }
    
    public function addExperience($param)
    {
        $uid = $param['uid'];
        $title  = $param['title'];
        $company  = $param['company'];
        $description  = $param['description'];
        $datefrom  = $param['datefrom'];
        $dateto  = $param['dateto'];
        
            if($this->db->insert("tbl_experience", $param)){
                return "success";
        }
    }
    
    public function editExperience($param)
    {
        $id = $param['id'];
        $title  = $param['title'];
        $company  = $param['company'];
        $description  = $param['description'];
        $datefrom  = $param['datefrom'];
        $dateto  = $param['dateto'];
    
     $this->db->set($param);
            $this->db->where("id", $id);
            if($this->db->update("tbl_experience", $param)){
                return "update success";
            }
    }
    
    public function deleteExperience($param)
    {
        $id = $param['id'];
    
        $this->db->set($param);
        $this->db->where("id", $id);
        if($this->db->delete("tbl_experience")){
             $data = array(
                'status' => 0,
                'message' => "Data deleted Successfully..!"
            );
            return $data;
        }
    }
    
    //Experience End..
    
    //Skill Start..
    
    public function getSkill($param)
    {
        $uid = $param['uid'];
        $deviceId  = $param['deviceId'];
    
        $sql = "SELECT * FROM tbl_skill WHERE uid = '$uid'";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        if($data!=null){
            $data = array(
                'status' => 0,
                'data' => $data
            );
            $result = json_encode($data);
            return $result;
        }else{
            $data = array(
                'status' => 1,
                'message' => "invalid"
            );
            $result = json_encode($data);
            return $result;
        }
    }
    
    public function addSkill($param)
    {
        $uid = $param['uid'];
        $skill  = $param['skill'];
        $rate  = $param['rate'];
    
        if($this->db->insert("tbl_skill", $param)){
            return "success";
        }
    }
    
    public function editSkill($param)
    {
        $id = $param['id'];
        $skill  = $param['skill'];
        $rate  = $param['rate'];
        $this->db->set($param);
        $this->db->where("id", $id);
        if($this->db->update("tbl_skill", $param)){
            return "success";
        }
    }
    
    public function deleteSkill($param)
    {
        $id = $param['id'];
    
        $this->db->set($param);
        $this->db->where("id", $id);
        if($this->db->delete("tbl_skill")){
        $data = array(
                'status' => 0,
                'message' => "Data deleted Successfully..!"
            );
            return $data;
        }
    }
    
    //Skill End..
    
    //Education Start..
    
    public function getEducation($param)
    {
        $uid = $param['uid'];
    
        $sql = "SELECT * FROM tbl_education WHERE uid = '$uid'";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        if($data!=null){
            $data = array(
                'status' => 0,
                'data' => $data
            );
            $result = json_encode($data);
            return $result;
        }else{
            $data = array(
                'status' => 1,
                'message' => "invalid"
            );
            $result = json_encode($data);
            return $result;
        }
    }
    
    public function addEducation($param)
    {    
        if($this->db->insert("tbl_education", $param)){
            return "success";
        }
    }
    
    public function editEducation($param)
    {
        $id = $param['id'];
        $this->db->set($param);
        $this->db->where("id", $id);
        if($this->db->update("tbl_education", $param)){
            return "success";
        }
    }
    
    public function deleteEducation($param)
    {
        $id = $param['id'];
    
        $this->db->set($param);
        $this->db->where("id", $id);
        if($this->db->delete("tbl_education")){
            $data = array(
                'status' => 0,
                'message' => "Data deleted Successfully..!"
            );
            return $data;
        }
    }
    
    //Education End..
    
    //Contact Start..
    
    public function addContact($param)
    {
        
    $uid = $param['uid'];
    $sql = "SELECT * FROM tbl_user user, tbl_contact contact WHERE user.id = contact.uid";
        $query = $this->db->query($sql);
        $data = $query->result_array();
//         print_r($data);
//         die();
        if($data!=null){
            $this->db->set($param);
            $this->db->where("uid", $uid);
            if($this->db->update("tbl_contact", $param)){
                return "success";
            }
            
        }else{
        if($this->db->insert("tbl_contact", $param)){
            return "success";
           }
        }
    }   
    
    public function getContact($param)
    {
        $uid = $param['uid'];
        $deviceId  = $param['deviceId'];
    
        $sql = "SELECT * FROM tbl_contact WHERE uid = '$uid'";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        if($data!=null){
            $data = array(
                'status' => 0,
                'data' => $data
            );
            $result = json_encode($data);
            return $result;
        }else{
            $data = array(
                'status' => 1,
                'message' => "invalid"
            );
            $result = json_encode($data);
            return $result;
        }
    }
    //Contact End..
    
    
    //Category Start..
    
    public function getCategory($param)
    {
        $uid = $param['uid'];
    
        $sql = "SELECT * FROM tbl_category WHERE uid = '$uid'";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        if($data!=null){
            $data = array(
                'status' => 0,
                'data' => $data
            );
            $result = json_encode($data);
            return $result;
        }else{
            $data = array(
                'status' => 1,
                'message' => "invalid"
            );
            $result = json_encode($data);
            return $result;
        }
    }
    
    public function addCategory($param)
    {
        if($this->db->insert("tbl_category", $param)){
            return "success";
        }
    }
    
    public function editCategory($param)
    {
        $id = $param['id'];
        $this->db->set($param);
        $this->db->where("id", $id);
        if($this->db->update("tbl_category", $param)){
            return "success";
        }
    }
    
    public function deletecategory($param)
    {
        $id = $param['id'];
    
        $this->db->set($param);
        $this->db->where("id", $id);
        if($this->db->delete("tbl_category")){
            $data = array(
                'status' => 0,
                'message' => "Data deleted Successfully..!"
            );
            return $data;
        }
    }
    
    //Category End..
}
?> 