<?php
include_once 'header.php';
include_once 'funcoes.php';
$query = "SELECT faq.q,faq.a FROM faq";
$ligar = ligar_base_dados();
$result = mysql_query($query,  $ligar);
?>
<section style="text-align: center;" class='testff'>
    <h1>FAQ's</h1>
    <?php
    $var2 = 1;
    while($array = mysql_fetch_assoc($result)){
        ?><p onclick="showhide(<?=$var2?>)" style="margin:1% auto;width: 50%;border: 1px solid black;cursor: pointer;" onmouseover="this.style.color='#66CCCC'" onmouseout="this.style.color='black'" id='q<?=$var2?>'><?php echo $array['q'] ?>?<span style="margin-left:5%;"/><img id='<?=$var2?>' src="images/arrow-down-3-xxl.png" height="20px" width="20px"/></p>
        <p style="width: 50%;margin: auto; border:1px solid black;display: none;font-weight: bold;color: green;" id='a<?=$var2?>'>Resposta : <?php echo $array['a'] ?></p>
            <?php
            $var2++;
    }
    mysql_close($ligar);
    ?>
</section>
<script type="text/javascript">
    function showhide(x){
        if(!isv(x)){
            document.getElementById('a'+x).style.display = 'block';
            document.getElementById(x).src = 'images/arrow-down-3-xxl2.png' ;
        }else{
            document.getElementById('a'+x).style.display = 'none';
            document.getElementById(x).src = 'images/arrow-down-3-xxl.png' ;
        }
    }
    function isv(x){
        var flag = document.getElementById('a'+x).style.display;
    if(flag === 'block'){
        return true;
    }else{
        return false;
    }
    }
</script>
<?php
include_once 'footer.php';
?>