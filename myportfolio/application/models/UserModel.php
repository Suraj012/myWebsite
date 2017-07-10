<?php
class UserModel extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    public function addUser($param)
    {
        $name  = $param['name'];
        $username  = $param['username'];
        $email  = $param['email'];
        $password  = $param['pass'];
        $gender  = $param['gender'];
        $contact  = $param['contact']; 
        $deviceId = $param['deviceId'];
        
        $sql = "SELECT * FROM tbl_user WHERE username = '$username' OR email = '$email'";
        $query = $this->db->query($sql);
        $data = $query->result_array();
        if($data!=null){
            $data = array(
                'status' => 1,
                'message' => "username or email already exists"
            );
            $result = json_encode($data);
            return $result;
        }else{
            if ($this->db->insert("tbl_user", $param)) {
                 $data = array(
                'status' => 0,
                'message' => "success"
            );
            $result = json_encode($data);
            return $result;
            }else{
                 $data = array(
                'status' => 1,
                'message' => "failed"
            );
            $result = json_encode($data);
            return $result;
            }
        }
    }
        
        public function addTest($param)
        {
            $id  = $param['id'];
            $name  = $param['name'];
            $address  = $param['address'];
            $added_by  = $param['added_by'];
        
            $sql = "SELECT * FROM tbl_test WHERE id = '$id'";
            $query = $this->db->query($sql);
            $data = $query->result_array();
            if($data!=null){
                $data = array(
                    'status' => 1,
                    'message' => "Data already exists with same ID"
                );
                $result = json_encode($data);
                return $result;
            }else{
                if ($this->db->insert("tbl_test", $param)) {
                    $data = array(
                        'status' => 0,
                        'message' => "success"
                    );
                    $result = json_encode($data);
                    return $result;
                }else{
                    $data = array(
                        'status' => 1,
                        'message' => "failed"
                    );
                    $result = json_encode($data);
                    return $result;
                }
            }
    }
    public function getTest()
    {    
        $sql = "SELECT * FROM tbl_test";
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
                'message' => "invalid, no data found"
            );
            $result = json_encode($data);
            return $result;
        }
    }
    
    
    public function userLogin($param)
    {
        $username  = $param['username'];
        $password  = $param['pass'];
        $deviceId = $param['deviceId'];
       
            
                $sql = "SELECT * FROM tbl_user WHERE (username = '$username' OR email ='$username') AND pass='$password' AND deviceId ='$deviceId' LIMIT 1";
                $query = $this->db->query($sql);
                $data = $query->result_array();
                $uid = $data[0]['id'];
                if($data!=null){
                    $token = trim(bin2hex(openssl_random_pseudo_bytes(8)));
                    $data = array(
                        'status' => 0,
                        'message' => "success",
                        'token' => $token,
                        'uid' =>$uid
                    );
                    $result = json_encode($data);
                    return $result;
                }else{
                   return 0;
                }
                
      }     
}