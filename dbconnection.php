<?php
class Connection
{
    public function getConnection(){
        // Development conncetion

        $servername = 'localhost';
        $username = 'root';
        $password = '';
        $db='db';

        // Remote connection
<<<<<<< HEAD
        //$servername = 'remotemysql.com';
        //$username = 'Zd2wzwQftL';
        //$password = 'fEFJKna0xw';
        //$db='Zd2wzwQftL';
=======
        $servername = 'sql11.freemysqlhosting.net';
        $username = 'sql11479413';
        $password = 'RlaSIEAPzx';
        $db='sql11479413';
>>>>>>> 3f79b79a6b848d0259a6e3f65f8e4028a1002c7f


        $conn=mysqli_connect($servername, $username, $password, $db);
        if(!$conn){
        die("Connection failed" . mysqli_connect_error());}
        return $conn;
    }
    
    public function getData(){
        
        $sql = "SELECT * FROM courses";

        $result = mysqli_query($this->getConnection(), $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }

    public function getConditionData(){
        $sql = "SELECT * FROM courses LIMIT 3";

        $result = mysqli_query($this->getConnection(), $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
    
}
?>