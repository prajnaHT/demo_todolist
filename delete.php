
<?php
// header('charset=utf-8');


if((empty($_GET['id']))||(empty($_GET['filen']))){
  exit('<h1>删除错误</h1>');
}else{

 
$filename=$_GET['filen'];
$delid=$_GET['id'];   


$wenjian=file_get_contents('data/'.$filename.'.json');
$wenjian=iconv("gb2312","UTF-8",$wenjian);
$data = json_decode($wenjian,true);


foreach ($data as $item) {
   // var_dump($item);
   // var_dump($delid);
   if($item['id']==$delid){
      $index=array_search($item, $data);
      array_splice($data, $index,1);
       $json=json_encode($data);
       file_put_contents('data/'.$filename.'.json', $json);
      // echo $index;
   }else{
      continue;
   }

  

}

 
echo "<script>location.href='index.php'</script>";


}







?>