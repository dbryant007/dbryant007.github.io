"use strict";
var $ = function(id) {
     return document.getElementById(id);
};

var users = ['annad,prof','dustinb,stud','guest,passwurd'];

var logIn = function() {
    var logInInfo =  $("username").value + "," + $("password").value;
    var validLogIn = false;
    for (var i in users) {
        if (logInInfo === users[i]) {
            validLogIn = true;
        }
    }
    if (validLogIn == true) {
        //open new link
        confirm("Successful login! Click OK to enter the employee portal.");
            
    } else {
        alert("Invalid username and/or password. Please try again.");
        $("username").innerHTML = "";
        $("password").innerHTML = "";
        $("username").focus();
    }
    
   
    
};

var clear = function() {
    $("username").value = "";
    $("password").value = "";
    $("username").focus();
};

window.onload = function() {
    $("login").onclick = logIn;
    $("clear").onclick = clear;
};