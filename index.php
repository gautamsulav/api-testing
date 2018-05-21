<?php

// Read JSON file with Cross Origin Resource Sharing 
$json = file_get_contents('https://cors.io/?http://skuninja.madeby.ws/logs.json');
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

  <!-- css for legends-->
  <style type="text/css">
    /* basic positioning */
  .legend { list-style: none; }
  .legend li { float: left; margin-right: 10px; }
  .legend span { border: 1px solid #ccc; float: left; width: 12px; height: 12px; margin: 2px; }
  /* your colors */
  .legend .normal { background-color: green; }
  .legend .warning { background-color: yellow; }
  .legend .error { background-color: #B80000; }

  </style>



</head>

<body style="background-color:blue;text-align:center">
  <div class="container">
  <h2>Showing Recent Event Logs</h2>
  <div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4">
      <ul class="legend">
        <li><span class="normal "></span> Normal</li>
        <li><span class="warning"></span> Warning</li>
        <li><span class="error"></span> Error</li>
      </ul>
    </div>
  </div>                                                          
  <div class="table-responsive col-md-11">          
  <table class="table table-bordered" id="myTable">
    <thead>
      <tr>
        <th class="col-md-2 text-center">S.N.</th>
        <th class="col-md-5 text-center">Date and Time</th>
        <th class="col-md-5 text-center">Subject</th>
      </tr>
    </thead>
    <tbody id="master">
      <?php
        //processing and displaying json file
        $i=0;
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
            echo '<tr class="child" bgcolor='.$color.'><td class="text-center"><font color="white">'.++$i.'</font></td>
            <td class="text-center"><font color="white">'.$v['created'].'</font></td>
            <td class="text-center"><font color="white">'.$v['subject'].'</font></td></tr>';
          }
      ?>
    </tbody>
  </table>
  </div>
</div>
	


</body>
</html>
<!-- javascript for  refreshing the page-->
<script type="text/javascript">
	$(document).ready(function() {
	  setInterval(function() {
	    cache_clear()
	  }, 3000);
	});

	function cache_clear() {
	  window.location.reload(true);
	  // window.location.reload(); use this if you do not remove cache
	}
</script>
