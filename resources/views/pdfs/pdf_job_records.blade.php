<style>
table {
  font-family: "Fira Sans", "Helvetica Neue", Arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
<body onload="myFunction()">
<table  cellspacing="0" width="100%" style="font-size:80%">
  <thead>
    <tr>
      <td class="wd-5p">No.</td>
      <td class="wd-15p">Job Code</td>
      <!-- <td class="wd-15p">Job Status</td> -->
      <td class="wd-5p-force">STS</td>
      <td class="wd-15p">Mother Ship</td>
      <td class="wd-15p">Manuevering Ship</td>
      <td class="wd-10p">Commence Date</td>
      <!-- <td class="wd-10p">Commence Time</td> -->
      <td class="wd-10p">Complete Date</td>
      <!-- <td class="wd-10p">Complete Time</td> -->
      <td class="wd-10p">Exposure Hour</td>
      <td class="wd-10p">Exceeding Hour > 24</td>
      <td class="wd-10p">Exceeding Hour > 48</td>
      <td class="wd-10p">Normal Rate (SGD)</td>
      <td class="wd-10p">Overtime Rate (SGD)</td>
      <td class="wd-10p">Total Charge (SGD)</td>
      <td class="wd-10p">Berthing</td>
      <td class="wd-10p">Unberthing</td>

    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach($jobs as $j) :
    ?>
    <tr>
      <td><?php echo $no;?></td>
      <td><?php echo $j->job_code;?></td>
      <!-- <td> -->
        <?php
          // if ($j->job_status == "In-coming") {
          //     echo '<i class="icon ion-checkmark tx-primary pd-r-10"></i>';
          // } else if ($j->job_status == "On-Board") {
          //     echo '<i class="icon ion-checkmark tx-warning pd-r-10"></i>';
          // } else if ($j->job_status == "Cancelled") {
          //     echo '<i class="icon ion-close tx-danger pd-r-10"></i>';
          // } else if ($j->job_status == "Completed") {
          //     echo '<i class="icon ion-checkmark tx-success pd-r-10"></i>';
          // }
          // echo $j->job_status;
        ?>
      <!-- </td> -->
      <td><?php echo $j->card_type;?></td>
      <td class="dropdown hidden-xs-down">
        <?php echo $j->mot_ship_name;?>
        <!-- <div class="dropdown-menu dropdown-menu-left pd-x-15">
          <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
            <div class="tx-capitalize">Type</div>
            <div class="tx-capitalize"><?php #echo $j->mot_ship_type;?></div>
          </div>
          <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
            <div class="tx-capitalize">LOA</div>
            <div class="tx-capitalize"><?php #echo $j->mot_ship_LOA;?> m</div>
          </div>
          <div class="d-flex justify-content-between pd-y-5 align-items-center">
            <div class="tx-capitalize">DWT</div>
            <div class="tx-capitalize"><?php #echo $j->mot_ship_DWT;?> t</div>
          </div>
        </div> -->
      </td>
      <td class="dropdown hidden-xs-down">
        <?php echo $j->man_ship_name;?>
        <!-- <div class="dropdown-menu dropdown-menu-left pd-x-15">
          <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
            <div class="tx-capitalize">Type</div>
            <div class="tx-capitalize"><?php #echo $j->man_ship_type;?></div>
          </div>
          <div class="d-flex justify-content-between bd-b pd-y-5 align-items-center">
            <div class="tx-capitalize">LOA</div>
            <div class="tx-capitalize"><?php #echo $j->man_ship_LOA;?> m</div>
          </div>
          <div class="d-flex justify-content-between pd-y-5 align-items-center">
            <div class="tx-capitalize">DWT</div>
            <div class="tx-capitalize"><?php #echo $j->man_ship_DWT;?> t</div>
          </div>
        </div> -->
      </td>
      <td>
        <?php
          echo date('d M Y', strtotime($j->job_commence_date));
          if ($j->job_commence_time != " am" && $j->job_commence_time != " pm") {
            echo ' '.$j->job_commence_time;
          }
        ?>
      </td>

      <td>
        <?php
          if($j->job_complete_date != '') {
            echo date('d M Y', strtotime($j->job_complete_date));
            if ($j->job_complete_time != " am" && $j->job_complete_time != " pm") {
              echo ' '.$j->job_complete_time;
            }
          } else {
            echo '-';
          }
        ?>
      </td>

      <td><?php echo $j->job_hour;?></td>
      <td><?php echo $j->job_exceeding24;?></td>
      <td><?php echo $j->job_exceeding48;?></td>
      <td><?php echo number_format($j->card_rate,2);?></td>
      <td>-</td>
      <td><?php echo number_format($j->card_rate,2);?></td>
      <td><?php echo $j->job_berthing;?></td>
      <td><?php echo $j->job_unberthing;?></td>

    </tr>
    <?php
    $no = $no+1;
    endforeach;
    ?>
  </tbody>
</table>
</body>
<script>
function myFunction() {
  window.print();
}
</script>
