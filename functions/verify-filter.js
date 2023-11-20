
$(document).ready(function() {
    

    function onPageLoad() {
        // Clear all textbox inputs
        barangayInput.value = "";
        searchInput.value = "";
        communityInput.value = "";
      
        filterTable();
        filterSpouseTable();
        filterMinorTable();
        filterWorkTable();
        filterSeniorTable();
      }
      
      window.addEventListener("load", onPageLoad);
      

    // Count the number of visible rows in the table and update the label
    function updateHouseholdLabel() {
        var table = document.getElementById("verifTable");
        var rows = table.getElementsByTagName("tr");
        var visibleRowCount = 0;

        for (var i = 0; i < rows.length; i++) {
            if (rows[i].style.display !== "none") {
                visibleRowCount++;
            }
        }

        var labelElement = document.getElementById("householdLabel");
        labelElement.innerText = visibleRowCount;
        labelElement.style.display = visibleRowCount > 0 ? "block" : "none";
    }
    
    // Function to filter table rows based on user input
    function filterTable() {
        var filterBarangay = document.getElementById("barangay-select").value.toUpperCase();
        var filterSearch = document.getElementById("search").value.toUpperCase();
        var filterCommunity = document.getElementById("community-selectSearch").value.toUpperCase(); // New filter input
        
     // Check if all textboxes are empty
    if (filterBarangay === "" && filterSearch === "" && filterCommunity === "") {
        // Hide all table rows for both tables
        var verifTable = document.getElementById("verifTable");
        var verifRows = verifTable.getElementsByTagName("tr");
        for (var i = 0; i < verifRows.length; i++) {
            verifRows[i].style.display = "none";
        }

         // Display no data message for both tables
         var noDataMessage = document.getElementById("no-data-message");
         noDataMessage.style.display = "block"
       

        // Exit the function
        return;
    }


        var table = document.getElementById("verifTable");
        var rows = table.getElementsByTagName("tr");
        var noDataMessage = document.getElementById("no-data-message");

        var hasData = false; // Variable to track if there is matching data

        for (var i = 0; i < rows.length; i++) {
            var row = rows[i];
            var cells = row.getElementsByTagName("td");
            var barangayCell = cells[3]; // 4th column (index 3) contains the barangay column data
            var communityCell = cells[2]; // 5th column (index 4) contains the community column data
            
            var showRow = true;

            // Filter by barangay column
            if (filterBarangay !== "") {
                var barangayText = barangayCell.innerText || barangayCell.textContent;
                barangayText = barangayText.toUpperCase();

                if (barangayText.indexOf(filterBarangay) === -1) {
                    showRow = false;
                }
            }

            // Filter by community column
            if (filterCommunity !== "" && showRow) {
                var communityText = communityCell.innerText || communityCell.textContent;
                communityText = communityText.toUpperCase();

                if (communityText.indexOf(filterCommunity) === -1) {
                    showRow = false;
                }
            }

            // Filter by all columns
            if (filterSearch !== "" && showRow) {
                for (var j = 0; j < cells.length; j++) {
                    var cell = cells[j];
                    var cellText = cell.innerText || cell.textContent;
                    cellText = cellText.toUpperCase();

                    if (cellText.indexOf(filterSearch) !== -1) {
                        showRow = true;
                        break;
                    } else {
                        showRow = false;
                    }
                }
            }

            row.style.display = showRow ? "" : "none";
            if (showRow) {
                hasData = true;
            }
        }

        // Display no data message if there are no matching rows
        if (!hasData) {
            noDataMessage.style.display = "block";
        } else {
            noDataMessage.style.display = "none";
        }
    }
    

    // Get the barangay input element
    var barangayInput = document.getElementById("barangay-select");

    // Attach an event listener to the barangay input for "input" and "keydown" events
    barangayInput.addEventListener("input", function() {
        this.value = this.value.toUpperCase(); // Convert input to uppercase
        filterTable();
        updateHouseholdLabel();
    });

    barangayInput.addEventListener("keydown", function(event) {
        if (event.key === "Tab" || event.key === "Enter") {
            filterTable();
            updateHouseholdLabel();
        }
    });

    var suggestionBox = document.getElementById("suggestionBox");
    suggestionBox.addEventListener("mousedown", function() {
    var selectedSuggestion = document.getElementsByClassName("selected")[0];
    if (selectedSuggestion) {
        var selectedValue = selectedSuggestion.textContent;
        barangayInput.value = selectedValue; // Update barangay input value
        filterTable();
        updateHouseholdLabel();
    }
});

    // Get the search input element
    var searchInput = document.getElementById("search");

    // Attach an event listener to the search input
    searchInput.addEventListener("keyup", function() {
        this.value = this.value.toUpperCase(); // Convert input to uppercase
        filterTable();
        updateHouseholdLabel();
    });

    // Get the community-selectSearch input element
    var communityInput = document.getElementById("community-selectSearch");

    // Attach an event listener to the community-selectSearch input
    communityInput.addEventListener("keyup", function() {
        this.value = this.value.toUpperCase(); // Convert input to uppercase
        filterTable();
        updateHouseholdLabel();
    });
    
    communityInput.addEventListener("keydown", function(event) {
        if (event.key === "Tab" || event.key === "Enter") {
            filterTable();
            updateHouseholdLabel();
        }
    });

    var communitySuggestionBox = document.getElementById("communitysearchSuggestionBox");
    communitySuggestionBox.addEventListener("mousedown", function(){
    var communityselectedSuggestion = document.getElementsByClassName("selected")[1];
    if (communityselectedSuggestion) {
        var communityselectedValue = communityselectedSuggestion.textContent;
        communityInput.value = communityselectedValue;
        filterTable();
        updateHouseholdLabel();
    }
});

// Count the number of visible rows in the table and update the label
function updateSpouseLabel() {
    var table = document.getElementById("spouseTbl");
    var rows = table.getElementsByTagName("tr");
    var visibleRowCount = 0;

    for (var i = 0; i < rows.length; i++) {
        if (rows[i].style.display !== "none") {
            visibleRowCount++;
        }
    }

    var labelElement = document.getElementById("spouseLabel");
    labelElement.innerText = visibleRowCount;
    labelElement.style.display = visibleRowCount > 0 ? "block" : "none";
    
}

function filterSpouseTable() {
    var filterSearch = document.getElementById("search").value.toUpperCase();

    if (filterSearch === "") {
        var spouseTable = document.getElementById("spouseTbl");
        var spouseRows = spouseTable.getElementsByTagName("tr");
        for (var j = 0; j < spouseRows.length; j++) {
            spouseRows[j].style.display = "none";
        }

        // Display no data message for both tables
        var noDataMessage1 = document.getElementById("no-data-message1");
        noDataMessage1.style.display = "block";

        return;
    }

    
    
    var table = document.getElementById("getSpouseData");
    var rows = table.getElementsByTagName("tr");
    var noDataMessage1 = document.getElementById("no-data-message1");

    var filterSearch = document.getElementById("search").value.toUpperCase();

    var hasData = false; // Variable to track if there is matching data

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var cells = row.getElementsByTagName("td");

        var showRow = true;

        // Filter by all columns
        if (filterSearch !== "") {
            for (var j = 0; j < cells.length; j++) {
                var cell = cells[j];
                var cellText = cell.innerText || cell.textContent;
                cellText = cellText.toUpperCase();

                if (cellText.indexOf(filterSearch) !== -1) {
                    showRow = true;
                    break;
                } else {
                    showRow = false;
                }
            }
        }

        row.style.display = showRow ? "" : "none";
        if (showRow) {
            hasData = true;
        }
    }

    // Display no data message if there are no matching rows
    if (!hasData) {
        noDataMessage1.style.display = "block";
    } else {
        noDataMessage1.style.display = "none";
    }
}


// Get the spouse-search input element
var spouseSearchInput = document.getElementById("search");

// Attach an event listener to the spouse-search input for "keyup" event
spouseSearchInput.addEventListener("keyup", function() {
    this.value = this.value.toUpperCase(); // Convert input to uppercase
    filterSpouseTable();
    updateSpouseLabel();
});

// Count the number of visible rows in the table and update the label
function updateMinorLabel() {
    var table = document.getElementById("minorTbl");
    var rows = table.getElementsByTagName("tr");
    var visibleRowCount = 0;

    for (var i = 0; i < rows.length; i++) {
        if (rows[i].style.display !== "none") {
            visibleRowCount++;
        }
    }

    var labelElement = document.getElementById("minorLabel");
    labelElement.innerText = visibleRowCount;
    labelElement.style.display = visibleRowCount > 0 ? "block" : "none";
    
}

function filterMinorTable() {
    var filterSearch = document.getElementById("search").value.toUpperCase();

    if (filterSearch === "") {
        var minorTable = document.getElementById("minorTbl");
        var minorRows = minorTable.getElementsByTagName("tr");
        for (var j = 0; j < minorRows.length; j++) {
            minorRows[j].style.display = "none";
        }

        // Display no data message for both tables
        var noDataMessage2 = document.getElementById("no-data-message2");
        noDataMessage2.style.display = "block";

        return;
    }

    
    
    var table = document.getElementById("getMinorData");
    var rows = table.getElementsByTagName("tr");
    var noDataMessage2 = document.getElementById("no-data-message2");

    var filterSearch = document.getElementById("search").value.toUpperCase();

    var hasData = false; // Variable to track if there is matching data

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var cells = row.getElementsByTagName("td");

        var showRow = true;

        // Filter by all columns
        if (filterSearch !== "") {
            for (var j = 0; j < cells.length; j++) {
                var cell = cells[j];
                var cellText = cell.innerText || cell.textContent;
                cellText = cellText.toUpperCase();

                if (cellText.indexOf(filterSearch) !== -1) {
                    showRow = true;
                    break;
                } else {
                    showRow = false;
                }
            }
        }

        row.style.display = showRow ? "" : "none";
        if (showRow) {
            hasData = true;
        }
    }

    // Display no data message if there are no matching rows
    if (!hasData) {
        noDataMessage2.style.display = "block";
    } else {
        noDataMessage2.style.display = "none";
    }
}



