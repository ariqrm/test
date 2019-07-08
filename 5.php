<form action="" method="POST">
Number: <input type="text" name="num"><br>
<input type="submit" name="submit" value="submit">
</form>
<?php
if($_POST['submit']){
    $num = $_POST['num'];
    $split = str_split($num);
    sort($split);
    $arrlength = count($split);
    for($x = 0; $x < $arrlength; $x++) {
    $GLOBALS['z'] = $split[$x];
}
    $explode = explode("0",$z);
    echo $explode;
    echo $z;
    // $explode = explode('2',$num);
    // $implode = implode('',$split);
    // print_r ($split);
}
?>