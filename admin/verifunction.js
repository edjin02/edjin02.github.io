// function displayValue() {
//     var barangay = document.getElementById("barangay-select-modal").value;
//     var comAss = document.getElementById("community-select").value;
//     var basicHouse = document.getElementById("basicHouse").value;
//     var tag = document.getElementById("tag").value;

//     var tenurStatus = document.getElementById("tenurStatus").value;
//     var origOwner = document.getElementById("origOwner").value;



//     // display head fields
//     var head_gender = document.getElementById("head_gender").value;
//     var head_birthDate = document.getElementById("head_birthDate").value;
//     var head_civilStatus = document.getElementById("head_civilStatus").value;
//     var head_lastname = document.getElementById("head_lastname").value;
//     var head_givenName = document.getElementById("head_givenName").value;
//     var head_middleName = document.getElementById("head_middleName").value;
//     var head_extension = document.getElementById("head_extension").value;
//     var head_occupation = document.getElementById("head_occupation").value;
//     var head_monthSalary = document.getElementById("head_monthSalary").value;
//     var head_maidenName = document.getElementById("head_maidenName").value;
//     var pagIbigCheckbox = document.getElementById("head_pag-ibigBox");
//     var sssCheckbox = document.getElementById("head_sssBox");
//     var head_other = document.getElementById("head_other").value;

//     var headlogMessage = "ADDRESS " + "\nBarangay: " + barangay + "\nCommunity Association: " + comAss
//         + "\nBasic Housing Info: " + basicHouse + "\nTag: " + tag
//         + "\nHOUSEHOLD HEAD " + "\nTenurial Status: " + tenurStatus + "\nOriginal Owner: " + origOwner
//         + "\nGender: " + head_gender + "\nBirthdate: " + head_birthDate
//         + "\nCivil Status: " + head_civilStatus + "\nLast Name: " + head_lastname
//         + "\nGiven Name: " + head_givenName + "\nMiddle Name: " + head_middleName
//         + "\nExtension: " + head_extension + "\nMaiden Name: " + head_maidenName + "\nOccupation: " + head_occupation
//         + "\nMonthly Salary: " + head_monthSalary + "\nOther: " + head_other;

//     if (pagIbigCheckbox.checked) {
//     headlogMessage += "\nHousehold Head Pag-IBIG/HDMF is checked.";
//     } else {
//     headlogMessage += "\nHousehold Head Pag-IBIG/HDMF is Not checked.";
//     }
//     if (sssCheckbox.checked) {
//         headlogMessage += "\nHousehold Head SSS/GSIS is checked.";
//     } else {
//         headlogMessage += "\nHousehold Head SSS/GSIS is Not checked.";
//     }


//     // display spouse fields
//     var spouse_gender = document.getElementById("spouse_gender").value;
//     var spouse_birthDate = document.getElementById("spouse_birthDate").value;
//     var spouse_civilStatus = document.getElementById("spouse_civilStatus").value;
//     var spouse_lastname = document.getElementById("spouse_lastname").value;
//     var spouse_givenName = document.getElementById("spouse_givenName").value;
//     var spouse_middleName = document.getElementById("spouse_middleName").value;
//     var spouse_extension = document.getElementById("spouse_extension").value;
//     var spouse_maidenName = document.getElementById("spouse_maidenName").value;
//     var spouse_occupation = document.getElementById("spouse_occupation").value;
//     var spouse_monthSalary = document.getElementById("spouse_monthSalary").value;
//     var spouse_pagibigBox = document.getElementById("spouse_pag-ibigBox");
//     var spouse_sssBox = document.getElementById("spouse_sssBox");
//     var spouse_other = document.getElementById("spouse_other").value;

