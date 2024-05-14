function validation() {
    const userName = document.getElementById('userName')
    const emailError = document.getElementById('email_error')
    const email_pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
    
    const userPassword = document.getElementById('userPassword')
    const passwordError = document.getElementById('password_error')
    const password_pattern = /^(?=.*\d)(?=.*[a-zA-Z])(?=.*[A-Z]).{8,20}$/;
    if (userName.value === '' || userName.value === null) {
        emailError.innerHTML = "Email is required"
        emailError.style.color = "red"
        return false
    }
    else {
        emailError.innerHTML = ""
    }
    if(!email_pattern.test(userName.value)) {
        emailError.innerHTML = "Email didn't match"
        emailError.style.color = "red"
        return false
    }
    else {
        emailError.innerHTML = ""
    }
    if (userPassword.value === '' || userPassword.value === null) {
        passwordError.innerHTML = "Password is required"
        passwordError.style.color = "red"
        return false
    }
    else {
        passwordError.innerHTML = ""
    }
    if(!password_pattern.test(userPassword.value)) {
        passwordError.innerHTML = "Password didn't match"
        passwordError.style.color = "red"
        return false
    }
    else {
        passwordError.innerHTML = ""
    }
    return true
}