<?php
    //input num
    $num = 90890810810703;
    //memisah menjadi array
    $split = str_split($num);
    //mengurutkan
    sort($split);
    $arrlength = count($split);
    for($x = 0; $x < $arrlength; $x++) {
    $split[$x];
}
    //menggabungkan
    $implode = implode('',$split);
    //memisah 0
    $explode = explode("0",$implode);
    //mengambil array terakhir
    $arrlength2 = count($explode)-1;
    //merubah menjadi integer
    $finish = (int)$explode[$arrlength2];
    echo $finish;
    if(is_int($finish)){
        echo "<br>int value";
    }else {
        echo "<br>not int";
    };
?>