//     var spouselogMessage = "SPOUSE " + "\nGender: " + spouse_gender + "\nBirthdate: " + spouse_birthDate
//         + "\nCivil Status: " + spouse_civilStatus + "\nLast Name: " + spouse_lastname
//         + "\nGiven Name: " + spouse_givenName + "\nMiddle Name: " + spouse_middleName
//         + "\nExtension: " + spouse_extension + "\nMaiden Name: " + spouse_maidenName + "\nOccupation: " + spouse_occupation
//         + "\nMonthly Salary: " + spouse_monthSalary + "\nOther: " + spouse_other;



//     if (spouse_pagibigBox.checked) {
//         spouselogMessage += "\nSpouse Pag-IBIG/HDMF is checked.";
//     } else {
//         spouselogMessage += "\nSpouse Pag-IBIG/HDMF is Not checked.";

//     }
//     if (spouse_sssBox.checked) {
//         spouselogMessage += "\nSpouse SSS/GSIS is checked.";
//     } else {
//         spouselogMessage += "\nSpouse SSS/GSIS is Not checked.";
//     }

//     //total number of children
//     var totalChildren = parseInt(document.getElementById("total_children_label").value);
//     var childtotallogMessage = "Total Number of Children: " + totalChildren;


//     // display the minor children in log
//     var numChildren = parseInt(document.getElementById("num_children").value);
//     var minorlogMessage = "Number of Children Living with Parents: " + numChildren;

//     for (var i = 1; i <= numChildren; i++) {
//         var child_gender = document.getElementById(`Mchild_gender_${i}`).value;
//         var child_lastName = document.getElementById(`Mchild_lastName_${i}`).value;
//         var child_givenName = document.getElementById(`Mchild_givenName_${i}`).value;
//         var child_middleName = document.getElementById(`Mchild_middleName_${i}`).value;
//         var child_maidenName = document.getElementById(`Mchild_maidenName_${i}`).value;
//         var child_Extension = document.getElementById(`Mchild_extension_${i}`).value;
//         var child_birthDate = document.getElementById(`Mchild_birthDate_${i}`).value;

//         minorlogMessage += "\nChild " + i + " - Gender: " + child_gender + " Last Name: " + child_lastName +
//             " Given Name: " + child_givenName + " Middle Name: " + child_middleName +
//             " Maiden Name: " + child_maidenName + " Extension: " + child_Extension + " Birthdate: " + child_birthDate;
//     }

//     // display working children in log
//     var numWorkChildren = parseInt(document.getElementById("num_workChildren").value);
//     var workinglogMessage = "Number of Working Children:  \n" + numWorkChildren;

//     for (var i = 0; i < numWorkChildren; i++) {
//         var Wchild_gender = document.getElementById(`Wchild_gender_${i}`).value;
//         var Wchild_birthDate = document.getElementById(`Wchild_birthDate_${i}`).value;
//         var Wchild_civilStatus = document.getElementById(`Wchild_civilStatus_${i}`).value;
//         var Wchild_lastname = document.getElementById(`Wchild_lastname_${i}`).value;
//         var Wchild_givenName = document.getElementById(`Wchild_givenName_${i}`).value;
//         var Wchild_middleName = document.getElementById(`Wchild_middleName_${i}`).value;
//         var Wchild_maidenName = document.getElementById(`Wchild_maidenName_${i}`).value;
//         var Wchild_occupation = document.getElementById(`Wchild_occupation_${i}`).value;
//         var Wchild_pagIbigCheckbox = document.getElementById(`Wchild_pag-ibigBox_${i}`);
//         var Wchild_sssCheckbox = document.getElementById(`Wchild_sssBox_${i}`);
//         var Wchild_other = document.getElementById(`Wchild_other_${i}`).value;
//         var Wchild_monthSalary = document.getElementById(`Wchild_monthSalary_${i}`).value;

//         workinglogMessage += "\nChild " + (i + 1) + " - Gender: " + Wchild_gender + " Birthdate: " + Wchild_birthDate +
//             " Civil Status: " + Wchild_civilStatus + " Last Name: " + Wchild_lastname +
//             " Given Name: " + Wchild_givenName + " Middle Name: " + Wchild_middleName +
//             " Maiden Name: " + Wchild_maidenName + " Occupation: " + Wchild_occupation +
//             " Monthly Salary: " + Wchild_monthSalary + " Other: " + Wchild_other;

