
 'use strict';

 $(document).ready(function(){

  // This will collapsed sidebar menu on left into a mini icon menu
  $('#btnLeftMenu').on('click', function(){
    var menuText = $('.menu-item-label');

    if($('body').hasClass('collapsed-menu')) {
      $('body').removeClass('collapsed-menu');

      // show current sub menu when reverting back from collapsed menu
      $('.show-sub + .br-menu-sub').slideDown();

      $('.br-sideleft').one('transitionend', function(e) {
        menuText.removeClass('op-lg-0-force');
        menuText.removeClass('d-lg-none');
      });

    } else {
      $('body').addClass('collapsed-menu');

      // hide toggled sub menu
      $('.show-sub + .br-menu-sub').slideUp();

      menuText.addClass('op-lg-0-force');
      $('.br-sideleft').one('transitionend', function(e) {
        menuText.addClass('d-lg-none');
      });
    }
    return false;
  });

  // This will expand the icon menu when mouse cursor points anywhere
  // inside the sidebar menu on left. This will only trigget to left sidebar
  // when it's in collapsed mode (the icon only menu)
  $(document).on('mouseover', function(e){
    e.stopPropagation();

    if($('body').hasClass('collapsed-menu') && $('#btnLeftMenu').is(':visible')) {
      var targ = $(e.target).closest('.br-sideleft').length;
      if(targ) {
        $('body').addClass('expand-menu');

        // show current shown sub menu that was hidden from collapsed
        $('.show-sub + .br-menu-sub').slideDown();

        var menuText = $('.menu-item-label');
        menuText.removeClass('d-lg-none');
        menuText.removeClass('op-lg-0-force');

      } else {
        $('body').removeClass('expand-menu');

        // hide current shown menu
        $('.show-sub + .br-menu-sub').slideUp();

        var menuText = $('.menu-item-label');
        menuText.addClass('op-lg-0-force');
        menuText.addClass('d-lg-none');
      }
    }
  });

  // This will show sub navigation menu on left sidebar
  // only when that top level menu have a sub menu on it.
  $('.br-sideleft').on('click', '.br-menu-link', function(){
    var nextElem = $(this).next();
    var thisLink = $(this);

    if(nextElem.hasClass('br-menu-sub')) {

      if(nextElem.is(':visible')) {
        thisLink.removeClass('show-sub');
        nextElem.slideUp();
      } else {
        $('.br-menu-link').each(function(){
          $(this).removeClass('show-sub');
        });

        $('.br-menu-sub').each(function(){
          $(this).slideUp();
        });

        thisLink.addClass('show-sub');
        nextElem.slideDown();
      }
      return false;
    }
  });

  // This will trigger only when viewed in small devices
  // #btnLeftMenuMobile element is hidden in desktop but
  // visible in mobile. When clicked the left sidebar menu
  // will appear pushing the main content.
  $('#btnLeftMenuMobile').on('click', function(){
    $('body').addClass('show-left');
    return false;
  });
    
   // This will hide sidebar when it's clicked outside of it
  $(document).on('click touchstart', function(e){
    e.stopPropagation();

    // closing left sidebar
    if($('body').hasClass('show-left')) {
      var targ = $(e.target).closest('.br-sideleft').length;
      if(!targ) {
        $('body').removeClass('show-left');
      }
    }

    // closing right sidebar
    if($('body').hasClass('show-right')) {
      var targ = $(e.target).closest('.br-sideright').length;
      if(!targ) {
        $('body').removeClass('show-right');
      }
    }
  });

  // jquery ui datepicker
  $('.datepicker').datepicker();

  // switch button
  $('.br-switchbutton').on('click', function(){
    $(this).toggleClass('checked');
  });

  // peity charts
  $('.peity-bar').peity('bar');

  // highlight syntax highlighter
  $('pre code').each(function(i, block) {
    hljs.highlightBlock(block);
  });

  // Initialize tooltip
  $('[data-toggle="tooltip"]').tooltip();

  // Initialize popover
  $('[data-popover-color="default"]').popover();

  // By default, Bootstrap doesn't auto close popover after appearing in the page
  // resulting other popover overlap each other. Doing this will auto dismiss a popover
  // when clicking anywhere outside of it
  $(document).on('click', function (e) {
    $('[data-toggle="popover"],[data-original-title]').each(function () {
        //the 'is' for buttons that trigger popups
        //the 'has' for icons within a button that triggers a popup
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            (($(this).popover('hide').data('bs.popover')||{}).inState||{}).click = false  // fix for BS 3.3.6
        }

    });
  });

  // Select2 Initialize
  // Select2 without the search
  if($().select2) {
    $('.select2').select2({
      minimumResultsForSearch: Infinity,
      placeholder: ''
    });

    // Select2 by showing the search
    $('.select2-show-search').select2({
      minimumResultsForSearch: ''
    });

    // Select2 with tagging support
    $('.select2-tag').select2({
      tags: true,
      tokenSeparators: [',', ' ']
    });
  }

});
function formatRows(main, prefer) {
  return '<tr><td><input type="text" name="jobItemHour[]" value="' +main+ '" class="form-control tx-uppercase bd-transparent" /></td>' +
         '<td><input type="text" name="jobItem[]" value="' +prefer+ '" class="form-control tx-capitalize bd-transparent" /></td>' +
         '<td class="tx-center"><a href="#" onClick="deleteRow(this)" class="tx-teal tx-24 tx-primary">' +
         '<i class="icon typcn typcn-trash"></i></a></td></tr>';
};

function deleteRow(trash) {
  $(trash).closest('tr').remove();
};

function addRow() {
  var main = $('.addMain').val();
  var preferred = $('.addPrefer').val();
  $(formatRows(main,preferred)).insertAfter('#addRow');
  $(input).val('');
}

$('.addBtn').click(function()  {
  addRow();
});


function readURL(input) {
          if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                  $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                  $('#imagePreview').hide();
                  $('#imagePreview').fadeIn(650);
              }
              reader.readAsDataURL(input.files[0]);
          }
      }
    $(document).ready(function(){
      $("#imageUpload").change(function() {
          readURL(this);
          $('#imgConfirm').show();
      });
      $('#imgConfirm').click(function(){
        $('#frmimgupld')[0].submit();
      });
      });

