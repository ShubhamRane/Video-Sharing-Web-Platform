<?php
$bool = true;
$num =  3+4;
$str = "A string here";
?>

<html>
<body>
<div id="text"></div>

<script type="text/javascript">

// boolean outputs "" if false, "1" if true
var bool = "<?php echo $bool ?>"; 
var text = document.getElementById("text");
text.innerHTML += bool; 

// numeric value, both with and without quotes
//var num = <?php echo $num ?>; // 7
var str_num = "<?php echo $num ?>"; // "7" (a string)
var str = "<?php echo $str ?>"; // "A string here"
text.innerHTML += str; 

</script>

</body>
</html>