//         if (Wchild_pagIbigCheckbox.checked) {
//             workinglogMessage += " Pag-IBIG/HDMF: Checked";
//         } else {
//             workinglogMessage += " Pag-IBIG/HDMF: Not Checked";
//         }

//         if (Wchild_sssCheckbox.checked) {
//             workinglogMessage += " SSS/GSIS: Checked";
//         } else {
//             workinglogMessage += " SSS/GSIS: Not Checked";
//         }

//         // Display the monthly salary in the console
//         // console.log(`Wchild_monthSalary_${i}: ${monthlySalary}`);
//     }

//     // display total monthly in logs
//     var totalMonthly =parseInt(document.getElementById('totalMonthly').value)
//     var monthlyTotallogMessage = "\nTotal Monthly Salary: " + totalMonthly;


//     // display Senior/PWD in log
//     var numSenior = parseInt(document.getElementById('num_senior').value);
//     let SplogMessage = "Total Number of Senior Citizen and PWD: " + numSenior;

//     for (let i = 1; i <= numSenior; i++) {
//         var gender = document.getElementById(`gender_${i}`).value;
//         var birthDate = document.getElementById(`birthDate_${i}`).value;
//         var seniorBox = document.getElementById(`seniorBox_${i}`).checked;
//         var pwdBox = document.getElementById(`pwdBox_${i}`).checked;
//         var SP_lastName = document.getElementById(`SP_lastname_${i}`).value;
//         var SP_givenName = document.getElementById(`SP_givenName_${i}`).value;
//         var SP_middleName = document.getElementById(`SP_middleName_${i}`).value;
//         var SP_maidenName = document.getElementById(`SP_maidenName_${i}`).value;

//         SplogMessage += `\nSenior ${i}: - Gender: ${gender} Birthdate: ${birthDate} Senior Citizen: ${seniorBox ? "Checked" : "Not Checked"} PWD: ${pwdBox ? "Checked" : "Not Checked"} Last Name: ${SP_lastName} Given Name: ${SP_givenName} Middle Name: ${SP_middleName} Maiden Name: ${SP_maidenName}\n\n`;
//     }

//     //display year of stay and length of stay

//     var yearStay = document.getElementById("yearStay").value;
//     var yearLength = parseInt(document.getElementById("yearLength").value)
//     var yearlogMessage = "Year of Stay: " + yearStay +
//                         "\tLength of Stay: " + yearLength;

//     //display facilities field
//     var electricity =document.getElementById('electricity').value;
//     var water_serv =document.getElementById('water_serv').value;
//     var toilet =document.getElementById('toilet').value;
//     var kitchen =document.getElementById('kitchen').value;
//     var facillogMessage =  "FACILITIES" + "\nElectricity: " +electricity+ "\nWater Service: "
//                         +water_serv+ "\nToilet: " +toilet+ "\nKitchen: " +kitchen;

//     //respondent display fields in logs
//     var respondent_gender = document.getElementById('respondent_gender').value;
//     var respondent_relation = document.getElementById('respondent_relation').value;
//     var respondent_lastname = document.getElementById('respondent_lastname').value;
//     var respondent_givenName = document.getElementById('respondent_givenName').value;
//     var respondent_middleName = document.getElementById('respondent_middleName').value;
//     var respondent_maidenName = document.getElementById('respondent_maidenName').value;
//     var respondlogMessage = "RESPONDENT(TUMUGON)" + "\nGender: " + respondent_gender
//     + "\nRelationship to Household Head: " + respondent_relation + "\nLast Name: " +
//     respondent_lastname + "\nGiver Name: " + respondent_givenName + "\nMiddle Name: "
//     + respondent_middleName + "\nMaiden Name: " +  respondent_maidenName;

