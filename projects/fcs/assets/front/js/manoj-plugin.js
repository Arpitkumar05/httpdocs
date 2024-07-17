/* 
Developed By		:	Manoj Kumar
Date				:	31 JANUARY 2017
*/
//////////////////////////////////   left menu active
$(document).ready(function(){	
    //var url      = window.location.href;
    //$('.side-nav li a[href="' + url + '"]').addClass('active');
	$('.side-nav li a[data="' + activemenu + '"]').addClass('active');
});
/* accordian start End */

//////////////////////////////////   Current Form Valiation
if($("#Current_form").length) {  
	$(document).ready(function(){
		$("#Current_form").validate({ 
			rules: {
				username: { minlength: 6, maxlength: 25, alphanumeric: true },
				password: { minlength: 6, maxlength: 25 },
				conf_password: { minlength: 6, equalTo: "#password" },
				phone:{ minlength:10, maxlength:15, numberandsign:true },
				mobile:{ minlength:10, maxlength:15, numberandsign:true }
			},
			messages: {
			  password: { minlength: "Password at least 6 chars!" },
			  conf_password: { equalTo: "Password fields have to match !!", minlength: "Confirm password at least 6 chars!" }
			}
		});
	});
}

$('.home_page_contact_form').find('label.error').prev().addClass('error');

function capLock(e){
 kc = e.keyCode?e.keyCode:e.which;
 sk = e.shiftKey?e.shiftKey:((kc == 16)?true:false);
 if(((kc >= 65 && kc <= 90) && !sk)||((kc >= 97 && kc <= 122) && sk))
  $('#ShowCapsLock').show();
 else
  $('#ShowCapsLock').hide();
}

//setTimeout(AlertMessageTimedOut, 5000);
function AlertMessageTimedOut() { 
	$('#myMessageModal').modal('hide');
}

/*$(function(){
  $("#datepicker").datepicker({'dateFormat':'yy-m-d',changeMonth: true,changeYear: true,yearRange: "1960:2050" });
  $("#datepicker1").datepicker({'dateFormat':'yy-m-d',changeMonth: true,changeYear: true,yearRange: "1960:2050"});
  $("#datepicker2").datepicker({'dateFormat':'yy-m-d',changeMonth: true,changeYear: true,yearRange: "1960:2050"});
});*/


//////////////////////////////////   Get state, city, locality and zipcode 
function get_satate_data(curobj,statename)
{ 
	var	statename		=	statename;
	$.ajax({
		type: 'post',
		 url: FULLSITEURL+'welcome/get_state',
		data: {statename:statename},
	 success: function(response){
			curobj.html(response);
			return false;
		}
	});
}

$(document).on('change','.stateparent #state',function(){
	var statename		=	$(this).val();
	var	cityname		=	'';
	$('.cityparent #city').parent().show();
	$('.cityparent #city').html('<option value="">City</option>');
	
	$('.localityparent #locality').html('<option value="">Locality</option>');
	$('.zipcodeparent #zipcode').val('');
	
	if(state !=''){
		$.ajax({
			type: 'post',
			 url: FULLSITEURL+'welcome/get_city',
			data: {statename:statename,cityname:cityname},
		 success: function(response){
				if(response == 'ERROR'){
					$('.cityparent #city').html('<option value="">City</option>');
					$('.cityparent #city').parent().hide();
					var localityname	=	'';
					$.ajax({
						type: 'post',
						 url: FULLSITEURL+'welcome/get_locality_by_state',
						data: {statename:statename,localityname:localityname},
					 success: function(response){
							$('.localityparent #locality').html(response);
						}
					});
				} else {
					$('.cityparent #city').parent().show();
					$('.cityparent #city').html(response);
				}
			}
		});
	}
});

