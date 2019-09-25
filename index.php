<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>可拖拽式待办清单 本地json存储 </title>
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <link href="dist/css/style1.css" rel='stylesheet' type='text/css' />
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: "Microsoft Yahei";
            background: url(home-bg-2.jpg) no-repeat;
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
        }
         .right {
    background-color: #e9e7ef;
    padding: 10px;
    margin: 5px;
    width: 250px;
    min-height:30px;
    float:left;
    border-radius: 5px;

}




input[type="submit"]{
    width:60px;
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
}
input[type="submit"]:hover {
       width:60px;
    display: inline-block;
    padding: 6px 12px;
    margin-bottom: 0;
    font-size: 14px;
    font-weight: normal;
    line-height: 1.42857143;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    background-image: none;
    border: 1px solid transparent;
    border-radius: 4px;
    color: #fff;
    background-color: #68B3C8;
    border-color:  #68B3C8;
}




    </style>
    <style type="text/css">
        #draggable {
            font-size: 9pt;
            padding: 10px;
            color: black;
            width: 360px;
            height: 10px;
            position: absolute;
        }

        #draggable1 {
            font-size: 9pt;
            padding: 10px;
            color: black;
            width: 360px;
            height: 10px;
           /* margin-left: 370px;*/
            position: absolute;
        }


    </style>
    <script type="text/javascript">
        var rDrag = {
            o: null,

            init: function(o) {
                o.onmousedown = this.start;
            },
            start: function(e) {
                var o;
                e = rDrag.fixEvent(e);
                e.preventDefault && e.preventDefault();
                rDrag.o = o = this;
                o.x = e.clientX - rDrag.o.offsetLeft;
                o.y = e.clientY - rDrag.o.offsetTop;
                document.onmousemove = rDrag.move;
                document.onmouseup = rDrag.end;
            },
            move: function(e) {
                e = rDrag.fixEvent(e);
                var oLeft, oTop;
                oLeft = e.clientX - rDrag.o.x;
                oTop = e.clientY - rDrag.o.y;
                rDrag.o.style.left = oLeft + 'px';
                rDrag.o.style.top = oTop + 'px';
            },
            end: function(e) {
                e = rDrag.fixEvent(e);
                rDrag.o = document.onmousemove = document.onmouseup = null;

                $("#draggable input").mousedown(function(e) {
                e.stopPropagation()
            });

                 $("#draggable1 input").mousedown(function(e) {
                e.stopPropagation()
            });

            },
            fixEvent: function(e) {
                if (!e) {
                    e = window.event;
                    e.target = e.srcElement;
                    e.layerX = e.offsetX;
                    e.layerY = e.offsetY;
                }
                return e;
            }
        }
        window.onload = function() {
            var obj = document.getElementById('draggable');
            rDrag.init(obj);

            var obj2 = document.getElementById('draggable1');
            rDrag.init(obj2);
        }




    </script>


<body>


   <div id="draggable1">
        <div class="login-form2" style="margin-top: 5%">
        <div class="close"> </div>
        <div class="head-info"><small>Todo List</small>
        </div>
        <div class="clear"> </div>
        <div class="avtar">
        </div>

        <div id="cont" style="height:300px" style="z-index: 9999">
            <div class="row">
                   <?php
                $text=file_get_contents("data/tetsu.json");
                $text=json_decode($text,true);
                if($text==''){
                    echo '当前无待办';
                }else{

                foreach ($text as $item) {
                    // echo $item.'<br>';
                    echo '<p><span><div style="margin-left:80px;text-align:left"><div class="right">'.$item['list'].'<a href="delete.php?id='.$item['id'].'&filen=tetsu"><img style="float:right" src="dist/img/delete.svg" /></a></div></div></span></p>';

                    # code...
                };

            }

                ?>
                <div>

                </div>

            </div>
        </div>
  <form  action="create_todolist.php?filen=tetsu" method="post">
       <input name="listup" style="width:70%;height:35px;margin-bottom: 5px;border:1px solid #a1afc9;padding-left: 5px" type="text" />
         <input style="height:35px;margin-bottom: 5px;" type="submit" value="提交">
    </form>
    </div>
  </div>






    <div id="draggable">

    <div class="login-form1" style="margin-top: 5%;margin-left: 110%">
        <div class="close1"></div>
        <div class="head-info"><small>Todo List</small>
        </div>
        <div class="clear"> </div>
        <div class="avtar">
        </div>

        <div id="cont" style="height:300px" style="z-index: 9999">
            <div class="row">
                   <?php
                $text=file_get_contents("data/hyde.json");
                $text=json_decode($text,true);
                if($text==''){
                    echo '当前无待办';
                }else{

                foreach ($text as $item) {
                    // echo $item.'<br>';
                    echo '<p><span><div style="margin-left:80px;text-align:left"><div class="right">'.$item['list'].'<a href="delete.php?id='.$item['id'].'&filen=hyde"><img style="float:right" src="dist/img/delete.svg" /></a></div></div></span></p>';

                    # code...
                };

            }

                ?>
                <div>

                </div>

            </div>
        </div>
  <form action="create_todolist.php?filen=hyde" method="post">
       <input  name="listup"  style="width:70%;height:35px;margin-bottom: 5px;border:1px solid #a1afc9;padding-left: 5px" type="text" />
        <input style="height:35px;margin-bottom: 5px;" type="submit" value="提交">
    </form>
    </div>

</div>

</body>

</html>
<script src="dist/js/jquery-3.4.1.min.js"></script>

<script>$(document).ready(function(c) {
    $('.close').on('click', function(c){

        $('.login-form2').fadeOut('slow', function(c){
               $('.login-form2').remove();
               $('.login-form1').css("marginLeft","5px");

        });
    });
});
</script>

<script>$(document).ready(function(c) {
    $('.close1').on('click', function(c){
        $('.login-form1').fadeOut('slow', function(c){
            $('.login-form1').remove();
        });
    });
});
</script>