//     //structure type and remark field 
//     var type_structure = document.getElementById('type_structure').value;
//     var remark = document.getElementById('remark').value;
//     var typeremarklogMessage = "Type of Structure: " + type_structure +
//     "\nRemarks: " + remark;

//     //Interviewer display fields in logs
//     var interviewer_gender = document.getElementById('interviewer_gender').value;
//     var interviewer_lastName = document.getElementById('interviewer_lastName').value;
//     var interviewer_givenName = document.getElementById('interviewer_givenName').value;
//     var interviewer_middleName = document.getElementById('interviewer_middleName').value;
//     var interviewer_maidenName = document.getElementById('interviewer_maidenName').value;
//     var interlogMessage = "INTERVIEWER(NAKIPAGPANAYAM)" + "\nGender: " + interviewer_gender
//     + "\nLast Name: " + interviewer_lastName + "\nGiver Name: " + interviewer_givenName +
//     "\nMiddle Name: " + interviewer_middleName + "\nMaiden Name: " + interviewer_maidenName;

//     console.log(headlogMessage); //display household head in log
//     console.log(spouselogMessage); //display spouse in log
//     console.log(childtotallogMessage); //display total children in log
//     console.log(minorlogMessage); //display minor in log
//     console.log(workinglogMessage); //display working children in log
//     console.log(monthlyTotallogMessage + ".00 PHP"); //display total monthly in log
//     console.log(SplogMessage); //display senior and pwd fields in log
//     console.log(yearlogMessage); //display year of stay and length in log
//     console.log(facillogMessage); //display facilities in log

//     // display selected radio button
//     var selectedOption = document.querySelector('input[name="relocationChoice"]:checked');
//     if (selectedOption) {
//         console.log("In case Relocation is unavailable, what will you choose?:" + "\nSelected Option:", selectedOption.value);
//     } else {
//         console.log("In case Relocation is unavailable, what will you choose?:" + "\nNo option selected.");
//     }

//     console.log(respondlogMessage); //display respondent fields in log
//     console.log(interlogMessage); //display interviewer fields in log
//     console.log(typeremarklogMessage); //display type of structure and remarks

// }


// // Attach change event listener to the radio buttons
// var radioButtons = document.querySelectorAll('input[name="relocationChoice"]');
// radioButtons.forEach(function (radio) {
//     radio.addEventListener('change', logSelectedOption);
// });



function updateTotalMonthly() {
    var numWorkChildren = parseInt(document.getElementById("num_workChildren").value);
    var totalSalary = 0;

    var headMonthlySalary = parseFloat(document.getElementById("head_monthSalary").value);
    if (!isNaN(headMonthlySalary)) {
        totalSalary += headMonthlySalary;
    }

    var spouseMonthlySalary = parseFloat(document.getElementById("spouse_monthSalary").value);
    if (!isNaN(spouseMonthlySalary)) {
        totalSalary += spouseMonthlySalary;
    }

    for (var i = 0; i < numWorkChildren; i++) {
        var Wchild_monthSalary = parseFloat(document.getElementById(`Wchild_monthSalary_${i}`).value);
        if (!isNaN(Wchild_monthSalary)) {
            totalSalary += Wchild_monthSalary;
        }
    }

    document.getElementById("totalMonthly").value = totalSalary.toFixed(2);
}


