/*

Original Author: Dustin Bryant
Date Created: 1/22/2020
Version: 2.0
Date Last Modified: 1/22/2020
Modified by: Dustin Bryant
Modification log: First Draft

*/

"use strict";
var $ = function(id) { return document.getElementById(id); };

// the event handler for the click event of each li element
var toggle = function() {
    var li = this;                    // clicked li tag     
    var span = li.childNodes[1];  // li tag's second child tag
    // toggle plus and minus image in h2 elements by adding or removing a class
    if (li.classList.contains("expand")) { //asks "does li have "expand" in the class list?"
        li.classList.remove("expand");	//if it does...remove "expand" from the class list
    } else { 
        li.classList.add("expand"); //if li doesn't already have an "expand" in the class list...add it
    }
    // toggle span visibility by adding or removing a class
    if (span.classList.contains("open")) { //asks "does the span classlist have an "open" class in it?"
        span.classList.remove("open"); //if it does...remove "open" from the classlist
    } else { 
        span.classList.add("open"); //if span doesn't already have an "expand" in the class list...add it
    }
};

window.onload = function() {
    // get the h2 tags
    var faqs = $("faqs"); //get the number id associated with the "faqs" id and assign it to a faqs variable
    var aElements = faqs.getElementsByTagName("li"); //find all a elements under the "faqs" id and assign a number to each
    this.console.log(aElements);
    // attach event handler for each a tag	    
    for (var i = 0; i < aElements.length; i++ ) {  
        aElements[i].onclick = toggle;
        this.console.log(aElements[i]);
    }
    // set focus on first a tag
    aElements[0].focus();       
};