// Get the Minor-search input element
var MinorSearchInput = document.getElementById("search");

// Attach an event listener to the Minor-search input for "keyup" event
MinorSearchInput.addEventListener("keyup", function() {
    this.value = this.value.toUpperCase(); // Convert input to uppercase
    filterMinorTable();
    updateMinorLabel();
});

// Count the number of visible rows in the table and update the label
function updateWorkLabel() {
    var table = document.getElementById("workTbl");
    var rows = table.getElementsByTagName("tr");
    var visibleRowCount = 0;

    for (var i = 0; i < rows.length; i++) {
        if (rows[i].style.display !== "none") {
            visibleRowCount++;
        }
    }

    var labelElement = document.getElementById("workLabel");
    labelElement.innerText = visibleRowCount;
    labelElement.style.display = visibleRowCount > 0 ? "block" : "none";
    
}

function filterWorkTable() {
    var filterSearch = document.getElementById("search").value.toUpperCase();

    if (filterSearch === "") {
        var workTable = document.getElementById("workTbl");
        var workRows = workTable.getElementsByTagName("tr");
        for (var j = 0; j < workRows.length; j++) {
            workRows[j].style.display = "none";
        }

        // Display no data message for both tables
        var noDataMessage3 = document.getElementById("no-data-message3");
        noDataMessage3.style.display = "block";

        return;
    }

    
    
    var table = document.getElementById("getWorkData");
    var rows = table.getElementsByTagName("tr");
    var noDataMessage3 = document.getElementById("no-data-message3");

    var filterSearch = document.getElementById("search").value.toUpperCase();

    var hasData = false; // Variable to track if there is matching data

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var cells = row.getElementsByTagName("td");

        var showRow = true;

        // Filter by all columns
        if (filterSearch !== "") {
            for (var j = 0; j < cells.length; j++) {
                var cell = cells[j];
                var cellText = cell.innerText || cell.textContent;
                cellText = cellText.toUpperCase();

                if (cellText.indexOf(filterSearch) !== -1) {
                    showRow = true;
                    break;
                } else {
                    showRow = false;
                }
            }
        }

        row.style.display = showRow ? "" : "none";
        if (showRow) {
            hasData = true;
        }
    }

    // Display no data message if there are no matching rows
    if (!hasData) {
        noDataMessage3.style.display = "block";
    } else {
        noDataMessage3.style.display = "none";
    }
}