function get_city_data(curobj,statename,cityname,localityname)
{ 
	var	statename		=	statename;
	var	cityname		=	cityname;
	var	localityname	=	localityname;
	if(statename)
	{
		$.ajax({
			type: 'post',
			 url: FULLSITEURL+'welcome/get_city',
			data: {statename:statename,cityname:cityname},
		 success: function(response){
				if(response == 'ERROR'){
					curobj.html('<option value="">City</option>');
					curobj.parent().hide();
					$.ajax({
						type: 'post',
						 url: FULLSITEURL+'welcome/get_locality_by_state',
						data: {statename:statename,localityname:localityname},
					 success: function(response){
							$('.localityparent #locality').html(response);
						}
					});
				} else {
					curobj.parent().show();
					curobj.html(response);
				}
				return false;
			}
		});
	}
}

$(document).on('change','.cityparent #city',function(){
	var statename		=	$('.stateparent #state').val();
	var	cityname		=	$(this).val();
	var	localityname	=	'';
	
	$('.localityparent #locality').html('<option value="">Locality</option>');
	$('.zipcodeparent #zipcode').val('');
	
	if(statename !='' && cityname !=''){
		$.ajax({
			type: 'post',
			 url: FULLSITEURL+'welcome/get_locality',
			data: {statename:statename,cityname:cityname,localityname:localityname},
		 success: function(response){
					$('.localityparent #locality').html(response);
			}
		});
	}
});

function get_locality_data(curobj,statename,cityname,localityname)
{ 
	var	statename		=	statename;
	var	cityname		=	cityname;
	var	localityname	=	localityname;
	if(statename && cityname)
	{
		$.ajax({
			type: 'post',
			 url: FULLSITEURL+'welcome/get_locality',
			data: {statename:statename,cityname:cityname,localityname:localityname},
		 success: function(data){
				curobj.html(data);
				return false;
			}
		});
	}
}

$(document).on('change','.localityparent #locality',function(){
	var statename		=	$('.stateparent #state').val();
	var	cityname		=	$('.cityparent #city').val();
	var	localityname	=	$(this).val();
	var	zipcodename		=	'';
	
	$('.zipcodeparent #zipcode').val('');
	
	if(statename !='' && localityname !=''){
		$.ajax({
			type: 'post',
			 url: FULLSITEURL+'welcome/get_zipcode',
			data: {statename:statename,cityname:cityname,localityname:localityname,zipcodename:zipcodename},
		 success: function(response){
					$('.zipcodeparent #zipcode').val(response);
			}
		});
	}
});

function get_zipcode_data(curobj,statename,cityname,localityname,zipcodename)
{ 
	var	statename		=	statename;
	var	cityname		=	cityname;
	var	localityname	=	localityname;
	var	zipcodename		=	zipcodename;
	if(statename && localityname)
	{
		$.ajax({
			type: 'post',
			 url: FULLSITEURL+'welcome/get_zipcode',
			data: {statename:statename,cityname:cityname,localityname:localityname,zipcodename:zipcodename},
		 success: function(data){
				curobj.val(data);
				return false;
			}
		});
	}
}



//////////////////////////////////   Get class, and section 
function get_class_data(curobj,schoolid,classid)
{ 
	var	schoolid		=	schoolid;
	var	classid			=	classid;
	if(schoolid != '')
	{
		$.ajax({
			type: 'post',
			 url: FULLSITEURL+'welcome/get_classes',
			data: {schoolid:schoolid,classid:classid},
		 success: function(data){
				curobj.html(data);
				return false;
			}
		});
	}
}

$(document).on('change','.classesparent #class_id',function(){
	var	schoolid	=	$('#Current_form #school_id').val();  
	var	classid		=	$(this).val();
	var	sectionid	=	'';
	var	curobj		=	$(this)
	$.ajax({
		type: 'post',
		 url: FULLSITEURL+'welcome/get_sections',
		data: {schoolid:schoolid,classid:classid,sectionid:sectionid},
	 success: function(data){  
			$('.sectionsparent #section_id').html(data);
			return false;
		}
	});															
});

