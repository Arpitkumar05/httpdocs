/* 
Developed By		:	Manoj Kumar
Date				:	25 NOVEMBER 2017
*/
/* accordian start */
$(document).ready(function(){	
	var currclass		=	CURRENTCLASS;
	if(CURRENTMETHOD.indexOf("ddedit")>0){
	   var activelink	=	'managedata'; 
	} else if(CURRENTMETHOD.indexOf("iewdata")>0){
	   var activelink	=	'managedata';
	} else if(CURRENTMETHOD.indexOf("order")>0){
	   var activelink	=	'managedata';
	//} else if(CURRENTCLASS == 'adminvegetables'){
	//	currclass		=	'adminvegcategory';
	//	var activelink	=	CURRENTMETHOD; 
	} else {
	  var activelink	=	CURRENTMETHOD; 
	}
   
	var url = FULLSITEURL+currclass+'/'+activelink; 
    $('.sidebar #side-menu li a[href^="' + url + '"]').addClass('active');
	$('.sidebar #side-menu li a[href^="' + url + '"]').parent().parent('.nav-second-level').addClass('collapse').addClass('in').prev('a').addClass('active').parent('li').addClass('active');
	$('.sidebar #side-menu li a[href^="' + url + '"]').parent().parent('.nav-third-level').addClass('collapse').addClass('in').prev('a').addClass('active').parent('li').addClass('active').parent('.nav-second-level').addClass('collapse').addClass('in').prev('a').addClass('active').parent('li').addClass('active');
});
/* accordian start End */

//////////////////////////////////   Customer Registration Form Valiation
if($("#Current_page_form").length) {
	$("#Current_page_form").validate({ 
		rules: {
			new_password: { minlength: 6, maxlength: 25 },
			conf_password: { minlength: 6, equalTo: "#new_password" },
	        phone:{ minlength:10, maxlength:15, numberandsign:true },
	        mobile:{ minlength:10, maxlength:15, numberandsign:true }
		},
		messages: {
		  new_password: { minlength: "Password at least 6 chars!" },
		  conf_password: { equalTo: "Password fields have to match !!", minlength: "Confirm password at least 6 chars!" }
		}
	});
}

function check_form_error(){	
	$('#Current_page_form .form-group, #Current_page_form_schadmin .form-group').each(function(){	
		if($(this).find('input.error').length){	
			$(this).addClass('has-error');	
		} else if($(this).find('select.error').length){	
			$(this).addClass('has-error');
		} else if($(this).find('textarea.error').length){	
			$(this).addClass('has-error');
		}
		
		if($(this).find('input.valid').length){	
			$(this).removeClass('has-error');	
		} else if($(this).find('select.valid').length){	
			$(this).removeClass('has-error');
		} else if($(this).find('textarea.valid').length){	
			$(this).removeClass('has-error');
		}
	});
	
	$('#LoginForm .form-group').each(function(){	
		if($(this).find('input.error').length){	
			$(this).addClass('has-error');	
		}
		
		if($(this).find('input.valid').length){	
			$(this).removeClass('has-error');	
		}
	});
}

$(document).ready(function(){
	$(".form-group label[class*='error']").closest('.form-group').addClass('has-error'); 
	$(".form-group label[class*='error']").prev('input').addClass('error');
	$(".form-group label[class*='error']").prev('select').addClass('error');
	$(".form-group label[class*='error']").prev('textarea').addClass('error');
});

//////////////////////////////////   Image Upload Through Ajax
function UploadImage(count)
{	
	var imgcount = count;
	if (document.getElementById('uploadIds'+imgcount)) 
	{
		var btnUpload=$('#uploadIds'+imgcount);
		var status=$('#uploadstatus'+imgcount);
	
		new AjaxUpload(btnUpload, {
			action: FULLSITEURL+CURRENTCLASS+'/UplodeImage',
			name: 'uploadfile',
			data: {count:count},
			onSubmit: function(file, ext){
				if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
					status.text('Only JPG, PNG, GIF files are allowed');
					return false;
				}			
				status.text('Uploding.....');
			},
			onComplete: function(file, response){ 
				//alert(response);
				responsedata	=	response.split('_____');
				if(responsedata[0] == "ERROR"){ 
					status.text(responsedata[1]);
					return false;
				}
				status.text('');
				if(responsedata[0] != "UPLODEERROR"){ 
					document.getElementById('uploadimage'+imgcount).value = responsedata[0];
					document.getElementById('uploadphoto'+imgcount).innerHTML ='<img src="'+responsedata[0]+'" border="0" width="114" /><a href="javascript:void(0);" onClick="DeleteImage(\''+responsedata[0]+'\',\''+imgcount+'\');"><img src="'+FULLSITEURL+'assets/siteadmin/images/cross.png" border="0" alt="" /></a>';
				}
			}
		});
	}
}

