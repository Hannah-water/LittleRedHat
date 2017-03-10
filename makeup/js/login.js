//检查登录信息login.php
function checkLogin() {
	if(checkLoginMsg()){
		
		return true;
	}
	else{
		$(".error-wrap").show();
		return false;
	}
}

//检查注册信息register.php
function checkRegister() {
	if(checkRegisterMsg()){
		return true;
	}
	else{
		$(".error-wrap").show();
		return false;
	}
}

//检查修改密码信息user_newpwd.php
function checkChange() {
	if(checkChangeMsg()){
		return true;
	}
	else{
		$(".error-wrap").show();
		return false;
	}
}

//点击收藏此推荐，获取ID值POST，article.php
$(function(){
	$("p a").click(function(){
		var pid = $(this).attr("rel");
		var puid = $(this).attr("value");

		if(puid=="") {
			alert("请先登录");
		}
		else {
			if($("p a").text()=='[收藏此推荐]') {
				$.ajax({
					type:"POST",
					url:"collection.php",
					data:{pid:pid,puid:puid},
					async:false,
			//cache:false,
			success:function(data) {
				$(this).html(data);
			}

		});

				$("p a").text('[取消收藏]');
			}
			else {
				$.ajax({
					type:"POST",
					url:"del_collect.php",
					data:{pid:pid,puid:puid},
					async:false,
					success:function(data) {
						$(this).html(data);
					}
				});
				$("p a").text('[收藏此推荐]');
			}
		}
		return false;
	});
});

/*
//检查是否表单提交过一次post_edit.php
var checkSubmitFlag = false;
function checkSubmit() {
	if(checkSubmitFlag == true) {
		return false;
	}
	checkSubmitFlag = true;
	return true;
}
*/
var regNull=/^\s*$/; //判断是否为空格
var reg = /^((\w*\d)|(\w*[a-z])|(\w*[A-Z]))$/; //包含字母或数字或下划线
//var reg = /^((\w*\d\w*)|(\w*[a-z]\w*))$/; //包含字母，数字，下划线
//var reg = /^((\w*\d\w*[a-z]\w*)|(\w*[a-z]\w*\d\w*))$/; //必须包括字母和数字

function checkLoginMsg() {
	var uid = $.trim($("#uid").val());
	var upwd = $("#upwd").val();
	var loginCode = $("#loginCode").val();
	if(uid==""){				
		$("#errorMsg").text("请输入用户名");        
		$("#uid").focus();
		return false;
	}
	if(regNull.test(upwd)){
		$("#errorMsg").text("请输入密码");
		$("#upwd").focus();
		return false;
	}
	if(regNull.test(loginCode)){
		$("#errorMsg").text("请输入验证码");
		$("#loginCode").focus();
		return false;
	}
	return true;
}

function checkRegisterMsg() {
	var uid = $.trim($("#uid").val());
	var upwd = $("#upwd").val();
	var re_upwd = $("#re_upwd").val();
	//var email = $("#email").val();
	var loginCode = $("#loginCode").val();
	if(uid==""){				
		$("#errorMsg").text("请输入用户名");        
		$("#uid").focus();
		return false;
	}
	if(!reg.test(uid) || uid.length<3){
		$("#errorMsg").text("请输入正确的用户名");        
		$("#uid").focus();
		return false;
	}
	if(regNull.test(upwd)){
		$("#errorMsg").text("请输入密码");
		$("#upwd").focus();
		return false;
	}
	if(upwd.length<6){
		$("#errorMsg").text("请输入正确的密码");
		$("#upwd").focus();
		return false;
	}
	if(re_upwd==""){
		$("#errorMsg").text("请输入确认密码");
		$("#re_upwd").focus();
		return false;
	}
	if(re_upwd!=upwd){
		$("#errorMsg").text("您两次输入的密码不一致");
		$("#re_upwd").focus();
		return false;
	}
	/*
	if(email==""){
		$("#errorMsg").text("请输入邮箱");
		$("#email").focus();
		return false;
	}*/
	if(regNull.test(loginCode)){
		$("#errorMsg").text("请输入验证码");
		$("#loginCode").focus();
		return false;
	}
	return true;
}

function checkChangeMsg() {
	var oldpwd = $("#oldpwd").val();
	var newpwd = $("#newpwd").val();
	var re_newpwd = $("#re_newpwd").val();
	if(regNull.test(oldpwd)){
		$("#errorMsg").text("请输入旧密码");
		$("#oldpwd").focus();
		return false;
	}
	if(newpwd.length<6){
		$("#errorMsg").text("请输入正确的新密码");
		$("#newpwd").focus();
		return false;
	}
	if(regNull.test(newpwd)){
		$("#errorMsg").text("请输入新密码");
		$("#newpwd").focus();
		return false;
	}
	if(re_newpwd!=newpwd){
		$("#errorMsg").text("您两次输入的密码不一致");
		$("#re_newpwd").focus();
		return false;
	}
	return true;
}