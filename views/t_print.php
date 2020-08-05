<title></title>
<link href="../css/sb-admin-2.min.css?v=1001" rel="stylesheet">
<link href="../css/cv_style.css" rel="stylesheet">

<div id="print_view"></div>
<button id="btn_save" onclick="add()" type="button" class="btn btn-success" data-dismiss=""><i class="fas fa-save fa-1x"></i> พิมพ์</button>
<button id="btn_nfc" onclick="print_nfc()" type="button" class="btn btn-success" data-dismiss=""><i class="fas fa-save fa-1x"></i> พิมพ์ TAG </button>
<script src="../js/cv_js.js?v=1014"></script>
<script src="../js/jquery-3.4.1.js"></script>
<script src="../js/popper.min.js"></script>
<script type="text/javascript">
	$("title").text(title());	
	// console.log(sessionStorage.getItem("print_page"));
	// $("#print_view").html(get_print_txt());
	$("#print_view").html(sessionStorage.getItem("print_page"));
	var link_patient_detail="../call_controller/p_terms_of_use.php";
	function add(){
		$("#msg").html("");

			let f_data=new FormData();
			let data = $("#print_stage").serializeArray();
			$.each(data,(key,val)=>{
				f_data.append(val.name,val.value);
			});
			f_data.append("print_stage",true);
			event.preventDefault();
			$.ajax({
				type: "POST",
	 			url: link_patient_detail,
	 			data: f_data,
				contentType: false,
				processData: false,
			}).done((res)=> {
				let data=JSON.parse(res);
				if(data.status){
					cv_print('print_view');
				}else{
					$("#msg").html("<div style='color:#bd4646'>"+data.msg+"</div>");
				}	 				
	 		});
	}
	function print_nfc(){
			let f_data=new FormData();
			let data = $("#print_nfc").serializeArray();
			$.each(data,(key,val)=>{
				f_data.append(val.name,val.value);
			});
			f_data.append("print_nfc",true);
			event.preventDefault();
			$.ajax({
				type: "POST",
	 			url: link_patient_detail,
	 			data: f_data,
				contentType: false,
				processData: false,
			}).done((res)=> {
				let data=JSON.parse(res);
				if(data.status){
					// cv_print('print_view');
				}else{
					$("#msg").html("<div style='color:#bd4646'>"+data.msg+"</div>");
				}	 				
	 		});
	}	
</script>