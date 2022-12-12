<?php
require_once('../util/main.php');
require_once('../model/dotdangky_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {        
        $action ='home';
    }
}

switch ($action) 
{
    case 'home':
        include "statistic.php";
        break;
    
    case 'default':

        /*---------------POST--------------------*/
        if ($nienkhoa = filter_input(INPUT_POST, 'nienkhoa'))
        {
            calculateChart0($nienkhoa);
        }
        if ($nienkhoa == NULL){
            calculateChart0('2021 - 2022');
        }

        calculateChart1();

        if ($loaidetai = filter_input(INPUT_POST, 'loaidetai'))
        {
            calculateChart2($loaidetai);
        }
        if ($loaidetai == NULL){
            calculateChart2('Tiểu Luận Chuyên Ngành');
        }

        /*---------------GET--------------------*/
        $_SESSION["unique_nienkhoa"] = get_unique_nienkhoa();
        $_SESSION["unique_tenchuyennganh"] = get_unique_tenchuyennganh();
        $_SESSION["unique_loaidetai"] = get_unique_loaidetai();

        include 'statistic.php';
        break;


    default:
        display_error("Unknown account action: " . $action);
        break;
} 
?>

<?php
function calculateChart0($nienkhoa)
{
    if ($nienkhoa !=null)
    {
        $results = count_detaitheonienkhoa($nienkhoa);
        $countArray = array(0,0,0,0);
        foreach($results as $result)
        {
            switch($result[0])
            {
                case "Trí Tuệ Nhân Tạo":
                    $countArray[0] = $result[1];
                    break;
                case "Mạng Và An Ninh Mạng":
                    $countArray[1]= $result[1];
                    break;
                case "Hệ Thống Thông Tin":
                    $countArray[2]= $result[1];
                    break;
                case 'Công Nghệ Phần Mềm':
                    $countArray[3]= $result[1];
                    break;
            }
        }
        $_SESSION['countArray0'] = $countArray;

        $_SESSION['sumArray0'] = array_sum($countArray);
    }
}

function calculateChart1()
{
    $results = count_detaitheotenchuyennganh();
    $countArray = array(0,0,0,0);
    foreach($results as $result)
    {
        switch($result[0])
        {
            case "Trí Tuệ Nhân Tạo":
                $countArray[0] = $result[1];
                break;
            case "Mạng Và An Ninh Mạng":
                $countArray[1]= $result[1];
                break;
            case "Hệ Thống Thông Tin":
                $countArray[2]= $result[1];
                break;
            case 'Công Nghệ Phần Mềm':
                $countArray[3]= $result[1];
                break;
        }
    }
    $_SESSION['countArray1'] = $countArray;

    $_SESSION['sumArray1'] = array_sum($countArray);
}

function calculateChart2($loaidetai)
{
    if ($loaidetai!=null)
    {
        $results = count_detaitheoloaidetai($loaidetai);
        $countArray = array(0,0,0,0);
        foreach($results as $result)
        {
            switch($result[0])
            {
                case "Trí Tuệ Nhân Tạo":
                    $countArray[0] = $result[1];
                    break;
                case "Mạng Và An Ninh Mạng":
                    $countArray[1]= $result[1];
                    break;
                case "Hệ Thống Thông Tin":
                    $countArray[2]= $result[1];
                    break;
                case 'Công Nghệ Phần Mềm':
                    $countArray[3]= $result[1];
                    break;
            }
        }
        $_SESSION['countArray2'] = $countArray;

        $_SESSION['sumArray2'] = array_sum($countArray);
    }
}

?>