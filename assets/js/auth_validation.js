function validateRegister() {
    let name = document.getElementById("name").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value;
    let role = document.getElementById("role").value;

    if (name === "" || email === "" || password === "" || role === "") {
        alert("All fields are required");
        return false;
    }

    if (password.length < 6) {
        alert("Password must be at least 6 characters");
        return false;
    }

    return true;
}

function validateLogin() {
    let email = document.getElementById("login_email").value.trim();
    let password = document.getElementById("login_password").value;

    if (email === "" || password === "") {
        alert("Email and password are required");
        return false;
    }

    return true;
}