//////////////////////////////////   Image delete Through Ajax
function DeleteImage(imagename,imgcount)
{
    if(confirm("Sure to delete?"))
    {
        $.ajax({
		     type: 'post',
              url: FULLSITEURL+CURRENTCLASS+'/DeleteImage',
			 data: {csrf_api_key:csrf_api_value,imagename:imagename},
              success: function(response) { 
			  	document.getElementById('uploadimage'+imgcount).value = '';
				document.getElementById('uploadphoto'+imgcount).innerHTML ='';
              }
            });
    }
}

/** ******  chek login   *********************** **/
$(function () { 
	if(CURRENTCLASS != 'siteadmin' && CURRENTCLASS != 'index')
	{
		$.ajax({
			type: 'post',
			url: FULLSITEURL+'siteadmin/authcheckbyajax',
			success: function(data){
				if(data == 'Deleted')
					window.location.href = FULLSITEURL+'siteadmin/index';
			}
		});
	}
});

/** ******  for default all data show   *********************** **/
$(document).ready(function(){ 
	if(document.getElementById('ShowAllDataListDiv')){
		$('#ShowAllDataListDivImage').show();
		$.ajax({
			type: 'post',
			 url: FULLSITEURL+CURRENTCLASS+'/getalldatalist',
			data: {csrf_api_key:csrf_api_value,showalldata:'Yes'},
		 success: function(data){
			 	$('#ShowAllDataListDivImage').hide();
				$('#ShowAllDataListDiv').html(data);
			}
		});
	}
});

/** ******  for show per page data   *********************** **/
$(document).on('change',"#ShowAllDataListDiv #data_length",function(){
	$('#ShowAllDataListDivImage').show();
	var prpage	=	$(this).val();
	$.ajax({
		type: 'post',
		 url: FULLSITEURL+CURRENTCLASS+'/getalldatalist/',
		 data: {csrf_api_key:csrf_api_value,perpage:prpage},
	 success: function(data){
		 	$('#ShowAllDataListDivImage').hide();
			$('#ShowAllDataListDiv').html(data);
		}
	});
	return false;
});

/** ******  for search section   *********************** **/
$(document).on('click',"#ShowAllDataListDiv #search_in_table",function(){
	var searchfield	=	$('select[id^="search_field"]').val();
	var searchvalue	=	$('input[id^="search_value"]').val();
	if(searchfield == '')
		alert('Please select field type');
	else if(searchvalue == '')
		alert('Please insert search text');	
	else
	{
		$('#ShowAllDataListDivImage').show();
		$.ajax({
			type: 'post',
			 url: FULLSITEURL+CURRENTCLASS+'/getalldatalist',
			data: {csrf_api_key:csrf_api_value,searchfield:searchfield,searchvalue:searchvalue},
		 success: function(data){
			 	$('#ShowAllDataListDivImage').hide();
				$('#ShowAllDataListDiv').html(data);
			}
		});
	}
	return false;
});

/** ******  for search section   *********************** **/
$(document).on('change',"#ShowAllDataListDiv #search_field_individual",function(){
	var searchfield	=	$('select[id^="search_field_individual"]').val();
	$('#ShowAllDataListDivImage').show();
	$.ajax({
		type: 'post',
		 url: FULLSITEURL+CURRENTCLASS+'/getalldatalist',
		data: {csrf_api_key:csrf_api_value,searchfield:searchfield},
	 success: function(data){
		 	$('#ShowAllDataListDivImage').hide();
			$('#ShowAllDataListDiv').html(data);
		}
	});
	return false;
});

