<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>


<script>
var json_data=localStorage.getItem("response");
var response=JSON.parse(json_data);

console.log(response.routes[0].legs[0].duration.text);
/*var savedata=JSON.parse(localStorage.json_data || null);
if(savedata != null){
	consol.log(savedata);
}
alert(savedata.routes[0].legs[0].duration.text);*/
</script>

</body>
</html>

