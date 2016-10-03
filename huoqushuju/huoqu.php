<?php
/**
 * Created by PhpStorm.
 * User: eudemonia
 * Date: 16/10/2
 * Time: 下午1:41
 */
// 接受 : act(get);
// 返回 : json(ic timu content posttime id)
switch ($_GET['act']){
    case 'get':
       // 只获取最新文章时候用的方法
//        $sql = 'SELECT ic , timu , content , img ,posttime , id FROM message ';
//        $net = mysqli_connect('localhost','root','','wenzhang');
//        $res = mysqli_query($net , $sql);
//
//        $row = mysqli_fetch_row($res);
//        $arr = Array(
//            'ic' => $row[0] ,
//            'timu' => $row[1] ,
//            'content' => $row[2] ,
//            'img' => $row[3] ,
//            'posttime' => date("Y/m/d/H:i:s",$row[4]) ,
//            'id' => $row[5]
//        );
//
//        $data = json_encode($arr);
//        echo $data ;  // 这里注释部分为第一次仅取第一篇文章数据时候




// 获取文章库:
        //返回:$data : json(ID:文章)
        $sql = 'SELECT ic , timu , content , img ,posttime , id FROM message ORDER BY id DESC';
        $net = mysqli_connect('localhost','root','','wenzhang');
        $res = mysqli_query($net , $sql);
        $datax = Array();
        while($row = mysqli_fetch_row($res)){
                $arr = Array();
                $arr['ic'] = $row[0] ;
                $arr['timu'] = $row[1] ;
                $arr['content'] = $row[2] ;
                $arr['img'] = $row[3] ;
                $arr['posttime'] = date("Y/m/d/H:i:s",$row[4]) ;
                $arr['id'] = $row[5] ;
                $jn = json_encode($arr);
                $datax[] = $jn ;
        }
        $data = json_encode($datax);
        echo $data ;


}