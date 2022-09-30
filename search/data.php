<?php
  
class wall{

        private $servername="localhost";
        private $username="root";
        private $password="";
        private $dbname="dbser";
        private $connect;
        function __construct()
        {
            $this->connect=new mysqli($this->servername,$this->username,$this->password,$this->dbname);
            if(mysqli_connect_error())
            {
                die("Connection Failed");
            }
            // echo "connected";
            return $this->connect;
        }  
            public function search($keyword)
            {
                $run=$this->connect->real_escape_string($_POST['keywords']);
                $sign="-";
                $line=$run;
                
            if(strpos($line,$sign)==true)
            {
                $line1=strpos($line,$sign);
                $line1=$line1+1;
                $line=$run;
                $line2=substr($line,$line1);
                
            $query="select title,description from as1 where title not like '%$line2%' AND description  not like '%$line2%'";
            $sql=$this->connect->query($query);
            $result_num=$sql->num_rows;
            if($result_num >0)
                {
                while($row=$sql->fetch_assoc())
                {
                    $this->result[]=$row;
                }
                return $this->result;
                }
            }
            else
                {
                $res=explode(" ","$run");
                // print_r($res);
                foreach($res as $key =>$value)
                {
                    $query="select title,description from demo where title like '%$value%' or description like '%$value%'";
                    $sql=$this->connect->query($query);
                    $result_num=$sql->num_rows;
                    if($result_num >0)
                    {
                        while($row=$sql->fetch_assoc())
                        {
                            $this->result[]=$row;
                        }
                        return $this->result;
                    } 
                else{
                    echo "No Search here.....";
                    }  
                }
       
            } 
         }   
    
}



?>