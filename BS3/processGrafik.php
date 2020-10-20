<html>
	<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" type="text/javascript"></script>
<script src="http://code.highcharts.com/highcharts.src.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; 
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },   
         title: {
            text: 'Grafik Data Produk '
         },
         xAxis: {
            categories: ['Kategori']
         },
         yAxis: {
            title: {
               text: 'Jumlah'
            }
         },
              series:             
            [
            <?php 
        	$conn = mysqli_connect('localhost', 'root', '', 'pbp_uts');
            if (mysqli_connect_errno()){
                die ("Could not connect to the database: <br />". mysqli_connect_error( ));
            } 
           $sql   = "SELECT K.id_kategori AS id, K.nama AS namak FROM kategori K LEFT JOIN barang B ON K.id_kategori=B.kategori GROUP BY K.id_kategori";
            $query = mysqli_query( $conn,$sql )  or die(mysqli_error());
            while( $ret = mysqli_fetch_array( $query ) ){
              $nama=$ret['namak']; 
              $id=$ret['id'];
 
                 $sql_jumlah   = "SELECT SUM(jml) AS jumlah FROM (SELECT B.kategori AS idktg, B.jumlah AS jml FROM kategori K LEFT JOIN barang B ON K.id_kategori=B.kategori) AS tbl WHERE tbl.idktg='$id'";        
                 $query_jumlah = mysqli_query( $conn,$sql_jumlah ) or die(mysqli_error());
                 while( $data = mysqli_fetch_array( $query_jumlah ) ){
                    $jumlah = $data['jumlah'];                 
                  }             
                  ?>
                  {
                      name: '<?php echo $nama; ?>',
                      data: [<?php echo $jumlah; ?>]
                  },
                  <?php } ?>
            ]
      });
   });	
</script>
	</head>
	<body>
		<div id='container'></div>		
	</body>
</html>