<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <button id="test_btn" name="submit">TESTING</button>
        <input id="test_input" type="hidden" name="test" value="TESTING">
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
     

    $( "#test_btn" ).on('click', function() {
        var input1 = $('#test_input').val();
        console.log(input1);
        var data_input = {"input1_data": input1};

        $.ajax({
            type: 'post',
            url: 'code.php',
            dataType: 'json',
            data: JSON.stringify(data_input),
            success: function (data) {
              //alert('form was submitted' + data);
              console.log(data);
              if(data.isSuccess){
                alert('success');
              }
            }
          });
    });
    </script>
</body>
</html>