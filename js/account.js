let loggedIn;
let name;

$("#login-logout").click(() => {
    if (!loggedIn) {
        if (!name) {
            name = prompt("Login with Username:", "User")
            sessionStorage.setItem('username', name)
        }
    }

    if (name != "null") {
        $("#user-greeting").text(`Hello, ${name}`)
    } else {
        return;
    }

    sessionStorage.setItem('loggedIn', !loggedIn);

    loggedIn = !loggedIn;

    let output = loggedIn ? "Logged In" : "Logged Out"
    console.log(`${name} is now ${output}`)

    displayLoginBtn(loggedIn);

    // console.log(`${sessionStorage.getItem('username')} is ${output}`)

});

let displayLoginBtn = (state) => {
    if (state) {
        $("#login-logout").text("Log Out")
        $("#user-greeting").removeClass("d-none")
    } else {
        $("#login-logout").text("Log In")
        $("#user-greeting").addClass("d-none")
    }
};

$(document).ready(() => {
    loggedIn = sessionStorage.getItem('loggedIn') ? true : false;
    name = sessionStorage.getItem('username');

    let output = loggedIn ? "Logged In" : "Logged Out"
    if (name == "null") {
        console.log(`${name} is ${output}`)
        $("#user-greeting").text(`Hello, ${name}`)
    } else {
        console.log(`User is ${output}`)
    }
    displayLoginBtn(loggedIn)
});