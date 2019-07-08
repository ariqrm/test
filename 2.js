function validateEmail(email) {
    var vmail = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    console.log(vmail.test(email));
}
function validatePhone(phone) {
    var vphone = /^\+?([62]{2})\)?[-. ]?([0-9]{8,15})$/;
    console.log(vphone.test(phone));
}
function validateUsername(username) {
    var vusername = /^([a-z_-]){5,9}$/g;
    console.log(vusername.test(username));
}
function validatePassword(password) {
    var vpassword = /^\#(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[#$^+=!*()@%&]).{8,}$/g;
    console.log(vpassword.test(password));
}

validateEmail("ariqrm@gmail.com");
validatePhone("+6282141114118");
validateUsername("ariqrm");
validatePassword("#A1fgfdg@");
