    function goUg(){
    if(document.frm_stud.firstname.value==""){
    alert("Please Enter Firstname");
    document.frm_stud.firstname.focus();
    return false;
    }
    else if(document.frm_stud.lastname.value==""){
    alert("Please Enter lastname");
    document.frm_stud.lastname.focus();
    return false;
    }
    else if(document.frm_stud.dob.value==""){
    alert("Please Enter dob");
    document.frm_stud.dob.focus();
    return false;
    }
    else if(document.frm_stud.gender.value==""){
    alert("Please Enter gender");
    document.frm_stud.gender.focus();
    return false;
    }
    else if(document.frm_stud.qualification.value==""){
    alert("Please Enter qualification");
    document.frm_stud.qualification.focus();
    return false;
    }
    document.frm_stud.action="save_ug.php";

    return true;
    }


    function goPg(){
    if(document.frm_stud.firstname.value==""){
    alert("Please Enter Firstname");
    document.frm_stud.firstname.focus();
    return false;
    }
    else if(document.frm_stud.lastname.value==""){
    alert("Please Enter lastname");
    document.frm_stud.lastname.focus();
    return false;
    }
    else if(document.frm_stud.dob.value==""){
    alert("Please Enter dob");
    document.frm_stud.dob.focus();
    return false;
    }
    else if(document.frm_stud.gender.value==""){
    alert("Please Enter gender");
    document.frm_stud.gender.focus();
    return false;
    }
    else if(document.frm_stud.qualification.value==""){
    alert("Please Enter qualification");
    document.frm_stud.qualification.focus();
    return false;
    }
    document.frm_stud.action="save_pg.php";

    return true;
    }

    function save(){
    document.frm_stud.action="nav_save.php";
    return true;
    }



    function sa(){

    if(document.frm_studs.state.value==""){
    alert("Please Enter states");
    document.frm_studs.states.focus();
    return false;
    }

    // else if(document.frm_studs.acts.value==""){
    // alert("Please Enter acts");
    // document.frm_studs.acts.focus();
    // return false;
    // }

    document.frm_studs.action="mapacts_save.php";

    return true;
    }
	
	function ss(){
		if(document.frm_stud.state.value==""){
			alert("please select state");
			document.frm_stud.state.focus();
			return false;
    	}
	document.frm_stud.action="actform_save.php";
    return true;
    }
	
	function s(){
    if(document.frm_state.states.value==""){
			alert("please select state");
			document.frm_state.states.focus();
			return false;
    	}
	document.frm_state.action="state_process.php";
    return true;
    }		
	
	
	function as(){
    if(document.frm_studdd .user_id.value==""){
	alert("select username");
    document.frm_studdd.user_id.focus();
    return false;
	}
	document.frm_studdd .action="assign_save.php";
	return true;
	}