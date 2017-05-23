<html>
<head>



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


</head>

<body>

<input type="button" id="btnCallService" value="GetEmployeeDetail" />
<label id="lblData"></label>

</body>


<script>

$(function() {
    $('#btnCallService').click(function() {
        $.ajax({
            type: 'POST',
            url: 'C:\xampp\tomcat\lib\ServletTest.jar',
            dataType: 'json',
            contentType: 'application/json; charset=utf-8',
            success: function(response) {
                $('#lblData').html(JSON.stringify(response));
            },
            error: function(error) {
                console.log(error);
            }
        });
    });
});

</script>

</html>



