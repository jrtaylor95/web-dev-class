"use strict";

function checkValidPhoneNumber() {
  let first = document.getElementById("phoneFirstPart").value;
  let second = document.getElementById("phoneSecondPart").value;
  let third = document.getElementById("phoneThirdPart").value;

  return first.length == 3 && second.length == 3 && third.length == 4 &&
      !isNaN(first) && !isNaN(second) && !isNaN(third);
}

function checkNoConditions() {
  let highBP = document.getElementById("highBloodPressure").checked;
  let diabetes = document.getElementById("diabetes").checked;
  let glaucoma = document.getElementById("glaucoma").checked;
  let asthma = document.getElementById("asthma").checked;
  let none = document.getElementById("none").checked;

  return highBP || diabetes || glaucoma || asthma || none;
}

function checkValidConditions() {
  let highBP = document.getElementById("highBloodPressure").checked;
  let diabetes = document.getElementById("diabetes").checked;
  let glaucoma = document.getElementById("glaucoma").checked;
  let asthma = document.getElementById("asthma").checked;
  let none = document.getElementById("none").checked;

  return !(none && (highBP || diabetes || glaucoma || asthma));
}

function checkValidPeriod() {

  return document.getElementById("never").checked ||
      document.getElementById("less").checked ||
      document.getElementById("between").checked ||
      document.getElementById("more").checked;
}

function checkValidStudyID() {
  let first = document.getElementById("firstFourDigits").value;
  let second = document.getElementById("secondFourDigits").value;

  return first.length == 4 && first.charAt(0) === "A" && !isNaN(first.slice(1)) &&
      second.length == 4 && second.charAt(0) === "B" && !isNaN(second.slice(1));
}

function validate() {
  let alertMessage = "";

  if (!checkValidPhoneNumber()) {
    alertMessage += "Invalid phone number\n";
  }

  if (!checkNoConditions()) {
    alertMessage += "No conditions selected\n";
  } else {
    if (!checkValidConditions()) {
      alertMessage += "Invalid conditions selection\n";
    }
  }

  if (!checkValidPeriod()) {
    alertMessage += "No time period selected\n";
  }

  if (!checkValidStudyID()) {
    alertMessage += "Invalid study id\n";
  }

  if (alertMessage !== "") {
    alert(alertMessage);
    return false;
  } else {
    return window.confirm("Do you want to submit the form data?");
  }
}

window.onsubmit = validate;
