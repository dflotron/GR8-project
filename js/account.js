//This does not affect anything on the backend. it is just to look nice and have the user be "logged in" across pages and refreshes.

let loggedIn = sessionStorage.getItem('loggedIn') ? true : false;;

$("#login-logout").click(() => {

    loggedIn = !loggedIn;
    sessionStorage.setItem('loggedIn', loggedIn);

    let output = loggedIn ? "Logged In" : "Logged Out"
    console.log(`User is now ${output}`)
        // console.log(sessionStorage.getItem('loggedIn'))

    displayLoginBtn(loggedIn);


});

let displayLoginBtn = (state) => {
    if (state) {
        $("#login-logout").text("Log Out")
        $("#login-logout").addClass("btn-outline-danger")
        $("#login-logout").removeClass("btn-outline-success")

        $("#user-greeting").removeClass("d-none")
    } else {
        $("#login-logout").text("Log In")
        $("#login-logout").addClass("btn-outline-success")
        $("#login-logout").removeClass("btn-outline-danger")

        $("#user-greeting").addClass("d-none")
    }
};

$(document).ready(() => {
    loggedIn = sessionStorage.getItem('loggedIn') == "true" ? true : false;
    // console.log(sessionStorage.getItem('loggedIn'))

    let output = loggedIn ? "Logged In" : "Logged Out"
    $("#user-greeting").text(`Hello, User`)

    // console.log(`User is ${output}`)
    displayLoginBtn(loggedIn)
});