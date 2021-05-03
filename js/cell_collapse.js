/*

Original Author: Dustin Bryant
Date Created: 2/21/2020
Version: 1.0
Date Last Modified: 2/21/2020
Modified by: Dustin Bryant
Modification log: First Draft

*/

"use strict";
var $ = function(id) { return document.getElementById(id); };

// the event handler for the click event of each li element
var toggle = function() {
    var tablebody = this.nextElementSibling;
    //console.log(tablebody);
    // toggle table contents visibility by adding or removing a class
    if (tablebody.classList.contains("open")) { //asks "does the tbody classlist have an "open" class in it?"
        tablebody.classList.remove("open"); //if it does...remove "open" from the classlist
        tablebody.classList.add("answer-hide");
    } else {         
        tablebody.classList.remove("answer-hide")
        tablebody.classList.add("open"); //if span doesn't already have an "expand" in the class list...add it
    }
};

window.onload = function() {    
    var heading = $("heading"); //get the number id associated with the "heading" id and assign it to a faqs variable
    var aElements = heading.getElementsByTagName("thead"); //find all thead elements under the "heading" id and assign a number to each
    this.console.log(aElements);
    // attach event handler for each thead tag	    
    for (var i = 0; i < aElements.length; i++ ) {  
        aElements[i].onclick = toggle;
        this.console.log(aElements[i]);
    }
    // set focus on first thead tag
    aElements[0].focus();       
};