/** ******  for show all data   *********************** **/
$(document).on('click',"#ShowAllDataListDiv #show_all_data_in_table",function(){
	$('#ShowAllDataListDivImage').show();
	$.ajax({
		type: 'post',
		 url: FULLSITEURL+CURRENTCLASS+'/getalldatalist',
		data: {csrf_api_key:csrf_api_value,showalldata:'Yes'},
	 success: function(data){
		 	$('#ShowAllDataListDivImage').hide();
			$('#ShowAllDataListDiv').html(data);
		}
	});
	return false;
});

/** ******  for pagination   *********************** **/
$(document).on('click',"#ShowAllDataListDiv .pagination a[href*='"+CURRENTCLASS+"/getalldatalist']",function(){
	$('#ShowAllDataListDivImage').show();
	var currenturl	=	$(this).attr('href').split('/');
	var	curpage		=	currenturl[currenturl.length-1];
	$.ajax({
		type: 'post',
		 url: FULLSITEURL+CURRENTCLASS+'/getalldatalist/'+curpage,
	 success: function(data){
		 	$('#ShowAllDataListDivImage').hide();
			$('#ShowAllDataListDiv').html(data);
		}
	});
	return false;
});

/** ******  for change status   *********************** **/
$(document).on('click',"#ShowAllDataListDiv .table_action_data a[href*='"+CURRENTCLASS+"/changestatus']",function(){
	var currentlink	=	$(this).attr('href').split('/');
	var	curid		=	currentlink[currentlink.length-2];
	var	type		=	currentlink[currentlink.length-1];
	if(curid && type)
	{
		var	curobj	=	$(this);
		$('#ShowAllDataListDivImage').show();
		$.ajax({
			type: 'post',
			 url: FULLSITEURL+CURRENTCLASS+'/changestatus/',
			 data: {csrf_api_key:csrf_api_value,curid:curid,type:type},
		 success: function(datamessage){
			    var	message		=	datamessage.split('_____');
			 	if(message[0] == 'SUCCESS')
				{
					if(curobj.attr('class') == 'btn btn-warning btn-circle tooltipVal')
					{
						curobj.removeClass('btn btn-warning btn-circle tooltipVal').addClass('btn btn-success btn-circle tooltipVal');
						curobj.children('i').removeClass('fa fa-times').addClass('fa fa-check');
						curobj.attr('href',FULLSITEURL+CURRENTCLASS+'/changestatus/'+curid+'/N');
						curobj.attr('title','Active');
					}
					else if(curobj.attr('class') == 'btn btn-success btn-circle tooltipVal')
					{
						curobj.removeClass('btn btn-success btn-circle tooltipVal').addClass('btn btn-warning btn-circle tooltipVal');
						curobj.children('i').removeClass('fa fa-check').addClass('fa fa-times');
						curobj.attr('href',FULLSITEURL+CURRENTCLASS+'/changestatus/'+curid+'/Y');
						curobj.attr('title','Inactve');
					} 
				}
				else if(message[0] == 'ERROR')
				{
					$("#page-wrapper .row .row.show-grid").after(message[1]);
					setTimeout(AlertMessageTimedOut, 5000);
				}	
				$('#ShowAllDataListDivImage').hide();
			}
		});
	}
	return false;
});

/** ******  for single delete   *********************** **/
$(document).on('click',"#ShowAllDataListDiv .table_action_data a[href*='"+CURRENTCLASS+"/deletedata']",function(){
	var currentlink	=	$(this).attr('href').split('/');
	var	curid		=	currentlink[currentlink.length-1];
	if(curid)
	{
		if(confirm('Are you sure to delete this data?'))
		{
			$('#ShowAllDataListDivImage').show();
			var	curobj	=	$(this);
			$.ajax({
				type: 'post',
				 url: FULLSITEURL+CURRENTCLASS+'/deletedata/',
				 data: {csrf_api_key:csrf_api_value,curid:curid},
			 success: function(datamessage){
				 	var	message		=	datamessage.split('_____');
				 	if(message[0] == 'SUCCESS')
					{
						curobj.parent().parent().parent().hide();
						$("#page-wrapper .row .row.show-grid").after(message[1]);
						setTimeout(AlertMessageTimedOut, 5000);
					}
					else if(message[0] == 'ERROR')
					{
						$("#page-wrapper .row .row.show-grid").after(message[1]);
						setTimeout(AlertMessageTimedOut, 5000);
					}						
					$('#ShowAllDataListDivImage').hide();
				}
			});
		}
	}
	return false;
});

