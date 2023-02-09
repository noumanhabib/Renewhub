@extends('layouts.layout')
@section('title',$title)
@section('content')
<div id="page-wrapper">
	<div class="header">
		<h1 class="page-header">
			<small>FQC Report List</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="{{url('/home')}}">Home</a></li>
			<li class="active">FQC Statistics Report</li>
		</ol>
	</div>
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<!-- Advanced Tables -->
				<div class="panel panel-default">
					<div class="panel-heading d-flex">
						<div>FQC Report </div>
						<div class="d-flex">
							<div id="reportrange"
								style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
								<i class="fa fa-calendar"></i>&nbsp;
								<span></span> <i class="fa fa-caret-down"></i>
							</div>&nbsp;&nbsp;
							<a href="{{url('download-fqc-report')}}"><button class="btn btn-primary button_right"
									id="add_category_btn">Export </button></a>
						</div>
					</div>



					<div class="panel-heading">
						FQC Report List
					</div>
					<div class="panel-body">
						<div class="table-responsive" id="dvData">
							<table id="dataTableID"
								class="table table-striped table-bordered table-hover data_tablelist">
								<thead>
									<tr>
										<th>Sr.No</th>
										<th>FQC Date</th>
										<th>UIN </th>
										<th>Brand </th>
										<th>Model </th>
										<th>Color </th>
										<th>RAM </th>
										<th>ROM </th>
										<th>Fqc Engg. Name </th>
										<th>Repaired Engg. Name </th>
										<th>FQC Status </th>
										<th>Current Sub Status </th>
										<th>Remark</th>
										<th>Repaired Date</th>
									</tr>
								</thead>
								<tbody>
									<?php $i=1;   
								
								  ?>
									@foreach($data as $key => $d)
									@php $total = 0; @endphp

									<?php
								
								 $usersddfio = DB::table('els_system_allocated_engineer')
                                    ->where('els_system_id', $d->els_system_id)
                                     ->where('status', 33)
                                    ->count(); 
                                    
                                    if($usersddfio>0)
                                    {
                                        
                                        
                                    $usersddfiof = DB::table('els_system_allocated_engineer')
                                    ->where('els_system_id', $d->els_system_id)
                                     ->where('status', 33)
                                    ->first();
                                    
                                    $fqcdate=$usersddfiof->created_at;
                                    
								
								 $usersddfi = DB::table('els_system_allocated_engineer')
                                    ->where('els_system_id', $d->els_system_id)
                                           ->where('id', '>=' , $d->id)
                                     ->where('status', 30)
                                    ->count(); 
                                    
                                     $usersddfii = DB::table('els_system_allocated_engineer')
                                    ->where('els_system_id', $d->els_system_id)
                                     ->where('id', '>=' , $d->id)
                                     ->where('status', 20)
                                    ->count(); 
                                    
                                    
                                    
                                 
                                    if($usersddfii>0)
                                    {
                                        
                                        
                                      $usersddfioFQC = DB::table('els_system_allocated_engineer')
                                    ->where('els_system_id', $d->els_system_id)
                                     ->where('status', 33)
                                    ->where('id', '>=' , $d->id)
                                    ->first(); 
                                       @$fqcdate=$usersddfioFQC->created_at;
                                       
                                       if(@$usersddfioFQC->id)
                                       {
                                           $fqc='Failed';  
                                       }
                                       else
                                       {
                                            $fqc='Under Observed';
                                       }
                                    
                                      $usersddfivf = DB::table('els_system_allocated_engineer')
                                     ->where('els_system_id', $d->els_system_id)
                                     ->where('id', '>=' , $d->id)
                                     ->where('status', 20)
                                     ->first();  
                                     
                                       @$remarks=@$usersddfivf->remark;
                                           @$created_att=$usersddfivf->created_att;
                                        
                                      
                                    }
                                      else if($usersddfi>0)
                                    {
                                       
                                     $usersddfivp = DB::table('els_system_allocated_engineer')
                                     ->where('els_system_id', $d->els_system_id)
                                     ->where('status', 30)
                                    ->where('id', '>=' , $d->id)
                                     ->first(); 
                                     
                                     
                                      $usersddfioFQC = DB::table('els_system_allocated_engineer')
                                    ->where('els_system_id', $d->els_system_id)
                                     ->where('status', 33)
                                    ->where('id', '>=' , $d->id)
                                    ->first(); 
                                     
                                     @$fqcdate=$usersddfioFQC->created_at;
                                      @$remarks=@$usersddfivp->remark;
                                      @$created_att=$usersddfivp->created_att;
                                     
                                      if(@$usersddfioFQC->id)
                                       {
                                          $fqc='Pass';   
                                       }
                                       else
                                       {
                                            $fqc='Under Observed';
                                       }
                                     $fqc='Pass'; 
                                    }
                                    else
                                    {
                                        $fqcdate='';
                                         $fqc='Under Observe';
                                         $remarks='';
                                    } 
                                    } else 
                                    {
                                        $fqcdate='';
                                         $fqc='Under Observe SR';
                                         $fqcdate='';
                                         $remarks='';
                                    }
                                    
                                    
                                    
                     $usersddfivfc = DB::table('els_system_allocated_engineer')
                                     ->where('els_system_id', $d->els_system_id)
                                     ->where('status', '22')
                                      ->where('id', '<=' , $d->id)
                                     ->orderBy('id','DESC')
                                     ->first(); 
                                      $usersddfivff = DB::table('els_system_allocated_engineer')
                                     ->where('els_system_id', $d->els_system_id)
                                     ->where('status', '22')
                                      ->where('id', '<=' , $d->id)
                                        ->orderBy('id','DESC')
                                     ->count(); 
                                     
                                     
                                     
                            if($usersddfivff>0)       
                            {
                                 $usersddfivffcc = DB::table('users')
                                     ->where('id', $usersddfivfc->engineer_id)
                                       ->orderBy('id','DESC')
                                      
                                     
                                     ->first(); 
                                     
                                     
                                     $dated=$usersddfivfc->created_at;
                                     
                                    //  $dated=$usersddfivfc->created_at;
                                
                                
                            }
                            
                            
                            
                            
                            
                              $usersddfivfcvv = DB::table('els_system_allocated_engineer')
                                     ->where('els_system_id', $d->els_system_id)
                                     ->where('status', '18')
                                      ->where('id', '<=' , $d->id)
                                     ->orderBy('id','DESC')
                                     ->first(); 
                                    
                                     
                    
                            
                            
                            
                            
                                    
								$d->fqcdate; 
								$d->name;
								$fqcdate;        
								
								?>
									<tr>
										<td>
											<?=$i++?>
										</td>
										<td>{{$d->fqcdate}}</td>

										<td>{{$d->barcode}}</td>
										<td>{{$d->bname}}</td>
										<td>{{$d->mname}}</td>

										<td>{{$d->colour_name}}</td>
										<td>{{$d->ram}}</td>
										<td>{{$d->rom}}</td>

										<td>{{$d->name}}</td>
										<td>{{@$usersddfivffcc->name}}</td>
										<td>
											<?php echo $fqc; ?>
										</td>

										<td>{{$d->status}}</td>
										<td>{{@$remarks}}</td>
										<td>{{@$dated}}</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script type="text/javascript">
	var start = moment().subtract(29, 'days');
