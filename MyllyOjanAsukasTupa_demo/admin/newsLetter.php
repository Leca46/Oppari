<?php
/*
	file:	admin/newsLetter.php
	desc:	Displays the list of newsLetters in table
			Link to a form for adding a new newsletter
			Edit and Delete -links
*/
if(!empty($_GET['mode'])) $mode=$_GET['mode'];else $mode='';
//variables used in pager: $start and $nr_of_records defined here
if(!empty($_GET['start'])) $start=$_GET['start'];else $start=0;
$nr_of_records=5;  //display 5 records at list on every page
//checkin, if on the firs page, start is always zero - even in previous
if($start==0) $prev=$start;else $prev=$start-$nr_of_records;
include('../db.php'); //use the database connection from parent folder
//check the number of records from database table company
$sql="SELECT count(*) as NrOfRecords FROM newsletter";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$TotalRecords=$row['NrOfRecords'];
?>
<!-- tarkista linkit alla-->
    <!-- Bootstrap core CSS-->

    <title>Asukastiedote tietokanta</title>
		<!-- Bootstrap core CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">


<h4>Asukastiedotteet</h4>
<h5>* Vaaditaan täytettäväksi!</h5>
<h6>Tiedote voidaan poistaa muokkaa sivun kautta.</h6>
<h7>Tämä tieto päivittyy automaattisesti Asukastuvan asukastiedote kohtaan etusivulle.</h7>
<br>


          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Asukastiedote tietokanta</div>
            <div class="card-body">
              <a href="index.php?page=newsLetter&mode=add" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-plus"></span> Lisää tiedotteisiin
              </a>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <?php
                  echo '<table class="table table-bordered"><tr><th>ID#</th><th>Julkaisun nimi*</th><th>Linkki julkaisuun*</th>';
                  echo '<th>Muokkaa</th></tr>';
                  //if mode in url is add, display a form as first line in table
                  if($mode=='add'){
                  	echo '<form action="addnewsLetter.php" method="post">
                  		  <tr>
                  			<td></td>
                  			<td><input type="text" name="newsName" /></td>
                  			<td><textarea name="newsLink" rows="2" cols="100"></textarea></td>

                  			<td><input type="submit" name="Add" value="Lisää" /></td>
                  		</tr>
                  		  </form>';
                  }

                  $sql = "SELECT *
                  		FROM newsletter
                  		ORDER BY newsName
                  		LIMIT $start,$nr_of_records";

                  $result=$conn->query($sql);  //runs the query in database
                  while($row=$result->fetch_assoc()){
                  	echo '<tr>';
                  	echo '<td>'.$row['newsID'].'</td>';
                  	echo '<td>'.$row['newsName'].'</td>';
                  	echo '<td>'.$row['newsLink'].'</td>';
                  	echo '<td><a href="index.php?page=editnewsLetter&newsID='.$row['newsID'].'"><span class="glyphicon glyphicon-edit">';
                  	echo '</tr>';
                  }
                  echo '</table>';
                  $conn->close(); //close the connection - removed from server memory

                  ?>

                    <ul class="pager">
                    <?php
                    	//check if in the first page
                    	if($start==0){
                    		echo '<li>Edellinen</li>';
                    	}else{
                    ?>
                      <li><a href="index.php?page=newsLetter&start=<?php echo $prev?>">Edellinen</a></li>
                    <?php
                    	}
                    	//check if already in the last page
                    	$lastrecordnow=$start+$nr_of_records;
                    	if($lastrecordnow<$TotalRecords){
                    ?>
                      <li><a href="index.php?page=newsLetter&start=<?php echo $start+$nr_of_records?>">Seuraava</a></li>
                    <?php
                  }else echo '<li>Seuraava</li>';
                    ?>
                     </ul>
              </div>
            </div>

          </div>


        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->


      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!--jQuery-->
		<script src="../js/jquery-3.2.1.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<script src="js/myscript.js"></script>


  </body>

</html>