/** ******  for multiple delete   *********************** **/
$(document).on('click',"#Data_Form #check_all",function(){
	if($(this).is(":checked"))
		var	checkvalue	=	'true';
	else
		var	checkvalue	=	'false';
		
	$("form#Data_Form input:checkbox").each(function(){
		if($(this).attr('id')!='check_all'){ 
			if(checkvalue == 'true'){ 
				$(this).prop("checked",true);
				$(this).parent().parent().addClass('selected');
			}
			else if(checkvalue == 'false'){ 
				$(this).prop("checked",false);
				$(this).parent().parent().removeClass('selected');
			}
		}
	});
});

$(document).on('click',"#Data_Form input[id*='DataId']",function(){
	if($(this).is(":checked"))
		$(this).parent().parent().addClass('selected');
	else
		$(this).parent().parent().removeClass('selected');
	var total = 0;
	var count = 0;
	$("form#Data_Form input:checkbox").each(function(){
		if($(this).attr('id')!='check_all'){ 
			if(!$(this).is('input#check_all'))	total++;	
			if(!$(this).is('input#check_all') && $(this).is(":checked"))	count++;	
		}
	});
	if(total!=0 && count!=0 && total==count)
		$('#Data_Form #check_all').prop("checked",true);
	else
		$('#Data_Form #check_all').prop("checked",false);
});

$(document).on('click',"#Data_Form .deletemiltiple",function(){
	var count =	0;
	$("form input:checkbox").each(function(){
		if($(this).is(":checked")){   
			count++;
		}
	});
	if(count ==	0){
		alert('Please check at least one checkbox.');
	}
	else{
		if(confirm('Are you sure to delete this data?')){
			var deleteids	= [];
			 $("form#Data_Form input:checkbox").each(function(){
				if($(this).attr('id')!='check_all')
					if(!$(this).is('input#check_all') && $(this).is(":checked"))
						deleteids.push($(this).val());
			});	
			$('#ShowAllDataListDivImage').show();
			$.ajax({
				type: 'post',
				 url: FULLSITEURL+CURRENTCLASS+'/deletemultipledata/',
				 data: {csrf_api_key:csrf_api_value,deletemiltipledata:'Yes',deleteids:deleteids},
			 success: function(datamessage){
					var	message		=	datamessage.split('_____');
				 	if(message[0] == 'SUCCESS')
					{
						$.ajax({
							type: 'post',
							 url: FULLSITEURL+CURRENTCLASS+'/getalldatalist',
							data: {csrf_api_key:csrf_api_value,showalldata:'Yes'},
						 success: function(data){
								$('#ShowAllDataListDivImage').hide();
								$('#ShowAllDataListDiv').html(data);
								$("#page-wrapper .row .row.show-grid").after(message[1]);
								setTimeout(AlertMessageTimedOut, 5000);
								return false;
							}
						});
					}
					else if(message[0] == 'ERROR')
					{
						$("form#Data_Form input:checkbox").each(function(){
							$(this).prop("checked",false);
							$(this).parent().parent().removeClass('selected');
						});
						$("#page-wrapper .row .row.show-grid").after(message[1]);
						setTimeout(AlertMessageTimedOut, 5000);
						$('#ShowAllDataListDivImage').hide();
					}						
				}
			});
			return false;
		}
	}
});

// deactivate multiple data

