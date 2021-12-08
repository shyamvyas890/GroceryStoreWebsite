var xhttp= new XMLHttpRequest();

var form= document.getElementById("reviewform");

var my_func= function(event) {
    var payload= {
        firstName: document.getElementById("fname").value,
        lastName: document.getElementById("lname").value,
        email: document.getElementById("email").value,
        subject: document.getElementById("subject").value
    };
    console.log(payload);
    event.preventDefault();
    //alert("I did the thing.");

    xhttp.open("POST", "connect.php", false);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.send(JSON.stringify(payload));
};

form.addEventListener("submit", my_func, true);