<div class="clear"></div>
<div id ="main">
    <?php 
       
        if(isset($_GET['action']) && $_GET['query']){
                    $tam= $_GET['action'];
                    $query= $_GET['query'];
        }else{
            $tam= '';
            $query= '';
        } 
      
        if($tam =='quanlidanhmucsanpham' && $query == 'them'){
            include("modules/quanlydanhmucsp/them.php");
            include("modules/quanlydanhmucsp/lietke.php");

        }elseif($tam=='quanlidanhmucsanpham' && $query== 'sua'){
            include("modules/quanlydanhmucsp/sua.php");

        }elseif($tam=='quanlisanpham' && $query== 'them'){
            include("modules/quanlysp/them.php");
            include("modules/quanlysp/lietke.php");

        }elseif($tam=='quanlisanpham' && $query== 'sua'){
            include("modules/quanlysp/sua.php");

        }elseif($tam=='quanlidanhmucbaiviet' && $query== 'them'){
            include("modules/quanlydanhmucbv/them.php");
            include("modules/quanlydanhmucbv/lietke.php");

        }elseif($tam=='quanlidanhmucbaiviet' && $query== 'sua'){
            include("modules/quanlydanhmucbv/sua.php");
        }elseif($tam=='quanlibaiviet' && $query== 'them'){
            include("modules/quanlybv/them.php");
            include("modules/quanlybv/lietke.php");

        }elseif($tam=='quanlibaiviet' && $query== 'sua'){
            include("modules/quanlybv/sua.php");
        }
        else{
            include("modules/trangdau.php");
        }
    ?>
</div>