var end = moment();
@if(session()->get('start_date') && session()->get('end_date'))
end = moment("{{session()->get('end_date')}}");
start = moment("{{session()->get('start_date')}}");
@endif 
console.log(end);
function cb(start, end) {
	var csrfToken = "{{ csrf_token() }}";
	$.ajax({
		type: "POST",
		url: "{{url('set_date_range_filterp')}}",
		headers: {
			"X-CSRF-Token": csrfToken,
		},
		data: {start_date:start.format('YYYY-MM-DD'),end_date:end.format('YYYY-MM-DD')},
		dataType:'JSON',
		success: function(d)
		{
		}
	});
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
}

function cba(start, end) {
	var csrfToken = "{{ csrf_token() }}";
	$.ajax({
		type: "POST",
		url: "{{url('set_date_range_filterp')}}",
		headers: {
			"X-CSRF-Token": csrfToken,
		},
		data: {start_date:start.format('YYYY-MM-DD'),end_date:end.format('YYYY-MM-DD')},
		dataType:'JSON',
		success: function(d)
		{
			location.reload();
		}
	});
    $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
}

$('#reportrange').daterangepicker({
    startDate: start,
    endDate: end,
    ranges: {
       'Today': [moment(), moment()],
       'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
       'Last 7 Days': [moment().subtract(6, 'days'), moment()],
       'Last 30 Days': [moment().subtract(29, 'days'), moment()],
       'This Month': [moment().startOf('month'), moment().endOf('month')],
       'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    }
}, cba);

cb(start, end);

$(document).ready(function () {
	$('#dataTableID').DataTable();
	
	
	
	// var oTable = $('#dataTableID').DataTable({
		// "bDestroy": true,
		// 'processing': true,
		// 'serverSide': true,		
		// "ajax":{
			// "url": "{{url('get-enginner-work-report-list')}}"
		// }, 	
		// "columns": [
			// { data: "id" },
			// { data: "name" },
			// { data: "repair" },
			// { data: "l3" },
			// { data: "l4" },
			// { data: "fqc" },
			// { data: "fqc_fails" },
			// { data: "shrink_pack" },
			// { data: "total_system" },
		// ],
		// "rowCallback": function (nRow, aData, iDisplayIndex) {
			// var oSettings = this.fnSettings ();
			// $("td:first", nRow).html(oSettings._iDisplayStart+iDisplayIndex +1);
			// return nRow;
		// },
		// "order": [[1, 'asc']],
		// "columnDefs": [{ orderable: false, "targets": 0 }]
	// });
});
</script>
@endsection