$(document).on('click',"#Data_Form #deactivatemiltiple",function(){
	var count =	0;
	$("form input:checkbox").each(function(){
		if($(this).is(":checked")){   
			count++;
		}
	});
	if(count ==	0){
		alert('Please check at least one checkbox.');
	}
	else{
		if(confirm('Are you sure to deactivate these data?')){
			var deactivids	= [];
			 $("form#Data_Form input:checkbox").each(function(){
				if($(this).attr('id')!='check_all')
					if(!$(this).is('input#check_all') && $(this).is(":checked"))
						deactivids.push($(this).val());
			});	
			$('#ShowAllDataListDivImage').show();
			$.ajax({
				type: 'post',
				 url: FULLSITEURL+CURRENTCLASS+'/deactivatemultipledata/',
				 data: {csrf_api_key:csrf_api_value,deactivatemiltipledata:'Yes',deactivids:deactivids},
			 success: function(datamessage){
					var	message		=	datamessage.split('_____');
				 	if(message[0] == 'SUCCESS')
					{
						alert('All selected fields deactivated successfully');
						$.ajax({
							type: 'post',
							 url: FULLSITEURL+CURRENTCLASS+'/getalldatalist',
							data: {csrf_api_key:csrf_api_value,showalldata:'Yes'},
						 success: function(data){
								$('#ShowAllDataListDivImage').hide();
								$('#ShowAllDataListDiv').html(data);
								$("#page-wrapper .row .row.show-grid").after(message[1]);
								setTimeout(AlertMessageTimedOut, 5000);
								return false;
							}
						});
					}
					else if(message[0] == 'ERROR')
					{
						$("form#Data_Form input:checkbox").each(function(){
							$(this).prop("checked",false);
							$(this).parent().parent().removeClass('selected');
						});
						$("#page-wrapper .row .row.show-grid").after(message[1]);
						setTimeout(AlertMessageTimedOut, 5000);
						$('#ShowAllDataListDivImage').hide();
					}						
				}
			});
			return false;
		}
	}
});

// Activate multiple data

$(document).on('click',"#Data_Form #activatemiltiple",function(){
	var count =	0;
	$("form input:checkbox").each(function(){
		if($(this).is(":checked")){   
			count++;
		}
	});
	if(count ==	0){
		alert('Please check at least one checkbox.');
	}
	else{
		if(confirm('Are you sure to Activate these data?')){
			var activids	= [];
			 $("form#Data_Form input:checkbox").each(function(){
				if($(this).attr('id')!='check_all')
					if(!$(this).is('input#check_all') && $(this).is(":checked"))
						activids.push($(this).val());
			});	
			$('#ShowAllDataListDivImage').show();
			$.ajax({
				type: 'post',
				 url: FULLSITEURL+CURRENTCLASS+'/activatemultipledata/',
				 data: {csrf_api_key:csrf_api_value,activatemiltipledata:'Yes',activids:activids},
			 success: function(datamessage){
					var	message		=	datamessage.split('_____');
				 	if(message[0] == 'SUCCESS')
					{	
						alert('All selected fields activated successfully');
						$.ajax({
							type: 'post',
							 url: FULLSITEURL+CURRENTCLASS+'/getalldatalist',
							data: {csrf_api_key:csrf_api_value,showalldata:'Yes'},
						 success: function(data){
								$('#ShowAllDataListDivImage').hide();
								$('#ShowAllDataListDiv').html(data);
								$("#page-wrapper .row .row.show-grid").after(message[1]);
								setTimeout(AlertMessageTimedOut, 5000);
								return false;
							}
						});
					}
					else if(message[0] == 'ERROR')
					{
						$("form#Data_Form input:checkbox").each(function(){
							$(this).prop("checked",false);
							$(this).parent().parent().removeClass('selected');
						});
						$("#page-wrapper .row .row.show-grid").after(message[1]);
						setTimeout(AlertMessageTimedOut, 5000);
						$('#ShowAllDataListDivImage').hide();
					}						
				}
			});
			return false;
		}
	}
});