// Get the Workr-search input element
var WorkSearchInput = document.getElementById("search");

// Attach an event listener to the Workr-search input for "keyup" event
WorkSearchInput.addEventListener("keyup", function() {
    this.value = this.value.toUpperCase(); // Convert input to uppercase
    filterWorkTable();
    updateWorkLabel();
});

// Count the number of visible rows in the table and update the label
function updateSeniorLabel() {
    var table = document.getElementById("seniorTbl");
    var rows = table.getElementsByTagName("tr");
    var visibleRowCount = 0;

    for (var i = 0; i < rows.length; i++) {
        if (rows[i].style.display !== "none") {
            visibleRowCount++;
        }
    }

    var labelElement = document.getElementById("seniorLabel");
    labelElement.innerText = visibleRowCount;
    labelElement.style.display = visibleRowCount > 0 ? "block" : "none";
    
}

function filterSeniorTable() {
    
    var filterSearch = document.getElementById("search").value.toUpperCase();

    if (filterSearch === "") {
        var seniorTable = document.getElementById("seniorTbl");
        var seniorRows = seniorTable.getElementsByTagName("tr");
        for (var j = 0; j < seniorRows.length; j++) {
            seniorRows[j].style.display = "none";
        }

        // Display no data message for both tables
        var noDataMessage4 = document.getElementById("no-data-message4");
        noDataMessage4.style.display = "block";

        return;
    }

    
    
    var table = document.getElementById("getSeniorData");
    var rows = table.getElementsByTagName("tr");
    var noDataMessage4 = document.getElementById("no-data-message4");

    var filterSearch = document.getElementById("search").value.toUpperCase();

    var hasData = false; // Variable to track if there is matching data

    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var cells = row.getElementsByTagName("td");

        var showRow = true;

        // Filter by all columns
        if (filterSearch !== "") {
            for (var j = 0; j < cells.length; j++) {
                var cell = cells[j];
                var cellText = cell.innerText || cell.textContent;
                cellText = cellText.toUpperCase();

                if (cellText.indexOf(filterSearch) !== -1) {
                    showRow = true;
                    break;
                } else {
                    showRow = false;
                }
            }
        }

        row.style.display = showRow ? "" : "none";
        if (showRow) {
            hasData = true;
        }
    }

    // Display no data message if there are no matching rows
    if (!hasData) {
        noDataMessage4.style.display = "block";
    } else {
        noDataMessage4.style.display = "none";
    }
}


// Get the Seniorr-search input element
var SeniorSearchInput = document.getElementById("search");

// Attach an event listener to the Seniorr-search input for "keyup" event
SeniorSearchInput.addEventListener("keyup", function() {
    this.value = this.value.toUpperCase(); // Convert input to uppercase
    filterSeniorTable();
    updateSeniorLabel();
});


});
