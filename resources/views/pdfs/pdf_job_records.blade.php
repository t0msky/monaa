<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="<?php echo env('BASE_URL');?>css/print.css">
  </head>

  <body onload="myFunction()" class="bg-white">
    <div class="card-body color-gray-lighter">
      <div class="pd-y-30 tx-dark">
        <div class="tx-13">Subject : <span class="tx-medium tx-uppercase">Record Of Ship-To-Ship (STS) Operations Job</span></div>
        <div class="tx-13">Service : <span class="tx-medium tx-uppercase"><?php echo $type;?></span></div>
        <div class="tx-13">Year : <span class="tx-medium tx-uppercase"><?php echo $year;?></span></div>
        <div class="tx-13">Month : <span class="tx-medium tx-uppercase"><?php echo $month;?></span></div>
        <!-- <div class="tx-13">Base Location : <span class="tx-medium tx-uppercase">Tanjung Pelepas Johor Bahru Port Limit</span></div> -->
      </div>
      <div class="bd bd-gray-300 table-responsive tx-dark">
        <table class="table table-bordered table-striped mg-b-0 responsive nowrap" width="100%" style="font-size:13px">
          <thead class="thead-colored thead-dark">
            <tr>
              <th class="wd-2p">No.</th>
              <th class="wd-10p">Job Code</th>
              <th class="wd-2p">STS</th>
              <th class="wd-10p">Mother Ship</th>
              <th class="wd-10p">Manuevering Ship</th>
              <th class="wd-10p">Commence Date</th>
              <th class="wd-10p">Complete Date</th>
              <th class="wd-5p">Exposure Hour</th>
              <th class="wd-5p">Exceeding Hour > 24</th>
              <th class="wd-5p">Exceeding Hour > 48</th>
              <th class="wd-5p">Normal Rate (SGD)</th>
              <th class="wd-5p">OT Rate (SGD)</th>
              <th class="wd-5p">Total (SGD)</th>
              <th class="wd-5p">Berthing</th>
              <th class="wd-5p">Unberthing</th>
              <th class="wd-10p">Remarks</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $total = 0;
            foreach($jobs as $j) :
            ?>
            <tr>
              <td><?php echo $no;?></td>
              <td><?php echo $j->job_code;?></td>
              <td><?php echo $j->card_type;?></td>
              <td><?php echo $j->mot_ship_name;?></td>
              <td><?php echo $j->man_ship_name;?></td>
              <td>
                <?php
                  echo date('d/m/Y', strtotime($j->job_commence_date));
                  if ($j->job_commence_time != " am" && $j->job_commence_time != " pm") {
                    echo '<br>'.str_replace(" ","",$j->job_commence_time);
                  }
                ?>
              </td>
              <td>
                <?php
                  if($j->job_complete_date != '') {
                    echo date('d/m/Y', strtotime($j->job_complete_date));
                    if ($j->job_complete_time != " am" && $j->job_complete_time != " pm") {
                      echo '<br>'.str_replace(" ","",$j->job_complete_time);
                    }
                  } else {
                    echo '-';
                  }
                ?>
              </td>
              <td><?php echo $j->job_hour;?></td>
              <td><?php echo ($j->job_exceeding24 != 0) ? $j->job_exceeding24 : '-';?></td>
              <td><?php echo ($j->job_exceeding48 != 0) ? $j->job_exceeding48 : '-';?></td>
              <td><?php echo number_format($j->card_rate,2);?></td>
              <td>
                <?php
                echo number_format($j->job_overtime_charges,2);
                $total = $total + $j->job_overtime_charges;
                ?>
              </td>
              <td>
                <?php
                echo number_format($j->card_rate,2);
                $total = $total + $j->card_rate;
                ?>
              </td>
              <td><?php echo $j->job_berthing;?></td>
              <td><?php echo $j->job_unberthing;?></td>
              <td><?php echo $j->job_remark;?></td>
            </tr>
            <?php
            $no = $no+1;
            endforeach;
            ?>
          </tbody>
        </table>
      </div>
    </div><!-- card-body -->
    <div class="card-body color-gray-lighter">
      <div class="row">
        <div class="col-lg-4 tx-13">
          <ul class="list-group list-group-striped">
            <li class="list-group-item rounded-top-0">
              <p class="mg-b-1 d-flex justify-content-between align-items-center">
                <span class="text-muted">Grand Total</span>
                <strong class="tx-inverse tx-medium">SGD <?php echo number_format($total,2);?></strong>
              </p>
            </li>
            <li class="list-group-item rounded-top-0">
              <p class="mg-b-1 d-flex justify-content-between align-items-center">
                <span class="text-muted">Grand Total (-20% Discount)</span>
                <strong class="tx-inverse tx-medium">SGD <?php echo number_format($total*0.8,2);?></strong>
              </p>
            </li>
          </ul>
        </div>
      </div>
    </div><!-- card-body -->

    <script>
    function myFunction() {
      window.print();
    }
    </script>
  </body>
</html>
