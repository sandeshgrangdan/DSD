function signinValidation(){

    var email = document.signin.email.value;
    var password = document.signin.password.value;
    var emailpattern = /^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;

    if( email.trim() == '' ){
      document.signin.email.focus();
      swal ( "Email is empty!" ,  "Please Enter Email" ,  "error" );
      return false;
    }else if(!emailpattern.test(email)){
        document.signin.email.focus();
        swal ( "Not Valid!" ,  "Given email is not valid" ,  "error" );
        return false;
    }else if(password == ''){
        document.signin.password.focus();
        swal ( "Passord is empty!" ,  "Please Enter Passord" ,  "error" );
        return false; 
    }else{
      return true
       }


    
}