function get_section_data(curobj,schoolid,classid,sectionid)
{ 
	var	schoolid		=	schoolid;
	var	classid			=	classid;
	var	sectionid		=	sectionid;
	if(schoolid != '' && classid != '')
	{
		$.ajax({
			type: 'post',
			 url: FULLSITEURL+'welcome/get_sections',
			data: {schoolid:schoolid,classid:classid,sectionid:sectionid},
		 success: function(data){
				curobj.html(data);
				return false;
			}
		});
	}
}


//////////////////////////////////   Image Upload Through Ajax
function UploadImage(imagetype,count,filetype)
{	
	var imgcount = count;
	if (document.getElementById('uploadIds'+imgcount) && imagetype && filetype) 
	{
		var btnUpload=$('#uploadIds'+imgcount);
		var status=$('#uploadstatus'+imgcount);
	
		new AjaxUpload(btnUpload, {
			action: FULLSITEURL+'welcome/UplodeImage',
			name: 'uploadfile',
			data: {imagetype:imagetype,filetype:filetype},
			onSubmit: function(file, ext){	
				if(filetype == 'image')
				{
					if (! (ext && /^(jpg|png|jpeg|gif)$/.test(ext))){ 
						status.text('Only JPG, PNG, GIF files are allowed');
						return false;
					}	
				}
				else if(filetype == 'worddoc')
				{
					if (! (ext && /^(doc|docx)$/.test(ext))){ 
						status.text('Only DOC, DOCX files are allowed');
						return false;
					}	
				}
				else if(filetype == 'pdf')
				{
					if (! (ext && /^(pdf)$/.test(ext))){ 
						status.text('Only PDF file is allowed');
						return false;
					}	
				}
				status.text('Uploding.....');
			},
			onComplete: function(file, response){ 
				//alert(response); return false;
				responsedata	=	response.split('_____');
				if(responsedata[0] == "ERROR"){ 
					status.text(responsedata[1]);
					return false;
				}
				status.text('');
				if(responsedata[0] != "UPLODEERROR"){ 
					var responsefilenamename = responsedata[0].replace(/.*(\/|\\)/, '');
					document.getElementById('uploadimage'+imgcount).value = responsedata[0];
					if(filetype == 'image')
					{
						document.getElementById('uploadphoto'+imgcount).innerHTML ='<img src="'+responsedata[0]+'" border="0" width="114" /><a href="javascript:void(0);" onClick="DeleteImage(\''+responsedata[0]+'\',\''+imgcount+'\');"><img src="'+FULLSITEURL+'assets/front/images/cross.png" border="0" alt="" /></a>';
					}
					else if(filetype == 'worddoc')
					{
						document.getElementById('uploadphoto'+imgcount).innerHTML ='<img src="'+FULLSITEURL+'assets/front/images/worddoc.png" border="0" /><a href="javascript:void(0);" onClick="DeleteImage(\''+responsedata[0]+'\',\''+imgcount+'\');"><img src="'+FULLSITEURL+'assets/front/images/cross.png" border="0" alt="" /></a><br>'+responsefilenamename+'';
					}
					else if(filetype == 'pdf')
					{
						document.getElementById('uploadphoto'+imgcount).innerHTML ='<img src="'+FULLSITEURL+'assets/front/images/pdf.png" border="0" /><a href="javascript:void(0);" onClick="DeleteImage(\''+responsedata[0]+'\',\''+imgcount+'\');"><img src="'+FULLSITEURL+'assets/front/images/cross.png" border="0" alt="" /></a><br>'+responsefilenamename+'';
					}
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
              url: FULLSITEURL+'welcome/DeleteImage',
			 data: {imagename:imagename},
              success: function(response) { 
			  	document.getElementById('uploadimage'+imgcount).value = '';
				document.getElementById('uploadphoto'+imgcount).innerHTML ='';
              }
            });
    }
}

