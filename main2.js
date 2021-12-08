var xhttp= new XMLHttpRequest();

var form= document.getElementById("orderform");

var my_func= function(event) {
    var payload= {
        name: document.getElementById("na").value,
        address: document.getElementById("ad").value,
        creditcard: document.getElementById("creditcard").value,
        theOrder: document.getElementById("theOrder").value
    };
    console.log(payload);
    event.preventDefault();
    //alert("I did the thing.");

    xhttp.open("POST", "connect2.php", false);
    xhttp.setRequestHeader("Content-Type", "application/json");
    xhttp.send(JSON.stringify(payload));
};

form.addEventListener("submit", my_func, true);