function generateSeniorFields() {
    const numSenior = parseInt(document.getElementById('num_senior').value);
    const container = document.getElementById('senior_fields_container');
    container.innerHTML = ''; // Clear existing fields

    for (let i = 1; i <= numSenior; i++) {
        const seniorField = `
            <div class="row">
            <div class="col-md-12">
                <div class="card" style="border: 1px solid maroon;">
                </div>
            </div>
            <div class="col-md-3 mb-3">
            <label for="SP_gender_${i}">Gender:</label>
            <div class="input-group">
                <select class="input-border form-control" name="SP_gender_${i}" id="SP_gender_${i}" onchange="handleSeniorGenderChange(${i})">
                    <option value="MALE">MALE</option>
                    <option value="FEMALE">FEMALE</option>
                </select>
            </div>
            </div>
                <div class="col-md-3 mb-3">
                    <label for="birthDate_${i}">Birthdate:</label>
                    <div class="input-group">
                        <input type="date" class="input-border form-control" name="birthDate_${i}" id="birthDate_${i}" placeholder="BirthDate" >
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="checkbox" value="checked" name="seniorBox_${i}" id="seniorBox_${i}" onkeyup="convertToUppercase(this)">
                    <label for="seniorBox_${i}" style="margin-top:6px;">Senior Citizen</label>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="checkbox" value="checked" name="pwdBox_${i}" id="pwdBox_${i}" onkeyup="convertToUppercase(this)">
                    <label for="pwdBox_${i}" style="margin-top:6px;">PWD</label>
                </div>
                <div class="col-md-3 mb-3">
                <label for="SP_lastName_${i}">LastName:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="SP_lastName_${i}" id="SP_lastname_${i}"
                    placeholder="Last Name" onkeyup="convertToUppercase(this)">
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="SP_givenName_${i}">Given Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="SP_givenName_${i}" id="SP_givenName_${i}"
                    placeholder="Given Name" onkeyup="convertToUppercase(this)">
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="SP_middleName_${i}">Middle Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="SP_middleName_${i}" id="SP_middleName_${i}"
                    placeholder="Middle Name" onkeyup="convertToUppercase(this)">
                </div>
                </div>
                <div class="col-md-3 mb-3" id="seniorMaidenNameCont_${i}">
                <label for="SP_maidenName_${i}">Maiden Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="SP_maidenName_${i}" id="SP_maidenName_${i}" placeholder="Maiden Name" onkeyup="convertToUppercase(this)">
                </div>
                </div>
                <div class="col-md-3 mb-3" id="seniorExtensionCont_${i}">
                    <label for="SP_extension_${i}">Extension:</label>
                    <div class="input-group">
                        <input type="text" class="input-border form-control" name="SP_extension_${i}" id="SP_extension_${i}" placeholder="Extension" onkeyup="convertToUppercase(this)">
                    </div>
                </div>
                
            </div>
        `;
        container.innerHTML += seniorField;
        handleSeniorGenderChange(i);
    }
}

