@extends('layouts.master')


@section('breadcrumb')
	
	
	
@endsection


@section('content')

	<div class="row">
		<div class="col-md-12" id="chartBar">
			
		</div>
	</div>
	<div class="row">
		<div class="col-md-12" id="chartPie">
			
		</div>
	</div>
@endsection

@section('necessaryScripts')

	<script src="js/highcharts.js"></script>
	<script type="text/javascript">

	

		
		$(function () { 
		    $('#chartBar').highcharts({
		        chart: {
		            type: 'bar'
		        },
		        title: {
		            text: 'Nilai kuis siswa'
		        },
		        xAxis: {
		           
		            categories: ['Kuis 1', 'Kuis 2', 'Kuis 3']
		        },
		        yAxis: {
		            title: {
		                text: 'Nilai'
		            }
		        },
		        series: [


			        {
			            name: 'Jane',
			            data: [80, 87, 85]
			        }, 
			        {
			            name: 'John',
			            data: [79, 82, 94]
			        },
			        {
			        	name: 'Gondrong',
			        	data : [60, 70, 80]
			        }
			        
		        ]
		    });
		});



//Pie chart script
/*
		$(function () {
		    $('#chartPie').highcharts({
		        chart: {
		            plotBackgroundColor: null,
		            plotBorderWidth: null,
		            plotShadow: false
		        },
		        title: {
		            text: 'Browser market shares at a specific website, 2014'
		        },
		        tooltip: {
		            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
		        },
		        plotOptions: {
		            pie: {
		                allowPointSelect: true,
		                cursor: 'pointer',
		                dataLabels: {
		                    enabled: true,
		                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
		                    style: {
		                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
		                    }
		                }
		            }
		        },
		        series: [{
		            type: 'pie',
		            name: 'Browser share',
		            data: [
		                ['Firefox',   45.0],
		                ['IE',       26.8],
		                {
		                    name: 'Chrome',
		                    y: 12.8,
		                    sliced: true,
		                    selected: true
		                },
		                ['Safari',    8.5],
		                ['Opera',     6.2],
		                ['Others',   0.7]
		            ]
		        }]
		    });
		});

*/
	</script>

@endsection
