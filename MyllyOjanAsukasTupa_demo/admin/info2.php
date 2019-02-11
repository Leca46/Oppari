<?php
/*
	file:	admin/info2.php
	desc:	Displays the list of lähidemokratia events in lähidemokratia-table
			Link to a form for adding a Lähidemokratia event
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
$sql="SELECT count(*) as NrOfRecords FROM info2";
$result=$conn->query($sql);
$row=$result->fetch_assoc();
$TotalRecords=$row['NrOfRecords'];
?>
    <title>Lähidemokratia tietokanta</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!--jQuery-->
    <script src="../js/jquery-3.2.1.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="js/myscript.js"></script>

<h4>Lähidemokratia</h4>
<h5>* Vaaditaan täytettäväksi!</h5>
<h6>Tapahtuman tieto voidaan poistaa muokkaa sivun kautta.</h6>
<h7>Tämä tieto päivittyy automaattisesti Lähidemokratia tiedottaa kohtaan etusivulle.</h7>
<br>

              <a href="index.php?page=info2&mode=add" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-plus"></span> Lisää lähidemokratiaan
              </a>
              <div class="table-responsive">

        <?php
        echo '<table class="table table-bordered"><tr><th>ID#</th><th>Tapahtuma*</th><th>Katuosoite</th>';
        echo '<th>postnr</th><th>Kaupunki</th><th>Linkki</th><th>Lisätietoa*</th><th>Aika (v-kk-p)</th><th>Muokkaa</th></tr>';
        //if mode in url is add, display a form as first line in table
        if($mode=='add'){
        	echo '<form action="addinfo2.php" method="post">
        		  <tr>
        			<td></td>
        			<td><input type="text" name="infoName2" /></td>
        			<td><input type="text" name="street2" /></td>
        			<td><input type="text" name="postnr2" /></td>
        			<td><input type="text" name="city2" /></td>
        			<td><input type="text" name="Website2" /></td>
        			<td><textarea name="infoDesc2" rows="5" cols="40"></textarea></td>
        			<td><input type="text" name="InfoTime2" /></td>
        			<td><input type="submit" name="Add" value="Lisää" /></td>
        		</tr>
        		  </form>';
        }

        $sql = "SELECT *
        		FROM info2
        		ORDER BY infoName2
        		LIMIT $start,$nr_of_records";

        $result=$conn->query($sql);  //runs the query in database
        while($row=$result->fetch_assoc()){
        	echo '<tr>';
        	echo '<td>'.$row['infoID2'].'</td>';
        	echo '<td>'.$row['infoName2'].'</td>';
        	echo '<td>'.$row['street2'].'</td>';
        	echo '<td>'.$row['postnr2'].'</td>';
        	echo '<td>'.$row['city2'].'</td>';
        	echo '<td>'.$row['Website2'].'</td>';
        	echo '<td>'.substr($row['infoDesc2'], 0, 20).'</td>';
        	echo '<td>'.$row['InfoTime2'].'</td>';
        	echo '<td><a href="index.php?page=editinfo2&infoID2='.$row['infoID2'].'"><span class="glyphicon glyphicon-edit">';
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
                      <li><a href="index.php?page=info2&start=<?php echo $prev?>">Edellinen</a></li>
                    <?php
                    	}
                    	//check if already in the last page
                    	$lastrecordnow=$start+$nr_of_records;
                    	if($lastrecordnow<$TotalRecords){
                    ?>
                      <li><a href="index.php?page=info2&start=<?php echo $start+$nr_of_records?>">Seuraava</a></li>
                    <?php
                  }else echo '<li>Seuraava</li>';
                    ?>
                     </ul>
              </div>
            </div>

          </div>


      </div>
