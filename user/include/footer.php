<footer class="footer">
	<div class="container">
		<p class="mt-3 py-3 px-3">Copyright &copy; 2020 msrajawat298. All Right Reserved.</p>
	</div>
</footer>
   
<!-- external link for Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
feather.replace()//function for icon loading

$(document).ready(function() {
   var table =  $('#example').DataTable( {
	   lengthChange: false,
        dom: 'Bfrtip',
        buttons: [
            {	
                extend:    'copyHtml5',
                exportOptions: {
					columns: 'th:not(:last-child)'
                },
				text:      '<i class="fa fa-files-o"> Copy </i>',
                className: 'text-primary',
                footer: true,
                titleAttr: 'Copy'

            },

            {
                extend:    'excelHtml5',
			    exportOptions: {
                   columns: 'th:not(:last-child)'
                },
                text:      '<i class="fa fa-file-excel-o"> Export as Excel</i>',
                className: 'text-success',
                footer: true,
                titleAttr: 'Excel'
            },

            {
                extend:    'csvHtml5',
				exportOptions: {
                   columns: 'th:not(:last-child)'
                },
                text:      '<i class="fa fa-file-text-o"> Export as CSV </i>',
                className: 'text-info',
                footer: true,
                titleAttr: 'CSV'
            },

            {
                extend:    'pdfHtml5',
				exportOptions: {
                   columns: 'th:not(:last-child)'
                },
				messageTop: 'This file is export from www.event-info.com',
				messageBottom: 'Contact-us We are always we there for your help. ',
				text:  '<i class="fa fa-file-pdf-o"> Export as PDF</i>',
                titleAttr: 'PDF',
                className: 'text-danger',
                footer: true,
				title:'Data Export PDF File'
            },

			{
                extend:    'print',
				exportOptions: {
                   columns: 'th:not(:last-child)'
                },
				messageBottom: 'Contact-us We are always we there for your help. ',
				text:      '<i class="fa fa-print">  print </i>',
                titleAttr: 'Print',
                footer: true,
				title:'Data Export File'
            },
        ]
    } );
	 table.buttons().container()
        .appendTo( '#example_wrapper .col-md-6:eq(0)' );
} );

</script>
	
<!--external js file active toggle buttons-->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!--external link of js for data tables-->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>