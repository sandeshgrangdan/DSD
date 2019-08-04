function formvalidate(){
	var email = document.form.email.value;
	 var fname = document.form.first.value;
	 var lname = document.form.last.value;
    var password = document.form.password.value;
    var con_password = document.form.con_password.value;
    var phone = document.form.phone_no.value;
    var emailpattern = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    var namepattern = /^([a-zA-Z]+)$/;
    var phonepattern = /^([0-9]{9,10})$/;
    if (fname.trim() == '') {
    	 document.form.first.focus();
      swal ( "First Name is empty!" ,  "Please Enter First Name" ,  "error" );
      return false;
    }else if(!namepattern.test(fname)){
        document.form.first.focus();
        swal ( "Not Valid!" ,  "Given Name is not valid" ,  "error" );
        return false;
      }else if (fname.length < 3) {
			document.form.first.focus();
			swal ( "Length Is Not Valid!" ,  "Given First Name must be greater then 3 chahracter" ,  "error" );
		    return false;
		}

  if (lname.trim() == '') {
    	 document.form.last.focus();
      swal ( " Last Name is empty!" ,  "Please Enter Last Name" ,  "error" );
      return false;
    }else if(!namepattern.test(lname)){
        document.form.last.focus();
        swal ( "Not Valid!" ,  "Given Last Name is not valid" ,  "error" );
        return false;
      }else if (lname.length < 3) {
			document.form.last.focus();
			swal ( "Length Is Not Valid!" ,  "Given Last Name must be greater then 3 chahracter" ,  "error" );
		    return false;
		}


    if( email.trim() == '' ){
      document.form.email.focus();
      swal ( "Email is empty!" ,  "Please Enter Email" ,  "error" );
      return false;
    }else{
      if(!emailpattern.test(email)){
        document.form.email.focus();
        swal ( "Not Valid!" ,  "Given email is not valid" ,  "error" );
        return false;
      }
     
    }

    if (password == '') {
    	document.form.password.focus();
      swal ( "Email is empty!" ,  "Please Enter Password" ,  "error" );
      return false;
    }

    if (con_password == '') {
    	document.form.con_password.focus();
      swal ( "Email is empty!" ,  "Please Enter Confirm Password" ,  "error" );
      return false;
    }

    if (password != con_password){
    	document.form.con_password.focus();
      swal ( "Invalid Password!" ,  "Password doesn't match" ,  "error" );
      return false;
    }

    if(document.form.gender.selectedIndex==0){
				document.form.gender.focus();
				 swal ( "Select gender!" ,  "Please select gender" ,  "error" );
				return false;
	}

    if(phone.trim() == ''){
    	document.form.phone_no.focus();
      swal ( "Phone number is empty!" ,  "Please Enter phone number" ,  "error" );
      return false;
    }else if (!phonepattern.test(phone)) {
    	document.form.phone_no.focus();
      swal ( "Invalid Phone number" ,  "Length must be 9 to 10 " ,  "error" );
      return false;
    }

    return true



}

