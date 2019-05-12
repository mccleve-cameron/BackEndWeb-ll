function validate() {
    var phone = document.valid_form.phone.value;
    var expiration = document.valid_form.expiration.value;
        var cardNum = document.valid_form.ccn.value;

    if (expirationValidate() == 0) {
        document.getElementById("expiration").focus();
    }

    else if (phoneValidate() == 0) {
        document.getElementById("phone").focus();
    }
    
    else if (cardValidate() == 0){
        document.getElementById("cardNum").focus();
    }
}

var cartCheck = 0;

function expirationValidate() {
    var expiration = document.valid_form.expiration.value;

    if (!expiration.match(/^\d{2}\/\d{2}$/g)) {
        var str = "&larr; Enter a valid expiration date";
        var result = str.fontcolor("red");
        document.getElementById("expirationError").innerHTML = result;
        return 0;

    } else {
        var str = "&check; Expiration date good!";
        var result = str.fontcolor("green");
        document.getElementById("expirationError").innerHTML = result;
        return 1;
    }
}

function phoneValidate() {
    var phone = document.valid_form.phone.value;

    if (!phone.match(/\d{3}-\d{3}-\d{4}/)) {
        var str = "&larr; Enter a valid phone number";
        var result = str.fontcolor("red");
        document.getElementById("phoneError").innerHTML = result;
        return 0;
    } else {
        var str = "&check; Phone number good!";
        var result = str.fontcolor("green");
        document.getElementById("phoneError").innerHTML = result;
        return 1;
    }
    //document.getElementById("phone").focus();
}

function cardValidate() {
    var cardNum = document.valid_form.ccn.value;

    if (!cardNum.match(/\d{16}/)) {
        var str = "&larr; Enter a valid card number";
        var result = str.fontcolor("red");
        document.getElementById("cardError").innerHTML = result;
        return 0;
    } else {
        var str = "&check; Card number good!";
        var result = str.fontcolor("green");
        document.getElementById("cardError").innerHTML = result;
        return 1;
    }
}


function checkCart() {
    if (document.getElementById("cart").checked) {
        calcTotal(300);
        cartCheck = 1;
    }

    if (!document.getElementById("cart").checked && cartCheck == 1)
        calcTotal(-300);
}

var ponyCheck = 0;

function checkPony() {
    if (document.getElementById("pony").checked) {
        calcTotal(1000);
        ponyCheck = 1;
    }

    if (!document.getElementById("pony").checked && ponyCheck == 1)
        calcTotal(-1000);
}

var infinityCheck = 0;

function checkInfinity() {
    if (document.getElementById("infinity").checked) {
        calcTotal(1000000);
        infinityCheck = 1;
    }

    if (!document.getElementById("infinity").checked && infinityCheck == 1)
        calcTotal(-1000000);
}

var guitarCheck = 0;

function checkGuitar() {
    if (document.getElementById("guitar").checked) {
        calcTotal(150);
        guitarCheck = 1;
    }

    if (!document.getElementById("guitar").checked && guitarCheck == 1)
        calcTotal(-150);
}

var hatCheck = 0;

function checkHat() {
    if (document.getElementById("hat").checked) {
        calcTotal(10.99);
        hatCheck = 1;
    }

    if (!document.getElementById("hat").checked && hatCheck == 1)
        calcTotal(-10.99);
}

var total = 0;

function calcTotal(tp) {
    total += tp;
    var t = document.getElementById("totalPrice").innerHTML = total;
}
