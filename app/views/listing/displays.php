<?$this->view('partials/head')?>

<? //Initialize models needed for the table
  new Displays_info_model;
  new Machine_model;
?>

<div class="container">

  <div class="row">

    <div class="col-lg-12">

    <script type="text/javascript">

      $(document).ready(function() {

        // Get modifiers from data attribute
        var myCols = [], // Colnames
        mySort = [], // Initial sort
        hideThese = [], // Hidden columns
        col = 0; // Column counter

        $('.table th').map(function(){

          myCols.push({'mData' : $(this).data('colname')});

          if($(this).data('sort'))
          {
            mySort.push([col, $(this).data('sort')])
          }

          if($(this).data('hide'))
          {
            hideThese.push(col);
          }

          col++
        });

        oTable = $('.table').dataTable( {
          "bProcessing": true,
          "bServerSide": true,
          "sAjaxSource": "<?=url('datatables/data')?>",
          "aaSorting": mySort,
          "aoColumns": myCols,
          "aoColumnDefs": [
            { 'bVisible': false, "aTargets": hideThese }
          ],
          "fnCreatedRow": function( nRow, aData, iDataIndex ) {

            // Update computer name to link
            var name=$('td:eq(0)', nRow).html();
            if(name == ''){name = "No Name"};
            var sn=$('td:eq(1)', nRow).html();
            if(sn){
              var link = get_client_detail_link(name, sn, '<?=url()?>/');
              $('td:eq(0)', nRow).html(link);
		} else {
		$('td:eq(0)', nRow).html(name);            
		}

            // Internal vs External
            var status=$('td:eq(2)', nRow).html();
            status = status == 1 ? 'External' :
              (status == '0' ? 'Internal' : '')
            $('td:eq(2)', nRow).html(status)

            // Translating vendors column
            var vendor=$('td:eq(3)', nRow).html();
            switch (vendor)
            {
            case "610":
              vendor="Apple"
              break;
            case "10ac":
              vendor="Dell"
              break;
	    case "15c3":
		vendor="Dell"
		break;
            }
            $('td:eq(3)', nRow).html(vendor)

            // Format timestamp from unix to relative
            date = aData['displays#timestamp'];
            if(date)
            {
                  $('td:eq(8)', nRow).html(moment.unix(date).fromNow());
            }

          } //end fnCreatedRow

        } ); //end oTable

        // Use hash as searchquery
        if(window.location.hash.substring(1))
        {
          oTable.fnFilter( decodeURIComponent(window.location.hash.substring(1)) );
        }

      } );
    </script>

    <h3>Displays report <span id="total-count" class='label label-primary'>…</span></h3>

      <table class="table table-striped table-condensed table-bordered">

        <thead>
          <tr>
            <th data-colname='machine#computer_name'>On computer</th>
            <th data-colname='displays#serial_number'>Computer serial</th>
            <th data-colname='displays#type'>Type</th>
            <th data-colname='displays#vendor'>Vendor</th>
            <th data-colname='displays#model'>Model</th>
            <th data-colname='displays#display_serial'>Serial number</th>
            <th data-colname='displays#manufactured'>Manufactured</th>
            <th data-colname='displays#native'>Native resolution</th>
            <th data-colname='displays#timestamp'>Detected</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td colspan="6" class="dataTables_empty">Loading data from server</td>
          </tr>
        </tbody>

      </table>

    </div> <!-- /span 12 -->

  </div> <!-- /row -->

</div>  <!-- /container -->

<?$this->view('partials/foot')?>