function generateWorkChildFields() {
    var numWorkChildren = parseInt(document.getElementById("num_workChildren").value);
    if (isNaN(numWorkChildren) || numWorkChildren < 0) {
        numWorkChildren = 0;
        document.getElementById("num_workChildren").value = numWorkChildren;
    } else if (numWorkChildren > 50) {
        numWorkChildren = 50;
        document.getElementById("num_workChildren").value = numWorkChildren;
    }
    var container = document.getElementById("work_child_fields_container");
    container.innerHTML = "";

    var totalSalary = 0; // Variable to store the total salary

    for (var i = 0; i < numWorkChildren; i++) {
        var childField = `
        <div class = "row">
            <div class="col-md-12">
                <div class="card" style="border: 1px solid maroon;">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="Wchild_gender_${i}">Gender:</label>
                <div class="input-group">
                    <select class="input-border form-control" name="Wchild_gender_${i}" id="Wchild_gender_${i}" onchange="handleWorkGenderChange(${i})">
                        <option value="MALE">MALE</option>
                        <option value="FEMALE">FEMALE</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <label for="Wchild_birthDate_${i}">Birthdate:</label>
                <div class="input-group">
                    <input type="date" class="input-border form-control" name="Wchild_birthDate_${i}" id="Wchild_birthDate_${i}" placeholder="Birthdate">
                </div>
            </div>
            <div class="col-md-4 mb-3">
            <label for="Wchild_civilStatus_${i}">Civil Status:</label>
            <div class="input-group">
                <input type="text" class="input-border form-control" name="Wchild_civilStatus_${i}" id="Wchild_civilStatus_${i}" placeholder="Civil Status" onfocus="showAllSuggestionsWchildCivilStatusModal(${i})" oninput="showSuggestionsWchildCivilStatusModal(this.value, ${i})" onkeydown="handleKeyWchildCivilStatusModal(event)" onblur="changePlaceholderWchildCivilStatusModal(${i})" onkeyup="convertToUppercase(this)">
                <div id="suggestionBoxWchildCivilStatusModal_${i}" style="position: absolute; top: 100%; left: 0; width: 100%; max-height: 200px; overflow-y: auto; display: none; z-index: 9999; background-color: #fff; border: 1px solid #ccc; border-top: none; border-radius: 4px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);"></div>
            </div>
            </div>



            <div class="col-md-3 mb-3">
                <label for="Wchild_lastName_${i}">LastName:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Wchild_lastName_${i}" id="Wchild_lastname_${i}" placeholder="Last Name" onkeyup="convertToUppercase(this)">
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="Wchild_givenName_${i}">Given Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Wchild_givenName_${i}" id="Wchild_givenName_${i}" placeholder="Given Name" onkeyup="convertToUppercase(this)">
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <label for="Wchild_middleName_${i}">Middle Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Wchild_middleName_${i}" id="Wchild_middleName_${i}" placeholder="Middle Name" onkeyup="convertToUppercase(this)">
                </div>
            </div>
            <div class="col-md-3 mb-3" id="workMaidenNameCont_${i}">
                <label for="Wchild_maidenName_${i}">Maiden Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Wchild_maidenName_${i}" id="Wchild_maidenName_${i}" placeholder="Maiden Name" onkeyup="convertToUppercase(this)">
                </div>
            </div>
            <div class="col-md-3 mb-3" id="workExtensionCont_${i}">
                <label for="Wchild_extension_${i}">Extension:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Wchild_extension_${i}" id="Wchild_extension_${i}" placeholder="Extension" onkeyup="convertToUppercase(this)">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="Wchild_occupation_${i}">Occupation:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Wchild_occupation_${i}" id="Wchild_occupation_${i}" placeholder="Occupation" onkeyup="convertToUppercase(this)">
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="Wchild_monthSalary_${i}">Monthly Salary:</label>
                <div class="input-group">
                    <input type="number" class="input-border form-control" name="Wchild_monthSalary_${i}" id="Wchild_monthSalary_${i}" placeholder="Monthly Salary" oninput="updateTotalMonthly()">
                </div>
            </div>
            <div class="col-md-11" style="margin-left:20px;">
                <label>Membership in (Kasapi ng):</label>
            </div>
            <div class="col-md-1 mb-3"></div>
            <div class="col-md-2 mb-3">
                <input type="checkbox" value="checked" name="Wchild_pag-ibigBox_${i}" id="Wchild_pag-ibigBox_${i}">
                <label for="Wchild_pag-ibigBox_${i}" style="margin-top:6px;">Pag-IBIG/HDMF</label>
            </div>
            <div class="col-md-2 mb-3">
                <input type="checkbox" value="checked" name="Wchild_sssBox_${i}" id="Wchild_sssBox_${i}">
                <label for="Wchild_sssBox_${i}" style="margin-top:6px;">SSS/GSIS</label>
            </div>
            <div class="col-md-4 mb-2">
                <div class="Wother-textbox-container">
                    <input type="text" class="input-border form-control" name="Wchild_other_${i}" id="Wchild_other_${i}" placeholder="Other(Optional)" onkeyup="convertToUppercase(this)">
                </div>
            </div>
            </div>
        `;
        container.innerHTML += childField;
        handleWorkGenderChange(i);
    }
    var numWorkChildren = parseInt(document.getElementById('num_workChildren').value);
    var num_children = parseInt(document.getElementById('num_children').value);

    var sum = numWorkChildren + num_children;
    document.getElementById("total_children_label").value = sum.toString();
}

// <!-- Field generate depends on the user input in the textbox of children number  -->

