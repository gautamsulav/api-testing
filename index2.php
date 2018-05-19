<?php

// Read JSON file
$json = file_get_contents('http://skuninja.madeby.ws/logs.json');
//Decode JSON
$json_data = json_decode($json,true);

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

<body style="background-color:blue;text-align:center">
  <div class="container">
  <h2>Table</h2>
  <p>Difference:</p>                                                                                      
  <div class="table-responsive">          
  <table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th class="col-md-2">#</th>
        <th class="col-md-2">Date and Time</th>
        <th class="col-md-2">Subject</th>
      </tr>
    </thead>
    <tbody id="master">
      <?php

        foreach($json_data as $data)
          foreach($data as $key=>$value)
            foreach($value as $k=>$v)
            {

            if($v['type']==1)
            {
              $color='green';
            }elseif($v['type']==2)
            {
              $color='yellow';
            }
            else{
              $color='#B80000 ';
            }
            echo '<tr class="child" bgcolor='.$color.'><td><font color="white">'.$v['id'].'</font></td>
            <td><font color="white">'.$v['created'].'</font></td>
            <td><font color="white">'.$v['subject'].'</font></td></tr>';
          }
      ?>
    </tbody>
  </table>
  </div>
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
                  background='Green';
                }else if(val.type==2)
                {
                  background='Yellow';
                }
                else
                {
                  background='#B80000';
                }
                $('#myTable tbody').append('<tr class="child" bgcolor='+background + '><td><font color="white">'+i+'</font></td><td><font color="white">'+val.created+'</font></td><td><font color="white">'+val.subject+'</font></td></tr>');
              
              });
              
            });

          });
          
      }
  });

  },2000);


</script>