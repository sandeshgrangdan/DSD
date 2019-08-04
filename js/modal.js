function modalvalidate(){
	var name = document.modal.first.value;
	var lname = document.modal.last.value;
	var email = document.modal.email.value;
	 var password = document.modal.password.value;
    var con_password = document.modal.con_password.value;
    var phone = document.modal.phone_no.value;
    var phonepattern = /^([0-9]{9,10})$/;
	 var emailpattern = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
	var npattern = /^([a-zA-Z]+)$/;


	if (name.trim() == '') {
		 document.modal.first.focus();
         swal ( "First Name is empty!" ,  "Please Enter First Name" ,  "error" );
         return false;
	}else if(!npattern.test(name)){
        document.modal.first.focus();
        swal ( "Not Valid!" ,  "Given Name is not valid" ,  "error" );
        return false;
      }else if (name.length < 3) {
			document.modal.first.focus();
			swal ( "Length Is Not Valid!" ,  "Given First Name must be greater then 3 chahracter" ,  "error" );
		    return false;
		}

	if (lname.trim() == '') {
    	 document.modal.last.focus();
      swal ( " Last is empty!" ,  "Please Enter Last Name" ,  "error" );
      return false;
    }else if(!npattern.test(lname)){
        document.modal.last.focus();
        swal ( "Not Valid!" ,  "Given Last Name is not valid" ,  "error" );
        return false;
      }else if (lname.length < 3) {
			document.modal.last.focus();
			swal ( "Length Is Not Valid!" ,  "Given Last Name must be greater then 3 chahracter" ,  "error" );
		    return false;
		}

	 if( email.trim() == '' ){
      document.modal.email.focus();
      swal ( "Email is empty!" ,  "Please Enter Email" ,  "error" );
      return false;
    }else{
      if(!emailpattern.test(email)){
        document.modal.email.focus();
        swal ( "Not Valid!" ,  "Given email is not valid" ,  "error" );
        return false;
      }
     
    }

     if (password == '') {
    	document.modal.password.focus();
      swal ( "Password is empty!" ,  "Please Enter Password" ,  "error" );
      return false;
    }

    if (con_password == '') {
    	document.modal.con_password.focus();
      swal ( "Confirm password is empty!" ,  "Please Enter Confirm Password" ,  "error" );
      return false;
    }

    if (password != con_password){
    	document.modal.con_password.focus();
      swal ( "Invalid Password!" ,  "Password doesn't match" ,  "error" );
      return false;
    }

    if(document.modal.gender.selectedIndex==0){
				document.form.gender.focus();
				 swal ( "Select gender!" ,  "Please select gender" ,  "error" );
				return false;
	}

    if(phone.trim() == ''){
    	document.modal.phone_no.focus();
      swal ( "Phone number is empty!" ,  "Please Enter phone number" ,  "error" );
      return false;
    }else if (!phonepattern.test(phone)) {
    	document.modal.phone_no.focus();
      swal ( "Invalid Phone number" ,  "Length must be 9 to 10 " ,  "error" );
      return false;
    }

    return true
}
