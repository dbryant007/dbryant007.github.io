"use strict";
var $ = function(id) { 
    return document.getElementById(id); 
};

var submitEmail = function() {   
    var email = $("email_address").value;
    console.log(email);
    if (email == "") {
        alert("Please enter your email address.");          
        $("email_address").focus();
    } else {
        alert("We've added you to the list. Thank you!")
    }
};
window.onload = function() {
    $("submit").onclick = submitEmail;
};