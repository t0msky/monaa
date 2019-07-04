<div class="card shadow-base bd-0">
  <div class="card-header-02 bg-transparent pd-x-25 pd-t-25 pd-b-0 d-flex justify-content-between align-items-center">
    <!-- <div class="btn-group" role="group" aria-label="Basic example">
      <button id="buttonprint" type="button" class="btn btn-third" data-toggle="modal" data-target="#deletealert"><i class="icon typcn typcn-times tx-24"></i></button>
    </div> -->
  </div>

  <form method="post" action="<?php #echo env('BASE_URL');?>do-add-voucher" data-parsley-validate data-parsley-errors-messages-disabled id="selectForm-voucher">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="card-body color-gray-lighter pd-t-0">
      <div class="row row-sm mg-t-20 pd-b-20">
        <div class="col-lg-6 mg-t-20 mg-lg-t-0">
          <div class="card shadow-base bd-0">
              <div class="bd-0 bd-gray-300 rounded table-responsive">
                <table class="table mg-b-0">
                  <thead style='visibility: collapse;'>
                    <tr>
                      <th class="wd-35p">Name</th>
                      <th>Position</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Voucher Code : <span class="tx-danger">*</span></td>
                      <td><input class="form-control" type="number" name="vou_code" value="" style="width: 100%" placeholder="Insert Voucher Code" required></td>
                    </tr>
                    <tr>
                      <td>Job Code</td>
                      <td>
                        <input type="hidden" name="vou_job_id" value="<?php #echo $job->job_id;?>">
                        <input class="form-control bd-transparent" type="text" value="<?php #echo $job->job_code;?>" disabled></td>
                    </tr>
                    <tr>
                      <td>Issued Date : <span class="tx-danger">*</span></td>
                      <td><div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                          </div>
                        </div>
                        <input id="date-01" type="text" name="vou_date" class="form-control" placeholder="00/00/000" value="" required>
                      </div></td>
                    </tr>
                    <tr>
                      <td>Job Scope</td>
                      <td>
                        <?php #if ($type == 1) { $t = "Berthing"; } else if ($type == 2) { $t = "Unberthing"; } ?>
                        <input type="hidden" name="vou_type" value="<?php #echo $t;?>">
                        <input class="form-control bd-transparent" type="text" value="<?php #echo $t;?>" disabled>
                      </td>
                    </tr>
                    <tr>
                      <input type="hidden" name="vou_ship" value="<?php #echo $manuevering->ship_id;?>">
                      <td>Maneuvering Ship</td>
                      <td class="tx-right"><?php #echo $manuevering->ship_name;?></td>
                    </tr>
                    <tr>
                      <td>Length Overall (m)</td>
                      <td class="tx-right"><?php #echo $manuevering->ship_LOA;?></td>
                    </tr>
                    <tr>
                      <td>Draught (m)</td>
                      <td class="tx-right"><?php #echo $manuevering->ship_DWT;?></td>
                    </tr>
                    <tr>
                      <td>IMO No.</td>
                      <td class="tx-right"><?php #echo $manuevering->ship_imo_no;?></td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- bd -->
          </div><!-- card -->
        </div><!-- col-6 -->

        <div class="col-lg-6 mg-t-20 mg-lg-t-0">
          <div class="card shadow-base bd-0">
            <div class="bd-0 bd-gray-300 rounded table-responsive">
              <table class="table mg-b-0">
                <thead style='visibility: collapse;'>
                  <tr>
                    <th class="wd-40p">Items</th>
                    <th>Desc</th>
                    <th class="wd-5p">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr id="addRow">
                    <td>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">
                            <i class="far fa-clock tx-16 lh-0 op-6"></i>
                          </div>
                        </div>
                        <input id="time-03" type="text" class="form-control addMain" placeholder="00:00" required>
                      </div><!-- input-group -->
                    </td>
                    <td>
                      <div id="slWrapper03" class="parsley-select">
                        <select class="form-control select2-show-search addPrefer"  style="width: 100%" placeholder="Choose one" value="" data-parsley-class-handler="#slWrapper03" data-parsley-errors-container="#slErrorContainer" required>
                          <option label="Choose one" value=""></option>
                          <?php foreach ($jobItems as $j) : ?>
                            <option value="<?php echo $j->item_name;?>"><?php echo $j->item_name;?></option>
                          <?php endforeach;?>
                        </select>
                      </div>
                    </td>
                    <td class="tx-center">
                      <span class="addBtn tx-teal tx-24 tx-primary">
                        <i class="icon typcn typcn-plus"></i>
                      </span>
                    </td>
                  </tr>
                  <tr>
                    <td>Advisor / Pilot / Mooring Master : <span class="tx-danger">*</span></td>
                    <td>
                      <div id="slWrapper04" class="parsley-select">
                      <select class="form-control select2-show-search" data-placeholder="Choose one (with searchbox)" name="vou_master" data-parsley-class-handler="#slWrapper04" data-parsley-errors-container="#slErrorContainer" required>
                      <option label="Choose one" value=""></option>
                      <?php #foreach ($users as $u) : ?>
                        <option value="<?php #echo $u->usr_id;?>"><?php #echo $u->usr_firstname.' '.$u->usr_lastname;?></option>
                      <?php #endforeach;?>
                    </select>
                    </div>
                  </td>
                  </tr>
                  <tr>
                    <td>Vessel's Master Agent : <span class="tx-danger">*</span></td>
                    <td>
                      <div id="slWrapper05" class="parsley-select">
                        <select class="form-control select2-show-search" placeholder="Choose one" name="vou_agent" data-parsley-class-handler="#slWrapper05" data-parsley-errors-container="#slErrorContainer" required>
                          <option label="Choose one"></option>
                          <?php #foreach ($users as $u) : ?>
                            <option value="<?php #echo $u->usr_id;?>"><?php #echo $u->usr_firstname.' '.$u->usr_lastname;?></option>
                          <?php #endforeach;?>
                        </select>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Remarks</td>
                    <td><textarea rows="1" class="form-control" placeholder="Note" name="vou_remark" value=""></textarea></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- bd -->
          </div><!-- card -->
        </div><!-- col-6 -->
      </div><!-- row -->
    </div><!-- card-body -->
    <div class="modal-footer">
      <button type="submit" class="btn btn-info">Submit Voucher</button>
      <button onclick="window.location.href='job-info.html'" class="btn btn-secondary">Back</button>
    </div><!-- form-layout-footer -->
  </form>
</div><!-- card -->
