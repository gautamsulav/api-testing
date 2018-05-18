
<?php 
  header("Access-Control-Allow-Origin: *");
?>
<html>
<head>
	<title>API Testing</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>

<body>
	
<div class="container">
  <h2>Basic Table</h2>
  <p>The .table class adds basic styling (light padding and only horizontal dividers) to a table:</p>            
  <table class="table" id="myTable">
    <thead>
      <tr>
        <th>S.N.</th>
        <th>Date and Time</th>
        <th>Subject</th>
      </tr>
    </thead>
    <tbody id="master">
    
    </tbody>
  </table> 
</div>

</body>
</html>


<script type="text/javascript">
	var i=0;
setInterval(function(){
	$.ajax({ 
    type: 'GET', 
    url: 'http://skuninja.madeby.ws/logs.json', 
    dataType: 'json',
    success: function (data) {
   		$('#master').empty();
        $.each(data, function(index, value) {
        	$.each(value,function(i,v){
        		$.each(v,function(k,val){
        			++i;
        			var background;
        			if(val.type==1)
        			{
        				background='Blue';
        			}else if(val.type==2)
        			{
        				background='Yellow';
        			}
        			else
        			{
        				background='Green'
        			}
        			$('#myTable tbody').append('<tr class="child" bgcolor='+background + '><td>'+i+'</td><td>'+val.created+'</td><td>'+val.subject+'</td></tr>');
        		
        		});
        		
        	});

        	//$('#myTable tbody').append('<tr class="child"><td>blahblah</td><td>blahblah</td><td>'+index+'</td></tr>');
            //$('#myTable tbody').append('<tr class="child"><td>blahblah</td><td>'+element.employee_name+'</td><td>'+element.employee_salary+'</td></tr>');
        });
        
    }
});

},1000);


</script>