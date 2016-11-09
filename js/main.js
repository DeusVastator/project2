function validation() {
    var firstname = document.forms["wowSurvey"]["firstname"].value;
    var lastName = document.forms["wowSurvey"]["lastname"].value;
    if (firstName == null || firstName == "" || lastName == null || lastName == "") { document.querySelector('.notify').textContent = "You must fill out all required fields.";
    return false;
    }
}