/** ******  for change status   *********************** **/
$(document).on('click',"#ShowAllDataListDiv .table_action_data a[href*='"+CURRENTCLASS+"/acceptdecliend']",function(){
	var currentlink	=	$(this).attr('href').split('/');
	var	curid		=	currentlink[currentlink.length-2];
	var	type		=	currentlink[currentlink.length-1];
	if(curid && type)
	{
		var accept	=	'NO';
		if(type == 'Y' && confirm('Are you sure to accept this user?')){
			accept	=	'YES';
		}
		if(type == 'B' && confirm('Are you sure to declined this user?')){
			accept	=	'YES';
		}
		if(accept	==	'YES'){
			var	curobj	=	$(this);
			$('#ShowAllDataListDivImage').show();
			$.ajax({
				type: 'post',
				 url: FULLSITEURL+CURRENTCLASS+'/acceptdecliend/',
				 data: {csrf_api_key:csrf_api_value,curid:curid,type:type},
			 success: function(datamessage){
					var	message		=	datamessage.split('_____');
					if(message[0] == 'SUCCESS')
					{
						$.ajax({
							type: 'post',
							 url: FULLSITEURL+CURRENTCLASS+'/getalldatalist',
							data: {csrf_api_key:csrf_api_value,showalldata:'Yes'},
						 success: function(data){
								$('#ShowAllDataListDivImage').hide();
								$('#ShowAllDataListDiv').html(data);
								$("#page-wrapper .row .row.show-grid").after(message[1]);
								setTimeout(AlertMessageTimedOut, 5000);
								return false;
							}
						});
					}
					else if(message[0] == 'ERROR')
					{
						$("#page-wrapper .row .row.show-grid").after(message[1]);
						setTimeout(AlertMessageTimedOut, 5000);
					}	
					$('#ShowAllDataListDivImage').hide();
				}
			});
		}
	}
	return false;
});

/** ******  for change status   *********************** **/
$(document).on('click',".view_table_action_data a[href*='"+CURRENTCLASS+"/changestatus']",function(){
	var currentlink	=	$(this).attr('href').split('/');
	var	method		=	currentlink[currentlink.length-3];
	var	curid		=	currentlink[currentlink.length-2];
	var	type		=	currentlink[currentlink.length-1];
	if(curid && type)
	{
		var	curobj	=	$(this);
		$.ajax({
			type: 'post',
			 url: FULLSITEURL+CURRENTCLASS+'/'+method,
			 data: {csrf_api_key:csrf_api_value,curid:curid,type:type},
		 success: function(datamessage){
			    var	message		=	datamessage.split('_____');
			 	if(message[0] == 'SUCCESS')
				{
					if(curobj.attr('class') == 'btn btn-warning btn-circle tooltipVal')
					{
						curobj.removeClass('btn btn-warning btn-circle tooltipVal').addClass('btn btn-success btn-circle tooltipVal');
						curobj.children('i').removeClass('fa fa-times').addClass('fa fa-check');
						curobj.attr('href',FULLSITEURL+CURRENTCLASS+'/changestatus/'+curid+'/N');
						curobj.attr('title','Active');
					}
					else if(curobj.attr('class') == 'btn btn-success btn-circle tooltipVal')
					{
						curobj.removeClass('btn btn-success btn-circle tooltipVal').addClass('btn btn-warning btn-circle tooltipVal');
						curobj.children('i').removeClass('fa fa-check').addClass('fa fa-times');
						curobj.attr('href',FULLSITEURL+CURRENTCLASS+'/changestatus/'+curid+'/Y');
						curobj.attr('title','Inactve');
					} 
				}
				else if(message[0] == 'ERROR')
				{
					$("#page-wrapper .row .row.show-grid").after(message[1]);
					setTimeout(AlertMessageTimedOut, 5000);
				}	
			}
		});
	}
	return false;
});

/** ******  for single delete   *********************** **/
$(document).on('click',".view_table_action_data a[href*='"+CURRENTCLASS+"/deletedata']",function(){
	var currentlink	=	$(this).attr('href').split('/');
	var	method		=	currentlink[currentlink.length-2];
	var	curid		=	currentlink[currentlink.length-1];
	if(curid)
	{
		if(confirm('Are you sure to delete this data?'))
		{
			var	curobj	=	$(this);
			$.ajax({
				type: 'post',
				 url: FULLSITEURL+CURRENTCLASS+'/'+method,
				 data: {csrf_api_key:csrf_api_value,curid:curid},
			 success: function(datamessage){
				 	var	message		=	datamessage.split('_____');
				 	if(message[0] == 'SUCCESS')
					{
						curobj.parent().parent().parent().hide();
						$("#page-wrapper .row .row.show-grid").after(message[1]);
						setTimeout(AlertMessageTimedOut, 5000);
					}
					else if(message[0] == 'ERROR')
					{
						$("#page-wrapper .row .row.show-grid").after(message[1]);
						setTimeout(AlertMessageTimedOut, 5000);
					}						
				}
			});
		}
	}
	return false;
});
