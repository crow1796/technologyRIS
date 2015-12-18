<!DOCTYPE html>
<html lang="en" mozNoMarginBoxes>
	<head>
		<title>Print Document</title>
		@include('master._assets')
		<style type="text/css" media="print">
	        @page 
	        {
	            size: auto;   /* auto is the current printer page size */
	            margin: .29in .25in .29in .39in;  /* this affects the margin in the printer settings */
	        }

	        body 
	        {
	            background-color:#FFFFFF; 
	            margin: 0px;  /* the margin on the content before printing */
	       }
	    </style>
		<script type="text/javascript">
			$(function(){

				$('#print_btn').on('click', function(){
					$(this).hide();
					$('body').find('a').hide();

					window.print();

					$(this).show();
					$('body').find('a').show();
				});

				var beforePrint = function() {
					$('#print_btn').hide();
					$('body').find('a').hide();
			    };

			    var afterPrint = function() {
			        $('#print_btn').show();
			        $('body').find('a').show();
			    };

			    if (window.matchMedia) {
			        var mediaQueryList = window.matchMedia('print');
			        mediaQueryList.addListener(function(mql) {
			            if (mql.matches) {
			                beforePrint();
			            } else {
			                afterPrint();
			            }
			        });
			    }

			    window.onbeforeprint = beforePrint;
			    window.onafterprint = afterPrint;
			});
		</script>
	</head>

	<body>
		<button class="btn btn-primary btn-xs" id="print_btn">
			<span class="glyphicon glyphicon-print"></span> Print or Save
		</button>

		<div class="container">
			<h2 class="pageheader text-center">
				Technology Resource Inventory System
			</h2>
			<h3 class="page-header text-center">{{ $title }}</h3>
			@yield('printdata')

		</div>
	</body>
</html>