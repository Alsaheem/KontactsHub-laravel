var x = document.getElementById("myForm");
x.addEventListener("focus", myMoveFunction, true);

function myMoveFunction() {
    var elmnt = document.getElementById("starting");
    elmnt.scrollIntoView({behaviour: "smooth"});  
}




