<?php
date_default_timezone_set("Asia/Taipei");
session_start();

// dd
function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}
// 轉跳頁面懶得寫，所以宣告一個function。
function to($text){
    header("location:".$text);
}

class DB
{
    private $dns = "mysql:host:localhost;charset=utf8;dbname=db14";
    private $table;
    private $db;
    public $type=[
        1=>"健康新知",
        2=>"菸害防治",
        3=>"癌症防治",
        4=>"慢性病防治"
    ];
    // 預設啟動
    // 要記得宣告function。
    public function __construct($table)
    {
        $this->table = $table;
        // 沒背起來new PDO;
        $this->db = new PDO($this->dns, "root", "");
    }
    // 拆解字體
    private function ArratToSql($array)
    {
        // dd($array);
        foreach ($array as $key => $val) {
            $tmp[] = " `$key` = '$val'";
        }
        
        
        return $tmp;
    }
    // 輸出
    public function all(...$arg)
    {
        $sql = "select * from $this->table ";
        if (isset($arg[0])) {
            if (is_array($arg[0])) {
                $tmp = $this->ArratToSql($arg[0]);
                $sql=$sql." where ".join(" && ",$tmp);
            } else {
                $sql=$sql.$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql=$sql." ".$arg[1];
        }
        // dd($sql);
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function find($id){
        $sql = "select * from $this->table ";
            if (is_array($id)) {
                $tmp = $this->ArratToSql($id);
                $sql=$sql." where ".join(" && ",$tmp);
            } else {
                $sql=$sql." where `id`= '$id' ";
            }
            
        return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
    }
    // 輸入
    public function save($data){
        if(isset($data['id'])){
            // 有id代表更新
            $id=$data['id'];
            unset($data['id']);
            $tmp=$this->ArratToSql($data);
                                                                // 少打了一段where `id`='$id';
            $sql="update `$this->table` set ".join(" , ",$tmp)." where `id`='$id'";
        }else{
            // 沒id代表新增
            $key=array_keys($data);
            $sql="insert into `$this->table` (`".join("`,`",$key)."`) values ('".join("','",$data)."')";
        }

        return $this->db->exec($sql);
    }
    // 刪除
    public function del($id){
        $sql = "delete from $this->table ";
            if (is_array($id)) {
                $tmp = $this->ArratToSql($id);
                $sql=$sql." where ".join(" && ",$tmp);
            } else {
                $sql=$sql." where `id`= '$id' ";
            }
        return $this->db->exec($sql);

    }
    // 數學公式
    private function math($mt,...$arg){
        switch($mt){
            case "count":
                $sql="select $mt(*) from `$this->table` ";
                    if(isset($arg[0])){
                        if(is_array($arg[0])){
                            $tmp=$this->ArratToSql($arg[0]);
                            $sql=$sql." where ".join(" && ",$tmp);
                        }else{
                            $sql=$sql.$arg[0];
                        }
                    }
                break;
                default:
                    $sql="select $mt($arg[0]) from `$this->table` ";
        }
        if(isset($arg[1])){
            $sql=$sql.$arg[1];
        }
        //  dd($sql);
        return $this->db->query($sql)->fetchColumn();
    }
    public function count(...$arg){
        return $this->math("count",...$arg);
    }
    public function max($col,...$arg){
        return $this->math("max",$col,...$arg);
    }
    public function mix($col,...$arg){
        return $this->math("mix",$col,...$arg);
    }
    public function avg($col,...$arg){
        return $this->math("avg",$col,...$arg);
    }
    public function sum($col,...$arg){
        return $this->math("sum",$col,...$arg);
    }
}

$News=new DB("news");
$Log=new DB("log");
$Que=new DB("que");
$Total=new DB("total");
$User=new DB("user");
?>