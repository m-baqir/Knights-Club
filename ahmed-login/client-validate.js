let submit = document.querySelector(".submitBtn");

submit.onclick = function validateForm(){
    let first = document.querySelector("#first").value;
    let last = document.querySelector("#last").value;
    let email = document.querySelector("#email").value;
    let age = document.querySelector("#age").value;
    let username = document.querySelector("#username").value;
    let password = document.querySelector("#password").value;
    
    let error = document.querySelector("#error-msg");
    
    if(first == null || first == ""){
        error.innerHTML = "Please enter a valid first name";
        return false;

    } else if (last == null || last == ""){
        error.innerHTML = "Please enter a valid last name";
        return false;

    } else if (email == null || email == ""){
        error.innerHTML = "Please enter a valid email";
        return false;

    } else if (age == null || email == ""){
        error.innerHTML = "Please enter a valid email";
        return false;

    } else if (age < 13){
        error.innerHTML = "Users must be 13 years old and above";
        return false;

    } else if (username == null || username == ""){
        error.innerHTML = "Please enter a valid username";
        return false;

    } else if (password == null || password == ""){
        error.innerHTML = "Please enter a valid password";
        return false;

    } else if (password.length >= 8){
        error.innerHTML = "Please password with at least 8 characters";
        return false;

    } else {
        return true;
    }
}

