@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="#">Data Assets</a>
      <span class="breadcrumb-item active">Rate Card</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle hidden-xs-down">
    <i class="icon typcn typcn-shopping-bag tx-24"></i>
    <div>
      <h4 class="pd-y-15">Rate Card</h4>
      <!-- <p class="mg-b-0">Table Of Contracted Service Charges</p> -->
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody pd-x-20 pd-sm-x-30 pd-b-25">

    <?php
    foreach ($cardArray as $ca) :
    ?>
    <div class="row no-gutters widget-1 shadow-base">

      <?php
        $client_name = '';
        foreach ($ca as $c) :
          if ($client_name != $c->client_name) {
            echo '<div class="card bg-gray-300 col-sm-12">';
                echo '<div class="card-header">';
                echo '<div class="tx-uppercase tx-medium">'.$c->client_name.'</div>';
                echo '</div>';
            echo '</div>';
            $client_name = $c->client_name;
          }
      ?>

      <div class="col-sm-6 col-lg-6 mg-t-1 mg-sm-t-0 pd-t-20">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title lh-3"><span class="tx-teal"><?php echo $c->card_type;?></span> - <?php echo $c->card_name;?></h6>
          </div><!-- card-header -->
          <div class="card-body">
            <div class="tx-24 tx-bold tx-inverse tx-lato tx-spacing-4">SGD</div> <div class="tx-24 tx-bold tx-inverse tx-lato tx-spacing-4"><?php echo number_format($c->card_rate, 2);?>
            </div>
          </div><!-- card-body -->
          <div class="card-footer">
            <div>
          <?php if ($c->card_overtime != '') { ?>
                <div class="tx-14 tx-excerpt-200"><i class="icon typcn typcn-tick tx-14 tx-success pd-r-15"></i>Subsequent Hours & Part Thereof</div>
              <?php }else{ ?>
                <span class="tx-14">&nbsp;</span><br>
              <?php } ?>
          </div>
            <div>
                <?php if ($c->card_overtime != '') { ?>
                <span class="tx-14">SGD <?php echo number_format($c->card_overtime, 2);?></span><br>
              <?php }else{ ?>
                <span class="tx-14">&nbsp;</span><br>
              <?php } ?>


            </div>
          </div><!-- card-footer -->
          <div class="card-footer">
            <div>

              <div class="tx-14 tx-excerpt-250"><i class="icon typcn typcn-tick tx-success tx-14 pd-r-15"></i>
              <span class="tx-14">Mooring Master On-Board</div>
              <div class="tx-14 tx-excerpt-250"><i class="icon typcn typcn-tick tx-success tx-14 pd-r-15"></i>
              <span class="tx-14">Pilotage ( In-Bound, Out-Bound, Shifting )</div>
            </div>
            <div>

              <i class="icon typcn typcn-times tx-success tx-13 pd-r-10"></i>
              <span class="tx-inverse"><?php echo $c->card_mooring;?></span><br>
              <i class="icon typcn typcn-times tx-success tx-13 pd-r-10"></i>
              <span class="tx-inverse"><?php echo $c->card_pilotage;?></span>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div><!-- row -->

    <div class="col-sm-12">
    &nbsp;
    </div>
    <?php
    endforeach;
    ?>

    <div class="row no-gutters widget-1 shadow-base">

      <div class="card bg-gray-300 col-sm-12">
          <div class="card-header">
          <div class="tx-uppercase tx-medium">Pilotage</div>
          </div>
      </div>

      <div class="col-sm-6 col-lg-6 mg-t-1 mg-sm-t-0 pd-t-20">
        <div class="card">
          <div class="card-header">
            <h6 class="card-title"><span class="tx-teal">Pilotage</span> - Inbound, outbound or shifting</h6>
          </div><!-- card-header -->
          <div class="card-body">
            <div class="tx-24 tx-bold tx-inverse tx-lato tx-spacing-4">SGD</div>  <div class="tx-24 tx-bold tx-inverse tx-lato tx-spacing-4">1,250.00</div>
            
          </div><!-- card-body -->
          <div class="card-footer">
            <div>
                <!-- <i class="icon typcn typcn-tick tx-13 tx-success pd-r-10"></i> -->
                <span class="tx-14">&nbsp;</span><br>
            </div>
            <div>
                <!-- <i class="icon typcn typcn-tick tx-success tx-13 pd-r-10"></i> -->
                <span class="tx-14">&nbsp;</span><br>
            </div>
          </div><!-- card-footer -->
          <div class="card-footer">
            <div>

              <div class="tx-14 tx-excerpt-250"><i class="icon typcn typcn-tick tx-success tx-14 pd-r-15"></i>
              <span class="tx-14">Price inclusive logistic & transports.</div>
              <div class="tx-14 tx-excerpt-250"><i class="icon typcn typcn-tick tx-success tx-14 pd-r-15"></i>
              <span class="tx-14">Discount of 20% on the total amount on all invoices.</div>
            </div>
            <div>

              <!-- <i class="icon typcn typcn-times tx-success tx-13 pd-r-10"></i> -->
              <span class="tx-inverse">&nbsp;</span><br>
              <!-- <i class="icon typcn typcn-times tx-success tx-13 pd-r-10"></i> -->
              <span class="tx-inverse">&nbsp;</span>
            </div>
          </div>
        </div>
      </div>

    </div>


    <div class="row no-gutters widget-1 shadow-base pd-t-20 hidden-xs-down">
      <div class="col-sm col-lg mg-t-1 mg-lg-t-0">
        <div class="card">
          <div class="card-footer">
            <div>
              <i class="icon typcn typcn-star tx-success tx-20 pd-r-5"></i>
              <span class="tx-14 tx-capitalize tx-gray-500">Last updated on -</span>&nbsp;Monday, 20 June 2019, 08:36 AM - IP address : 115.164.83.226<br>
            </div>
            <div>
              <i class="icon typcn typcn-user tx-20 pd-r-10 tx-success"></i>
              <span class="tx-inverse tx-gray-500">Last updated by -</span>&nbsp;Muhammad Hieffny Hamim<br>
            </div>
          </div><!-- card-footer -->
        </div><!-- card -->
      </div><!-- col-3 -->

    </div><!-- row -->
  </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->



@stop

@section('docready')

@stop
