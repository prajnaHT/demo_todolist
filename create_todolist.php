
<?php
// header('charset=utf-8');


 


if($_SERVER['REQUEST_METHOD']==='POST'){
    $filename=$_GET['filen'];
    $content=$_POST['listup'];
    $origin=json_decode(file_get_contents('data/'.$filename.'.json',true));

    $origin[]=array(
       'id'=> uniqid(),
       'list'=>$content,
       'status'=>'undone',
    );


    $json=json_encode($origin);
    file_put_contents('data/'.$filename.'.json', $json);


echo "<script>location.href='index.php'</script>";

}







?>