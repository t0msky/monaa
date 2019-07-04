@extends('layouts.master')

@section('content')
<div class="br-mainpanel">
  <div class="br-pageheader">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
      <a class="breadcrumb-item" href="index.html">Operations</a>
      <span class="breadcrumb-item active">Add New Assignment</span>
    </nav>
  </div><!-- br-pageheader -->
  <div class="br-pagetitle">
    <i class="fa fa-clipboard fa-5x"></i>
    <div>
      <h4>Add new Assignment</h4>
      <p class="mg-b-0">Fill the form to add a new assignment.</p>
    </div>
  </div><!-- d-flex -->

  <div class="br-pagebody">
    <div class="br-section-wrapper">

      <div class="col-md mg-t-20 mg-md-t-0">
        <div class="card bd-0">

          <div class="form-layout form-layout-2">
            <div class="row no-gutters">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="form-control-label mg-b-0-force">STS: <span class="tx-danger">*</span></label>
                  <select id="select2-a" class="form-control" data-placeholder="Choose country">
                    <option label="Choose STS"></option>
                    <option value="FSU" selected>FSU</option>
                    <!-- <option value="Spot">Spot</option> -->
                  </select>
                </div>
              </div><!-- col-4 -->


              <div class="col-md-4 mg-t--1 mg-md-t-0">
                <div class="form-group mg-md-l--1">
                  <label class="form-control-label mg-b-0-force">Mothership: <span class="tx-danger">*</span></label>
                  <select id="select2-a" class="form-control" data-placeholder="Choose country">
                    <option label="Choose Vessel"></option>
                    <option value="" selected>Hercules 1</option>
                    <!-- <option value="">Lady M</option>
                    <option value="">Aframax Rio</option>
                    <option value="">Speedway</option> -->
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-md-4 mg-t--1 mg-md-t-0">
                <div class="form-group mg-md-l--1">
                  <label class="form-control-label mg-b-0-force">Maneuvring Ship: <span class="tx-danger">*</span></label>
                  <select id="select2-a" class="form-control" data-placeholder="Choose country">
                    <option label="Choose Vessel"></option>
                    <option value="">Ainic Mc</option>
                    <option value="">Anavatos</option>
                    <option value="">SCF Yenisel</option>
                    <option value="">Sea Falcom</option>
                    <option value="">Sea Hope</option>
                    <option value="">Pamir</option>
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-md-6">
                <div class="form-group bd-t-0-force">
                  <label class="form-control-label">Commence Operation: <span class="tx-danger">*</span></label>
                  <div class="wd-200 mg-b-30">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="icon ion-calendar tx-16 lh-0 op-6"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control fc-datepicker" placeholder=" MM/DD/YYYY">
                    </div>
                  </div>
                </div>
              </div><!-- col-8 -->

              <div class="col-md-6">
                <div class="form-group bd-t-0-force">
                  <label class="form-control-label">Mooring and Pilotage Services: <span class="tx-danger">*</span></label>
                  <div class="wd-200 mg-b-30">
                    <div class="input-group">
                      <div class="br-toggle br-toggle-rounded br-toggle-success yes">

                        <div class="br-toggle-switch"></div>

                      </div>
                    </div>
                    <input type="hidden" value="No" id="toggle">
                  </div>
                </div>
              </div>

              <div class="col-md-12" id="poacInfo">
                <div class="form-group mg-md-l--1 bd-t-0-force">
                  <h5>Summary Of Contracted Service Charges</h5>
                  <div class="col-sm-12 col-lg-12">
                    <div class="card">
                      <div class="card-header">
                        <h6 class="card-title"><span class="tx-teal">FSU</span> - Service Vessels LOA Greater Than 150m</h6>

                      </div><!-- card-header -->
                      <div class="card-body">
                        <!-- <span id="spark1">5,3,9,6,5,9,7,3,5,2</span> -->
                        <h5>$ 6,500.00</h5>
                      </div><!-- card-body -->
                      <div class="card-footer">
                        <div>
                          <i class="icon typcn typcn-tick tx-16 pd-r-10"></i>
                          <span class="tx-inverse">1</span>
                          <i class="icon typcn typcn-times tx-16 pd-r-10"></i>
                          <span class="tx-14">Mooring Master On-Board</span><br>

                          <i class="icon typcn typcn-tick tx-16 pd-r-10"></i>
                          <span class="tx-inverse">2</span>
                          <i class="icon typcn typcn-times tx-16 pd-r-10"></i>
                          <span class="tx-14">Pilotage ( In-Bound, Out-Bound, Shifting )</span>
                        </div>
                        <div>

                        </div>
                      </div><!-- card-footer -->
                    </div><!-- card -->
                  </div><!-- col-3 -->

                </div>
              </div><!-- col-8 -->

              <div class="col-md-4" id="poac1">
                <div class="form-group mg-md-l--1 bd-t-0-force">
                  <label class="form-control-label mg-b-0-force">Mooring Master: <span class="tx-danger">*</span></label>
                  <select id="select2-a" class="form-control" data-placeholder="Choose country">
                    <option label="Mooring Master"></option>
                    <option value="">Irwan Shah Hanafy</option>
                    <option value="">Ismail Harun</option>
                    <option value="">Junaidi Abdullah</option>
                    <option value="">Kamil Bin Husaini</option>
                  </select>
                </div>
              </div><!-- col-8 -->

              <div class="col-md-4" id="poac2">
                <div class="form-group mg-md-l--1 bd-t-0-force">
                  <label class="form-control-label mg-b-0-force">POAC 1: <span class="tx-danger">*</span></label>
                  <select id="select2-a" class="form-control" data-placeholder="Choose country">
                    <option label="Choose POAC 1"></option>
                    <option value="">Azlan Alias</option>
                    <option value="">Baharudin Samad</option>
                    <option value="">Chang Gee Guan</option>
                    <option value="">Daud Ali</option>
                  </select>
                </div>
              </div><!-- col-8 -->

              <div class="col-md-4" id="poac3">
                <div class="form-group mg-md-l--1 bd-t-0-force">
                  <label class="form-control-label mg-b-0-force">POAC 2: <span class="tx-danger">*</span></label>
                  <select id="select2-a" class="form-control" data-placeholder="Choose country">
                    <option label="Choose POAC 2"></option>
                    <option value="">Azlan Alias</option>
                    <option value="">Baharudin Samad</option>
                    <option value="">Chang Gee Guan</option>
                    <option value="">Daud Ali</option>
                  </select>
                </div>
              </div><!-- col-8 -->



            </div><!-- row -->



            <div class="form-layout-footer bd pd-20 bd-t-0">
              <button class="btn btn-info">Submit</button>
              <button class="btn btn-secondary">Cancel</button>
            </div><!-- form-group -->
          </div><!-- form-layout -->

        </div><!-- card -->
      </div>

    </div><!-- br-section-wrapper -->
  </div><!-- br-pagebody -->


  <footer class="br-footer">
    <div class="footer-left">
      <div class="mg-b-2">Copyright &copy; 2017. Bracket Plus. All Rights Reserved.</div>
      <div>Attentively and carefully made by ThemePixels.</div>
    </div>
    <div class="footer-right d-flex align-items-center">
      <!-- <span class="tx-uppercase mg-r-10">Share:</span> -->
      <!-- <a target="_blank" class="pd-x-5" href="https://www.facebook.com/sharer/sharer.php?u=http%3A//themepixels.me/bracketplus/intro"><i class="fab fa-facebook tx-20"></i></a> -->
      <!-- <a target="_blank" class="pd-x-5" href="https://twitter.com/home?status=Bracket%20Plus,%20your%20best%20choice%20for%20premium%20quality%20admin%20template%20from%20Bootstrap.%20Get%20it%20now%20at%20http%3A//themepixels.me/bracketplus/intro"><i class="fab fa-twitter tx-20"></i></a> -->
    </div>
  </footer>
</div>


@stop

@section('docready')
<script type="text/javascript">
    jQuery(document).ready(function () {

        $("#poacInfo,#poac1,#poac2,#poac3").hide();

        // Datepicker
        $('.fc-datepicker').datepicker({
          showOtherMonths: true,
          selectOtherMonths: true
        });

        // Toggles
        $('.br-toggle').on('click', function(e){
          e.preventDefault();
          $(this).toggleClass('on');

          var asal = $("#toggle").val();

          if (asal == 'No') {
            $("#toggle").val("Yes");
            var baru = $("#toggle").val();
            $("#poacInfo,#poac1,#poac2,#poac3").show('slow');
          }

          if (asal == 'Yes') {
            $("#toggle").val("No");
            var baru = $("#toggle").val();
            $("#poacInfo,#poac1,#poac2,#poac3").hide('slow');
          }

          // alert('asal = '+asal);
          // alert('baru = '+baru);



          // var myClass = $(this).val("yes");



        })

});
</script>

@stop
