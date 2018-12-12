<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$target_dir = "profile/";
$target_file = $target_dir . $_FILES["fileToUpload"]["name"];
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$changename = date("YmdHis"). "." .pathinfo($_FILES["fileToUpload"]["name"],PATHINFO_EXTENSION);
$upload_filename = $target_dir . $changename;

$email = $_SESSION['username'];
include("mysql_connect.inc.php");
$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$row = mysqli_fetch_array($result);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "上傳的檔案已存在，請重新上傳。";
    echo '<meta http-equiv=REFRESH CONTENT=5;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "上傳的檔案太大。";
    echo '<meta http-equiv=REFRESH CONTENT=5;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "只能上傳JPG, JPEG, PNG & GIF 的附檔名圖。";
    echo '<meta http-equiv=REFRESH CONTENT=5;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "上傳失敗。";
    echo '<meta http-equiv=REFRESH CONTENT=5;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>'; 
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $upload_filename)) {
        echo '<br>'.basename( $_FILES["fileToUpload"]["name"]). " 大頭貼已上傳";
        $upload = "http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/profile/".$changename;
        $sql = "UPDATE user set user_sticker='$upload'where user_email='$email'";
        if(mysqli_query($link , $sql))
        {
                echo '修改大頭貼成功！畫面將自動跳轉，請稍候';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
        }
        else{
                echo '上傳大頭貼成功！但修改失敗，畫面將自動跳轉，請稍候';
                echo '<meta http-equiv=REFRESH CONTENT=5;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
        }
    } else {
        echo "上傳失敗。";
        echo '<meta http-equiv=REFRESH CONTENT=5;url=http://120.110.113.70/rosefit_greenhouse/space/theme/templates/admin1/setup.php>';
    }
}
?>