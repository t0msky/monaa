


<body onload="myFunction()">
<table class="table display responsive nowrap" cellspacing="0" width="100%" style="font-size:80%">
  <thead>
    <tr>
      <th class="wd-5p">No.</th>
      <th class="wd-15p">Job Code</th>
      <!-- <td class="wd-15p">Job Status</td> -->
      <th class="wd-5p-force">STS</th>
      <th class="wd-15p">MotherShip</th>
      <th class="wd-15p">ManueveringShip</th>
      <th class="wd-10p">Commence Date</th>
      <!-- <td class="wd-10p">Commence Time</td> -->
      <th class="wd-10p">Complete Date</th>
      <!-- <td class="wd-10p">Complete Time</td> -->
      <th class="wd-10p">Exposure Hour</th>
      <th class="wd-10p">Hour > 24</th>
      <th class="wd-10p">Hour > 48</th>
      <th class="wd-10p">Normal Rate</th>
      <th class="wd-10p">Overtime Rate</th>
      <th class="wd-10p">Total Charge</th>
      <th class="wd-10p">Berthing</th>
      <th class="wd-10p">Unberthing</th>

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
          echo date('d/m/Y', strtotime($j->job_commence_date));
          if ($j->job_commence_time != " am" && $j->job_commence_time != " pm") {
            // echo ':'.$j->job_commence_time;
            echo ':'.str_replace(" ","",$j->job_commence_time);
          }
        ?>
      </td>

      <td>
        <?php
          if($j->job_complete_date != '') {
            echo date('d/m/Y', strtotime($j->job_complete_date));
            if ($j->job_complete_time != " am" && $j->job_complete_time != " pm") {

              // echo ':'.$j->job_complete_time;
              echo ':'.str_replace(" ","",$j->job_complete_time);
            }
          } else {
            echo '-';
          }
        ?>
      </td>

      <td><?php echo $j->job_hour;?></td>
      <td><?php echo $j->job_exceeding24;?></td>
      <td><?php echo $j->job_exceeding48;?></td>
      <td>SGD <?php echo number_format($j->card_rate,2);?></td>
      <td>-</td>
      <td>SGD <?php echo number_format($j->card_rate,2);?></td>
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