function generateChildFields() {
    var numChildren = parseInt(document.getElementById("num_children").value);
    if (isNaN(numChildren) || numChildren < 0) {
        numChildren = 0;
        document.getElementById("num_children").value = numChildren;
    } else if (numChildren > 50) {
        numChildren = 50;
        document.getElementById("num_children").value = numChildren;
    }

    var container = document.getElementById("child_fields_container");
    container.innerHTML = "";

    for (var i = 1; i <= numChildren; i++) {
        var childRow = document.createElement("div");
        childRow.className = "row";

        var childFieldset = document.createElement("fieldset");
        childFieldset.className = "col-md-12 mb-3";
        childFieldset.innerHTML = `
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="border: 1px solid maroon;">
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="Mchild_gender_${i}">Gender:</label>
                <div class="input-group">
                    <select class="input-border form-control" name="Mchild_gender_${i}" id="Mchild_gender_${i}">
                        <option value="MALE">MALE</option>
                        <option value="FEMALE">FEMALE</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="Mchild_lastName_${i}">Last Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Mchild_lastName_${i}" id="Mchild_lastName_${i}"
                        placeholder="Last Name" onkeyup="convertToUppercase(this)">
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="Mchild_givenName_${i}">Given Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Mchild_givenName_${i}" id="Mchild_givenName_${i}"
                        placeholder="Given Name" onkeyup="convertToUppercase(this)">
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="Mchild_middleName_${i}">Middle Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Mchild_middleName_${i}" id="Mchild_middleName_${i}"
                        placeholder="Middle Name" onkeyup="convertToUppercase(this)">
                </div>
            </div>
            <div class="col-md-2 mb-3" id="minorExtensionCont_${i}">
                <label for="Mchild_extension_${i}">Extension:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="Mchild_extension_${i}" id="Mchild_extension_${i}" placeholder="Extension" onkeyup="convertToUppercase(this)">
                </div>
            </div>
            <div class="col-md-2 mb-3">
                <label for="Mchild_birthDate_${i}">Birthdate:</label>
                <div class="input-group">
                    <input type="date" class="input-border form-control" name="Mchild_birthDate_${i}" id="Mchild_birthDate_${i}"
                        placeholder="Birthdate">
                </div>
            </div>
        </div>
    `;

        childRow.appendChild(childFieldset);
        container.appendChild(childRow);
    }
    var numWorkChildren = parseInt(document.getElementById('num_workChildren').value);
    var num_children = parseInt(document.getElementById('num_children').value);

    var sum = numWorkChildren + num_children;
    document.getElementById("total_children_label").value = sum.toString();

}


function handleWorkGenderChange(i) {
    //working child gender select filter
    var workGenderSelect = document.getElementById(`Wchild_gender_${i}`);
    var workGenderValue = workGenderSelect.value;

    var workMaidenNameCont = document.getElementById(`workMaidenNameCont_${i}`);
    var workExtensionCont = document.getElementById(`workExtensionCont_${i}`);

    if (workGenderValue === "FEMALE") {
        workMaidenNameCont.style.display = "block";
        workExtensionCont.style.display = "none";
    } else if (workGenderValue === "MALE") {
        workMaidenNameCont.style.display = "none";
        workExtensionCont.style.display = "block";
    }
}

function handleSeniorGenderChange(i) {
    var seniorGenderSelect = document.getElementById(`SP_gender_${i}`);
    var seniorGenderValue = seniorGenderSelect.value;

    var seniorMaidenNameCont = document.getElementById(`seniorMaidenNameCont_${i}`);
    var seniorExtensionCont = document.getElementById(`seniorExtensionCont_${i}`);

    if (seniorGenderValue === "FEMALE") {
        seniorMaidenNameCont.style.display = "block";
        seniorExtensionCont.style.display = "none";
    } else if (seniorGenderValue === "MALE") {
        seniorExtensionCont.style.display = "block";
        seniorMaidenNameCont.style.display = "none";
    }
}


