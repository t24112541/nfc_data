<div id="loading" class="spinner_border text-primary" style="display:none"></div>

<div class="row">
    <div class="col-lg-12 mb-4">
    	<div class="card shadow mb-4">
			<div class="modal-dialog modal-lg" >
				<div class="modal-content">
		        <!-- Modal Header -->
					<div class="modal-header" id="head_stage">
						<h4 class="modal-title">ข้อมูลยาผู้ป่วย</h4>
						<button type="button" onclick="clear_input()" class="close" data-dismiss="modal">&times;</button>
					</div>
		        <!-- Modal body -->

					<div class="modal-body">
					    <div class="col-sm-12 col-md-12 mb-12">
					    	<div class="card-body">
								<form class="form-inline" id="frm_search_drug_patient">
								    <div class="input-group">
								      <div class="input-group-prepend">
								        <span class="input-group-text"><i class="fas fa-search"></i></span>
								      </div>
								      <input id="txt_search" type="text" class="form-control" placeholder="ค้นหาชื่อหรือรหัสยา..">
								      <button type="button" onclick="func_search()" class="btn btn-light">ค้นหา</button>
								    </div>
								</form>
							</div>
						</div>
						<div class="col-sm-12 col-md-12 mb-12">
							<div class="card-body">
				                <div class="table-responsive">
				                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
				                        <thead>
				                            <tr>
				                                <th>ชื่อยา</th>
				                                <th>เพิ่ม</th>
				                            </tr>
				                        </thead>
				                        <tbody id="p_drug_content">
				                          
				                        </tbody>
				                    </table>
				                </div>
				            </div>
				        </div>
					    <div id="frm"></div>
					    <div id="msg"></div>
					</div>
				
		        <!-- Modal footer -->
					<div class="modal-footer" id="modal_p_terms_of_use_foot">	
						<div id="mng"></div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	var data;
	var tmp_page;
	var tmp_filter;
	$("title").text(title());

	function func_search(){
		load_p_drug($("#txt_search").val(),tmp_page);
	}
	$("#frm_search_drug_patient").submit(function( event ) {
		console.log("frm_search_drug_patient");
	  // func_search();
	  event.preventDefault();
	});
</script>