var reg = /^\+?[1-9][0-9]*$/;	//非零的正整数
//判断内容是否为空
function checkCon() {
	var title = $.trim($("#title").val());
	var mname = $.trim($("#mname").val());
	var capacity = $.trim($("#capacity").val());
	var prize = $.trim($("#prize").val());
	if (title=="") {
		$("#title").focus();
		return false;
	}
	if (mname=="") {
		$("#mname").focus();
		return false;
	}
	if (capacity=="" || !reg.test(capacity)) {
		$("#capacity").focus();
		return false;
	}
	if (prize=="" || !reg.test(prize)) {
		$("#prize").focus();
		return false;
	}
	return true;
}

//检查是否表单提交过一次post_edit.php
var checkSubmitFlag = false;
function checkSubmit() {
	if(checkCon()) {
	if(checkSubmitFlag == true) {
		return false;
	}
	checkSubmitFlag = true;
	return true;
	}
	return false;
}


