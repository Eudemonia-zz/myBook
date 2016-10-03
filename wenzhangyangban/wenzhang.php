<?php
/**
 * Created by PhpStorm.
 * User: eudemonia
 * Date: 16/9/30
 * Time: 下午9:54
 */
//$ic = $_POST['ic'];
//$timu = $_POST['timu'];
//$zhuti = $_POST['zhuti'];
//$t = time();

/*  $sql = "INSERT INTO message(ic ,ID , timu , zhuti , posttime) VALUES({$ic} ,0 , '{$timu}' , '{$zhuti}' , {$t})";
    $net = mysqli_connect('localhost','root','','wenzhang');
    mysqli_query($net , $sql);
*/


/*
 * 接收参数: ic timu content img
 * 返回:    ic timu content img posttime id
 */

#获取数据流
$net1 = file_get_contents('php://input') ;

#解析数据
$regs = explode('&',$net1);
$new = Array();
$sel = true ;

for($i=0 ; $i<count($regs);$i++){

    $regn = explode('=',$regs[$i]) ;
    $new[$regn[0]] = $regn[1] ;
}
$data = json_encode($new);
$oDa = json_decode($data);
$t =  time() ; // data('y:m:d',time()); 这里用数据的方式

#检查数据库
$sqlx = "SELECT ic FROM message";
$mesx = mysqli_connect('localhost','a1003160630','c275c086','a1003160630');
$res = mysqli_query($mesx,$sqlx);
while($row = mysqli_fetch_row($res)){
    if($row[0] == $oDa->ic){
        $sel = false ;
        break ;}
}

#存入数据库
if($sel){
    $sql = "INSERT INTO message(ic , timu , content ,img , posttime , id) VALUES({$oDa->ic} , '{$oDa->timu}' , '{$oDa->content}' , '{$oDa->img}' , {$t} , 0)" ;
 //   $mes = mysqli_connect('localhost','root','','wenzhang');
    mysqli_query($mesx , $sql);

}










