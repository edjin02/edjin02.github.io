//original copy
// barangay filter droplist
const suggestions = 
['APLAYA', 
'BALIBAGO', 
'CAINGIN', 
'DILA', 
'DITA', 
'IBABA', 
'LABAS', 
'MACABLING', 
'MALITLIT', 
'MARKET AREA', 
'POOC', 
'PULONG_SANTA_CRUZ', 
'SINALHAN', 
'SANTO_DOMINGO', 
'TAGAPO'];
let selectedIndex = -1;
let suggestionBoxVisible = false;

function showAllSuggestions() {
  showSuggestions('');
}

function showSuggestions(input) {
  const suggestionBox = document.getElementById('suggestionBox');
  suggestionBox.innerHTML = '';

  if (input.length === 0) {
    suggestionBox.style.display = 'block'; // Show suggestion box
    suggestionBoxVisible = true;
    suggestions.forEach((suggestion, index) => {
      const suggestionElement = createSuggestionElement(suggestion, index);
      suggestionBox.appendChild(suggestionElement);
    });

    // Set the first suggestion as placeholder
    if (suggestions.length > 0) {
      document.getElementById('barangay-select').placeholder = suggestions[0];
    }
  } else {
    const filteredSuggestions = suggestions.filter(suggestion =>
      suggestion.toLowerCase().startsWith(input.toLowerCase())
    );

    if (filteredSuggestions.length === 0) {
      suggestionBox.style.display = 'none';
      suggestionBoxVisible = false;
    } else {
      suggestionBox.style.display = 'block';
      suggestionBoxVisible = true;
      filteredSuggestions.forEach((suggestion, index) => {
        const suggestionElement = createSuggestionElement(suggestion, index);
        suggestionBox.appendChild(suggestionElement);
      });

      // Set the first filtered suggestion as placeholder
      if (filteredSuggestions.length > 0) {
        document.getElementById('barangay-select').placeholder = filteredSuggestions[0];
      }
    }
  }

  // Always hover over the first suggestion
  selectedIndex = 0;
  toggleSelectedSuggestion();
}

function createSuggestionElement(suggestion, index) {
  const suggestionElement = document.createElement('div');
  suggestionElement.className = 'suggestion';
  suggestionElement.textContent = suggestion;
  suggestionElement.addEventListener('mousedown', () => {
    const textbox = document.getElementById('barangay-select');
    const currentValue = textbox.value;
    textbox.value = suggestion;
    const suggestionBox = document.getElementById('suggestionBox');
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;

    // Blur the textbox only if the value changed
    if (currentValue !== suggestion) {
      textbox.blur();
    }
  });
  suggestionElement.addEventListener('mouseover', () => {
    selectedIndex = index;
    toggleSelectedSuggestion();
  });
  return suggestionElement;
}


function toggleSelectedSuggestion() {
  const suggestionBox = document.getElementById('suggestionBox');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  Array.from(suggestionElements).forEach((suggestionElement, index) => {
    suggestionElement.classList.toggle('selected', index === selectedIndex);
  });

  // Update the placeholder with the selected suggestion
  const selectedSuggestion = suggestionElements[selectedIndex];
  if (selectedSuggestion) {
    document.getElementById('barangay-select').placeholder = selectedSuggestion.textContent;
  }
}

function handleKeyDown(event) {
  const suggestionBox = document.getElementById('suggestionBox');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  const selectedSuggestion = suggestionElements[selectedIndex];
  
  if (event.key === 'ArrowDown') {
    event.preventDefault();
    selectedIndex = Math.min(selectedIndex + 1, suggestionElements.length - 1);
  } else if (event.key === 'ArrowUp') {
    event.preventDefault();
    selectedIndex = Math.max(selectedIndex - 1, -1);
  } else if (event.key === 'Tab') {
    if (selectedIndex >= 0 && selectedSuggestion) {
      event.preventDefault();
      document.getElementById('barangay-select').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;
    selectedIndex = -1;
    return;
  } else if (event.key === 'Enter' && selectedIndex >= 0) {
    event.preventDefault();
    if (selectedSuggestion) {
      document.getElementById('barangay-select').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;
    selectedIndex = -1;
    return;
  }

  toggleSelectedSuggestion();
}


function changePlaceholder() {
  const suggestionBox = document.getElementById('suggestionBox');
  suggestionBox.style.display = "none";
  document.getElementById('barangay-select').placeholder = 'Barangay';
}

// Functions for the community textbox

function showAllSuggestionsCommunity() {
  showfilterCommunitySuggestions('');
}

function showfilterCommunitySuggestions(input) {
  const suggestionBox = document.getElementById('communitysearchSuggestionBox');
  suggestionBox.innerHTML = '';

  const suggestions = [
    'APLAYA TABING ILOG', 'LUPANG ITIM',
    'BAGONG UMAGA HOA', 'DOCE PARES', 'IN UNITY WE STAND', 'KASIKAP', 'SAMAHANG CHICOHAN', 'PATIONG BATO', 'GARCIA`S AND PEDROSO COMPOUND',
    'DAANG NIA CAINGIN', 'ORMOC', 'PULONG BUKID', 'TAGUMPAY AT PAG-ASA', 'SAMAHANG MARALITA P-4',
    'BUROL PUBLIC CEMETERY',
    'NAGKAKAISANG MARALITA NG CONSOLE', 'SAMAHANG ACACIA', 'BALAGBAG', 'KAPATIRANG SAMAHANG KAPUSPALAD', 'HAPPYLABD HOA(FORMERLY BUROK BUROK)', 'TABING-ILOG, TABING-BUKID', 'C-4 AGUILAR COMPOUND', 'SITIO 14-MANGGAHAN',
    'BUKLOD IBABA',
    'SITIO MASIIT',
    'JORDAN 1', 'JORDAN 2', ' NAGKAKAISANG MAMAMAYAN', 'IRAQ 1', ' IRAQ 2', 'SITIO PUTING TULAY', 'SAMAHANG NAGKAKAISA NG NIA ROAD', 'SITIO IRAN',
    'DRUMAN II', 'PUROK 5 & 6', 'PUROK 5', 'SITIO HEMEDEZ', 'PH 1 BLK 25 KAPATIRAN SAN LORENZO', 'GOOD SAMARITAN/EMIL`S COMPOUND',
    'UNITED COMMUNITY ASSOCIATION(FORMERLY ST.CLAIRE)',
    'SAMAHANG MAGKAKAPITBAHAY', 'CAPT.PERLAS ST.RIVERSIDE',
    'CORAL NA BATO I', 'CORAL NA BATO II', 'SITIO ANI','SITIO 500', ' SAMAHANG TABING BAYBAY ILOG(SBI)', 'SAMAHANG TABING ILOG', 'ROAD SIDE(NEW HORIZONVILLE)', 'SITIO ARATAN', 'SITIO DAPDAPAN',
    'KABADA', 'NEAR DIAZ COURT', 'MAPALAD/NEAR BARANGAY HALL',
    'SITIO CAWAD', 'PAMANA', 'BROOKLAND',
    'BISIG COMMUNITY ASSOCIATION', 'SAMA NA MASA','DAANG NIA'
  ];

  const barangayValue = document.getElementById('barangay-select').value;

  if (input.length === 0) {
    suggestionBox.style.display = 'block'; // Show suggestion box
    suggestionBoxVisible = true;
  
    // Create a mapping of barangay values to their corresponding community values
    const barangayToCommunityMap = {
      APLAYA: ['APLAYA TABING ILOG', 'LUPANG ITIM'],
      BALIBAGO: ['BAGONG UMAGA HOA', 'DOCE PARES', 'IN UNITY WE STAND', 'KASIKAP', 'SAMAHANG CHICOHAN', 'PATIONG BATO', 'GARCIA`S AND PEDROSO COMPOUND'],
      CAINGIN: ['DAANG NIA CAINGIN', 'ORMOC', 'PULONG BUKID', 'TAGUMPAY AT PAG-ASA', 'SAMAHANG MARALITA P-4'],
      DILA: ['BUROL PUBLIC CEMETERY'],
      DITA: ['NAGKAKAISANG MARALITA NG CONSOLE', 'SAMAHANG ACACIA', 'BALAGBAG', 'KAPATIRANG SAMAHANG KAPUSPALAD', 'HAPPYLABD HOA(FORMERLY BUROK BUROK)', 'TABING-ILOG, TABING-BUKID', 'C-4 AGUILAR COMPOUND', 'SITIO 14-MANGGAHAN'],
      IBABA: ['BUKLOD IBABA'],
      LABAS: ['SITIO MASIIT'],
      MACABLING: ['JORDAN 1', 'JORDAN 2', ' NAGKAKAISANG MAMAMAYAN', 'IRAQ 1', ' IRAQ 2', 'SITIO PUTING TULAY', 'SAMAHANG NAGKAKAISA NG NIA ROAD', 'SITIO IRAN'],
      MALITLIT: ['DRUMAN II', 'PUROK 5 & 6', 'PUROK 5', 'SITIO HEMEDEZ', 'PH 1 BLK 25 KAPATIRAN SAN LORENZO', 'GOOD SAMARITAN/EMIL`S COMPOUND'],
      MARKET_AREA: ['UNITED COMMUNITY ASSOCIATION(FORMERLY ST.CLAIRE)'],
      POOC: ['SAMAHANG MAGKAKAPITBAHAY', 'CAPT.PERLAS ST.RIVERSIDE'],
      PULONG_SANTA_CRUZ: ['CORAL NA BATO I', 'CORAL NA BATO II', 'SITIO ANI','SITIO 500', ' SAMAHANG TABING BAYBAY ILOG(SBI)', 'SAMAHANG TABING ILOG', 'ROAD SIDE(NEW HORIZONVILLE)', 'SITIO ARATAN', 'SITIO DAPDAPAN'],
      SINALHAN: ['KABADA', 'NEAR DIAZ COURT', 'MAPALAD/NEAR BARANGAY HALL'],
      SANTO_DOMINGO: ['SITIO CAWAD', 'PAMANA', 'BROOKLAND'],
      TAGAPO: ['BISIG COMMUNITY ASSOCIATION', 'SAMA NA MASA','DAANG NIA'],
    };
  
    // Get the filtered suggestions based on the barangay value
    let filteredSuggestions = barangayToCommunityMap[barangayValue] || suggestions;
  
    filteredSuggestions.forEach((suggestion, index) => {
      const suggestionElement = createSuggestionElementCommunity(suggestion, index);
      suggestionBox.appendChild(suggestionElement);
    });
  }
   else {
    const filteredSuggestions = suggestions.filter((suggestion) =>
      suggestion.toLowerCase().startsWith(input.toLowerCase())
    );

    if (filteredSuggestions.length === 0) {
      suggestionBox.style.display = 'none';
      suggestionBoxVisible = false;
    } else {
      suggestionBox.style.display = 'block';
      suggestionBoxVisible = true;
      filteredSuggestions.forEach((suggestion, index) => {
        const suggestionElement = createSuggestionElementCommunity(suggestion, index);
        suggestionBox.appendChild(suggestionElement);
      });

      // Set the first filtered suggestion as placeholder
      if (filteredSuggestions.length > 0) {
        document.getElementById('community-selectSearch').placeholder = filteredSuggestions[0];
      }
    }
  }

  // Always hover over the first suggestion
  selectedIndex = 0;
  toggleSelectedSuggestionCommunity();
}

function createSuggestionElementCommunity(suggestion, index) {
  const suggestionElement = document.createElement('div');
  suggestionElement.className = 'suggestion';
  suggestionElement.textContent = suggestion;
  suggestionElement.addEventListener('mousedown', () => {
    const textbox = document.getElementById('community-selectSearch');
    const currentValue = textbox.value;
    textbox.value = suggestion;
    const suggestionBox = document.getElementById('communitysearchSuggestionBox');
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;

    // Blur the textbox only if the value changed
    if (currentValue !== suggestion) {
      textbox.blur();
    }
  });
  suggestionElement.addEventListener('mouseover', () => {
    selectedIndex = index;
    toggleSelectedSuggestionCommunity();
  });
  return suggestionElement;
}

function toggleSelectedSuggestionCommunity() {
  const suggestionBox = document.getElementById('communitysearchSuggestionBox');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  Array.from(suggestionElements).forEach((suggestionElement, index) => {
    suggestionElement.classList.toggle('selected', index === selectedIndex);
  });

  // Update the placeholder with the selected suggestion
  const selectedSuggestion = suggestionElements[selectedIndex];
  if (selectedSuggestion) {
    document.getElementById('community-selectSearch').placeholder = selectedSuggestion.textContent;
  }
}

function handlefilterCommunityKeyDown(event) {
  const suggestionBox = document.getElementById('communitysearchSuggestionBox');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  const selectedSuggestion = suggestionElements[selectedIndex];
  
  if (event.key === 'ArrowDown') {
    event.preventDefault();
    selectedIndex = Math.min(selectedIndex + 1, suggestionElements.length - 1);
  } else if (event.key === 'ArrowUp') {
    event.preventDefault();
    selectedIndex = Math.max(selectedIndex - 1, -1);
  } else if (event.key === 'Tab') {
    if (selectedIndex >= 0 && selectedSuggestion) {
      event.preventDefault();
      document.getElementById('community-selectSearch').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;
    selectedIndex = -1;
    return;
  } else if (event.key === 'Enter' && selectedIndex >= 0) {
    event.preventDefault();
    if (selectedSuggestion) {
      document.getElementById('community-selectSearch').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;
    selectedIndex = -1;
    return;
  }

  toggleSelectedSuggestionCommunity();
}



function changefilterCommunityPlaceholder() {
  const suggestionBox = document.getElementById('communitysearchSuggestionBox');
  suggestionBox.style.display = "none";
  document.getElementById('community-selectSearch').placeholder = 'Community Association';
}

// Functions for the modal textbox barangay

function showAllSuggestionsModal() {
  showSuggestionsModal('');
}

function showSuggestionsModal(input) {

  const suggestionBox = document.getElementById('suggestionBoxModal');
  suggestionBox.innerHTML = '';

  if (input.length === 0) {
    suggestionBox.style.display = 'block'; // Show suggestion box
    suggestionBoxVisible = true;
    suggestions.forEach((suggestion, index) => {
      const suggestionElement = createSuggestionElementModal(suggestion, index);
      suggestionBox.appendChild(suggestionElement);
    });

    // Set the first suggestion as placeholder
    if (suggestions.length > 0) {
      document.getElementById('barangay-select-modal').placeholder = suggestions[0];
    }
  } else {
    const filteredSuggestions = suggestions.filter(suggestion =>
      suggestion.toLowerCase().startsWith(input.toLowerCase())
    );

    if (filteredSuggestions.length === 0) {
      suggestionBox.style.display = 'none';
      suggestionBoxVisible = false;
    } else {
      suggestionBox.style.display = 'block';
      suggestionBoxVisible = true;
      filteredSuggestions.forEach((suggestion, index) => {
        const suggestionElement = createSuggestionElementModal(suggestion, index);
        suggestionBox.appendChild(suggestionElement);
      });

      // Set the first filtered suggestion as placeholder
      if (filteredSuggestions.length > 0) {
        document.getElementById('barangay-select-modal').placeholder = filteredSuggestions[0];
      }
    }
  }

  // Always hover over the first suggestion
  selectedIndex = 0;
  toggleSelectedSuggestionModal();
}

function createSuggestionElementModal(suggestion, index) {
  const suggestionElement = document.createElement('div');
  suggestionElement.className = 'suggestion';
  suggestionElement.textContent = suggestion;
  suggestionElement.addEventListener('mousedown', () => {
    const textbox = document.getElementById('barangay-select-modal');
    const currentValue = textbox.value;
    textbox.value = suggestion;
    const suggestionBox = document.getElementById('suggestionBoxModal');
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;

    // Blur the textbox only if the value changed
    if (currentValue !== suggestion) {
      textbox.blur();
    }
  });
  suggestionElement.addEventListener('mouseover', () => {
    selectedIndex = index;
    toggleSelectedSuggestionModal();
  });
  return suggestionElement;
}


function toggleSelectedSuggestionModal() {
  const suggestionBox = document.getElementById('suggestionBoxModal');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  Array.from(suggestionElements).forEach((suggestionElement, index) => {
    suggestionElement.classList.toggle('selected', index === selectedIndex);
  });

  // Update the placeholder with the selected suggestion
  const selectedSuggestion = suggestionElements[selectedIndex];
  if (selectedSuggestion) {
    document.getElementById('barangay-select-modal').placeholder = selectedSuggestion.textContent;
  }
}

function handleKeyModal(event) {
  const suggestionBox = document.getElementById('suggestionBoxModal');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  const selectedSuggestion = suggestionElements[selectedIndex];
  
  if (event.key === 'ArrowDown') {
    event.preventDefault();
    selectedIndex = Math.min(selectedIndex + 1, suggestionElements.length - 1);
  } else if (event.key === 'ArrowUp') {
    event.preventDefault();
    selectedIndex = Math.max(selectedIndex - 1, -1);
  } else if (event.key === 'Tab') {
    if (selectedIndex >= 0 && selectedSuggestion) {
      event.preventDefault();
      document.getElementById('barangay-select-modal').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;
    selectedIndex = -1;
    return;
  } else if (event.key === 'Enter' && selectedIndex >= 0) {
    event.preventDefault();
    if (selectedSuggestion) {
      document.getElementById('barangay-select-modal').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;
    selectedIndex = -1;
    return;
  }

  toggleSelectedSuggestionModal();
}

function convertToUppercase(inputElement) {
  inputElement.value = inputElement.value.toUpperCase();
}


function changePlaceholderModal() {
  const suggestionBox = document.getElementById('suggestionBoxModal');
  suggestionBox.style.display = "none";
  document.getElementById('barangay-select-modal').placeholder = 'Barangay';
}

// Function for housing modal textbox

function showAllSuggestionsHouseModal() {
  showSuggestionsHouseModal('');
}

function showSuggestionsHouseModal(input) {
  const suggestionBox = document.getElementById('suggestionBoxHouseModal');
  suggestionBox.innerHTML = '';

  const suggestions = [
    'FLOOD',
    'LANDSLIDE',
    'SEA LEVEL RISE',
    'DROUGHT',
    'COASTAL AREAS',
    'WATERWAYS',
    'EARTHQUAKE',
    'HUMAN INDUCED DISASTER',
    'INFRASTRUCTURE PROJECTS',
    'EROTION/ DEMOLITION ORDER',
    'THREAT OF EVICTION'
  ];

  if (input.length === 0) {
    suggestionBox.style.display = 'block'; // Show suggestion box
    suggestionBoxVisible = true;
    suggestions.forEach((suggestion, index) => {
      const suggestionElement = createSuggestionElementHouseModal(suggestion, index);
      suggestionBox.appendChild(suggestionElement);
    });

    // Set the first suggestion as placeholder
    if (suggestions.length > 0) {
      document.getElementById('basicHouse').placeholder = suggestions[0];
    }
  } else {
    const filteredSuggestions = suggestions.filter((suggestion) =>
      suggestion.toLowerCase().startsWith(input.toLowerCase())
    );

    if (filteredSuggestions.length === 0) {
      suggestionBox.style.display = 'none';
      suggestionBoxVisible = false;
    } else {
      suggestionBox.style.display = 'block';
      suggestionBoxVisible = true;
      filteredSuggestions.forEach((suggestion, index) => {
        const suggestionElement = createSuggestionElementHouseModal(suggestion, index);
        suggestionBox.appendChild(suggestionElement);
      });

      // Set the first filtered suggestion as placeholder
      if (filteredSuggestions.length > 0) {
        document.getElementById('basicHouse').placeholder = filteredSuggestions[0];
      }
    }
  }

  // Always hover over the first suggestion
  selectedIndex = 0;
  toggleSelectedSuggestionHouseModal();
}

function createSuggestionElementHouseModal(suggestion, index) {
  const suggestionElement = document.createElement('div');
  suggestionElement.className = 'suggestion';
  suggestionElement.textContent = suggestion;
  suggestionElement.addEventListener('mousedown', () => {
    const textbox = document.getElementById('basicHouse');
    const currentValue = textbox.value;
    textbox.value = suggestion;
    const suggestionBox = document.getElementById('suggestionBoxHouseModal');
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;

    // Blur the textbox only if the value changed
    if (currentValue !== suggestion) {
      textbox.blur();
    }
  });
  suggestionElement.addEventListener('mouseover', () => {
    selectedIndex = index;
    toggleSelectedSuggestionHouseModal();
  });
  return suggestionElement;
}


function toggleSelectedSuggestionHouseModal() {
  const suggestionBox = document.getElementById('suggestionBoxHouseModal');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  Array.from(suggestionElements).forEach((suggestionElement, index) => {
    suggestionElement.classList.toggle('selected', index === selectedIndex);
  });

  // Update the placeholder with the selected suggestion
  const selectedSuggestion = suggestionElements[selectedIndex];
  if (selectedSuggestion) {
    document.getElementById('basicHouse').placeholder = selectedSuggestion.textContent;
  }
}

function handleKeyHouseModal(event) {
  const suggestionBox = document.getElementById('suggestionBoxHouseModal');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  const selectedSuggestion = suggestionElements[selectedIndex];
  
  if (event.key === 'ArrowDown') {
    event.preventDefault();
    selectedIndex = Math.min(selectedIndex + 1, suggestionElements.length - 1);
  } else if (event.key === 'ArrowUp') {
    event.preventDefault();
    selectedIndex = Math.max(selectedIndex - 1, -1);
  } else if (event.key === 'Tab') {
    if (selectedIndex >= 0 && selectedSuggestion) {
      event.preventDefault();
      document.getElementById('basicHouse').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;
    selectedIndex = -1;
    return;
  } else if (event.key === 'Enter' && selectedIndex >= 0) {
    event.preventDefault();
    if (selectedSuggestion) {
      document.getElementById('basicHouse').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;
    selectedIndex = -1;
    return;
  }

  toggleSelectedSuggestionModal();
}

function changePlaceholderHouseModal() {
  const suggestionBox = document.getElementById('suggestionBoxHouseModal');
  suggestionBox.style.display = 'none';
  document.getElementById('basicHouse').placeholder = 'Basic Housing Data';
}

// Function for Community Association Modal
function showAllSuggestionsCommunityModal() {
  showSuggestionsCommunityModal('');
}

function showSuggestionsCommunityModal(input) {
  const suggestionBox = document.getElementById('communitySuggestionBox');
  suggestionBox.innerHTML = '';

  const suggestions = [
    'APLAYA TABING ILOG', 'LUPANG ITIM',
    'BAGONG UMAGA HOA', 'DOCE PARES', 'IN UNITY WE STAND', 'KASIKAP', 'SAMAHANG CHICOHAN', 'PATIONG BATO', 'GARCIA`S AND PEDROSO COMPOUND',
    'DAANG NIA CAINGIN', 'ORMOC', 'PULONG BUKID', 'TAGUMPAY AT PAG-ASA', 'SAMAHANG MARALITA P-4',
    'BUROL PUBLIC CEMETERY',
    'NAGKAKAISANG MARALITA NG CONSOLE', 'SAMAHANG ACACIA', 'BALAGBAG', 'KAPATIRANG SAMAHANG KAPUSPALAD', 'HAPPYLABD HOA(FORMERLY BUROK BUROK)', 'TABING-ILOG, TABING-BUKID', 'C-4 AGUILAR COMPOUND', 'SITIO 14-MANGGAHAN',
    'BUKLOD IBABA',
    'SITIO MASIIT',
    'JORDAN 1', 'JORDAN 2', ' NAGKAKAISANG MAMAMAYAN', 'IRAQ 1', ' IRAQ 2', 'SITIO PUTING TULAY', 'SAMAHANG NAGKAKAISA NG NIA ROAD', 'SITIO IRAN',
    'DRUMAN II', 'PUROK 5 & 6', 'PUROK 5', 'SITIO HEMEDEZ', 'PH 1 BLK 25 KAPATIRAN SAN LORENZO', 'GOOD SAMARITAN/EMIL`S COMPOUND',
    'UNITED COMMUNITY ASSOCIATION(FORMERLY ST.CLAIRE)',
    'SAMAHANG MAGKAKAPITBAHAY', 'CAPT.PERLAS ST.RIVERSIDE',
    'CORAL NA BATO I', 'CORAL NA BATO II', 'SITIO ANI','SITIO 500', ' SAMAHANG TABING BAYBAY ILOG(SBI)', 'SAMAHANG TABING ILOG', 'ROAD SIDE(NEW HORIZONVILLE)', 'SITIO ARATAN', 'SITIO DAPDAPAN',
    'KABADA', 'NEAR DIAZ COURT', 'MAPALAD/NEAR BARANGAY HALL',
    'SITIO CAWAD', 'PAMANA', 'BROOKLAND',
    'BISIG COMMUNITY ASSOCIATION', 'SAMA NA MASA','DAANG NIA'
  ];


  const barangayValue = document.getElementById('barangay-select-modal').value;

  if (input.length === 0) {
    suggestionBox.style.display = 'block'; // Show suggestion box
    suggestionBoxVisible = true;

    // Create a mapping of barangay values to their corresponding community values
    const barangayToCommunityMap = {
      APLAYA: ['APLAYA TABING ILOG', 'LUPANG ITIM'],
      BALIBAGO: ['BAGONG UMAGA HOA', 'DOCE PARES', 'IN UNITY WE STAND', 'KASIKAP', 'SAMAHANG CHICOHAN', 'PATIONG BATO', 'GARCIA`S AND PEDROSO COMPOUND'],
      CAINGIN: ['DAANG NIA CAINGIN', 'ORMOC', 'PULONG BUKID', 'TAGUMPAY AT PAG-ASA', 'SAMAHANG MARALITA P-4'],
      DILA: ['BUROL PUBLIC CEMETERY'],
      DITA: ['NAGKAKAISANG MARALITA NG CONSOLE', 'SAMAHANG ACACIA', 'BALAGBAG', 'KAPATIRANG SAMAHANG KAPUSPALAD', 'HAPPYLABD HOA(FORMERLY BUROK BUROK)', 'TABING-ILOG, TABING-BUKID', 'C-4 AGUILAR COMPOUND', 'SITIO 14-MANGGAHAN'],
      IBABA: ['BUKLOD IBABA'],
      LABAS: ['SITIO MASIIT'],
      MACABLING: ['JORDAN 1', 'JORDAN 2', ' NAGKAKAISANG MAMAMAYAN', 'IRAQ 1', ' IRAQ 2', 'SITIO PUTING TULAY', 'SAMAHANG NAGKAKAISA NG NIA ROAD', 'SITIO IRAN'],
      MALITLIT: ['DRUMAN II', 'PUROK 5 & 6', 'PUROK 5', 'SITIO HEMEDEZ', 'PH 1 BLK 25 KAPATIRAN SAN LORENZO', 'GOOD SAMARITAN/EMIL`S COMPOUND'],
      MARKET_AREA: ['UNITED COMMUNITY ASSOCIATION(FORMERLY ST.CLAIRE)'],
      POOC: ['SAMAHANG MAGKAKAPITBAHAY', 'CAPT.PERLAS ST.RIVERSIDE'],
      PULONG_SANTA_CRUZ: ['CORAL NA BATO I', 'CORAL NA BATO II', 'SITIO ANI','SITIO 500', ' SAMAHANG TABING BAYBAY ILOG(SBI)', 'SAMAHANG TABING ILOG', 'ROAD SIDE(NEW HORIZONVILLE)', 'SITIO ARATAN', 'SITIO DAPDAPAN'],
      SINALHAN: ['KABADA', 'NEAR DIAZ COURT', 'MAPALAD/NEAR BARANGAY HALL'],
      SANTO_DOMINGO: ['SITIO CAWAD', 'PAMANA', 'BROOKLAND'],
      TAGAPO: ['BISIG COMMUNITY ASSOCIATION', 'SAMA NA MASA','DAANG NIA'],
    };

    // Get the filtered suggestions based on the barangay value
    let filteredSuggestions = barangayToCommunityMap[barangayValue] || suggestions;
  
    filteredSuggestions.forEach((suggestion, index) => {
      const suggestionElement = createSuggestionElementCommunityModal(suggestion, index);
      suggestionBox.appendChild(suggestionElement);
    });
  } else {
    const filteredSuggestions = suggestions.filter((suggestion) =>
      suggestion.toLowerCase().startsWith(input.toLowerCase())
    );

    if (filteredSuggestions.length === 0) {
      suggestionBox.style.display = 'none';
      suggestionBoxVisible = false;
    } else {
      suggestionBox.style.display = 'block';
      suggestionBoxVisible = true;
      filteredSuggestions.forEach((suggestion, index) => {
        const suggestionElement = createSuggestionElementCommunityModal(suggestion, index);
        suggestionBox.appendChild(suggestionElement);
      });

      // Set the first filtered suggestion as placeholder
      if (filteredSuggestions.length > 0) {
        document.getElementById('community-select').placeholder = filteredSuggestions[0];
      }
    }
  }

  // Always hover over the first suggestion
  selectedIndex = 0;
  toggleSelectedSuggestionCommunityModal();
}

function createSuggestionElementCommunityModal(suggestion, index) {
  const suggestionElement = document.createElement('div');
  suggestionElement.className = 'suggestion';
  suggestionElement.textContent = suggestion;
  suggestionElement.addEventListener('mousedown', () => {
    const textbox = document.getElementById('community-select');
    const currentValue = textbox.value;
    textbox.value = suggestion;
    const suggestionBox = document.getElementById('communitySuggestionBox');
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;

    // Blur the textbox only if the value changed
    if (currentValue !== suggestion) {
      textbox.blur();
    }
  });
  suggestionElement.addEventListener('mouseover', () => {
    selectedIndex = index;
    toggleSelectedSuggestionCommunityModal();
  });
  return suggestionElement;
}


function toggleSelectedSuggestionCommunityModal() {
  const suggestionBox = document.getElementById('communitySuggestionBox');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  Array.from(suggestionElements).forEach((suggestionElement, index) => {
    suggestionElement.classList.toggle('selected', index === selectedIndex);
  });

  // Update the placeholder with the selected suggestion
  const selectedSuggestion = suggestionElements[selectedIndex];
  if (selectedSuggestion) {
    document.getElementById('community-select').placeholder = selectedSuggestion.textContent;
  }
}

function handleCommunityModalKeyDown(event) {
  
  const suggestionBox = document.getElementById('communitySuggestionBox');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  const selectedSuggestion = suggestionElements[selectedIndex];
  
  if (event.key === 'ArrowDown') {
    event.preventDefault();
    selectedIndex = Math.min(selectedIndex + 1, suggestionElements.length - 1);
  } else if (event.key === 'ArrowUp') {
    event.preventDefault();
    selectedIndex = Math.max(selectedIndex - 1, -1);
  } else if (event.key === 'Tab') {
    if (selectedIndex >= 0 && selectedSuggestion) {
      event.preventDefault();
      document.getElementById('community-select').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;
    selectedIndex = -1;
    return;
  } else if (event.key === 'Enter' && selectedIndex >= 0) {
    event.preventDefault();
    if (selectedSuggestion) {
      document.getElementById('community-select').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;
    selectedIndex = -1;
    return;
  }

  toggleSelectedSuggestionCommunityModal();
}

function changeCommunityPlaceholder() {
  const suggestionBox = document.getElementById('communitySuggestionBox');
  suggestionBox.style.display = 'none';
  document.getElementById('community-select').placeholder = 'Community Association';
}


//spouse civil status modal dropdown
function showAllSuggestionsCivilStatusModal() {
  showSuggestionsCivilStatusModal('');
}

function showSuggestionsCivilStatusModal(input) {
  const suggestionBox = document.getElementById('suggestionBoxCivilStatusModal');
  suggestionBox.innerHTML = '';

  const suggestions = ['SINGLE', 'MARRIED', 'WIDOWED', 'SEPARATED'];

  if (input.length === 0) {
    suggestionBox.style.display = 'block';
    suggestionBoxVisible = true;
    suggestions.forEach((suggestion, index) => {
      const suggestionElement = createSuggestionElementCivilStatusModal(suggestion, index);
      suggestionBox.appendChild(suggestionElement);
    });

    if (suggestions.length > 0) {
      document.getElementById('spouse_civilStatus').placeholder = suggestions[0];
    }
  } else {
    const filteredSuggestions = suggestions.filter((suggestion) =>
      suggestion.toLowerCase().startsWith(input.toLowerCase())
    );

    if (filteredSuggestions.length === 0) {
      suggestionBox.style.display = 'none';
      suggestionBoxVisible = false;
    } else {
      suggestionBox.style.display = 'block';
      suggestionBoxVisible = true;
      filteredSuggestions.forEach((suggestion, index) => {
        const suggestionElement = createSuggestionElementCivilStatusModal(suggestion, index);
        suggestionBox.appendChild(suggestionElement);
      });

      if (filteredSuggestions.length > 0) {
        document.getElementById('spouse_civilStatus').placeholder = filteredSuggestions[0];
      }
    }
  }

  selectedIndex = 0;
  toggleSelectedSuggestionCivilStatusModal();
}

function createSuggestionElementCivilStatusModal(suggestion, index) {
  const suggestionElement = document.createElement('div');
  suggestionElement.className = 'suggestion';
  suggestionElement.textContent = suggestion;
  suggestionElement.addEventListener('mousedown', () => {
    const textbox = document.getElementById('spouse_civilStatus');
    const currentValue = textbox.value;
    textbox.value = suggestion;
    const suggestionBox = document.getElementById('suggestionBoxCivilStatusModal');
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;

    // Blur the textbox only if the value changed
    if (currentValue !== suggestion) {
      textbox.blur();
    }
  });
  suggestionElement.addEventListener('mouseover', () => {
    selectedIndex = index;
    toggleSelectedSuggestionCivilStatusModal();
  });
  return suggestionElement;
}



function toggleSelectedSuggestionCivilStatusModal() {
  const suggestionBox = document.getElementById('suggestionBoxCivilStatusModal');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  Array.from(suggestionElements).forEach((suggestionElement, index) => {
    suggestionElement.classList.toggle('selected', index === selectedIndex);
  });

  const selectedSuggestion = suggestionElements[selectedIndex];
  if (selectedSuggestion) {
    document.getElementById('spouse_civilStatus').placeholder = selectedSuggestion.textContent;
  }
}

function handleKeyCivilStatusModal(event) {
 
  const suggestionBox = document.getElementById('suggestionBoxCivilStatusModal');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  const selectedSuggestion = suggestionElements[selectedIndex];
  
  if (event.key === 'ArrowDown') {
    event.preventDefault();
    selectedIndex = Math.min(selectedIndex + 1, suggestionElements.length - 1);
  } else if (event.key === 'ArrowUp') {
    event.preventDefault();
    selectedIndex = Math.max(selectedIndex - 1, -1);
  } else if (event.key === 'Tab') {
    if (selectedIndex >= 0 && selectedSuggestion) {
      event.preventDefault();
      document.getElementById('spouse_civilStatus').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;
    selectedIndex = -1;
    return;
  } else if (event.key === 'Enter' && selectedIndex >= 0) {
    event.preventDefault();
    if (selectedSuggestion) {
      document.getElementById('spouse_civilStatus').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;
    selectedIndex = -1;
    return;
  }

  toggleSelectedSuggestionCivilStatusModal();
}

function changePlaceholderCivilStatusModal() {
  const suggestionBox = document.getElementById('suggestionBoxCivilStatusModal');
  suggestionBox.style.display = 'none';
  document.getElementById('spouse_civilStatus').placeholder = 'Civil Status';
}

// head civil status dropdown select 

function showAllSuggestionsHeadCivilStatusModal() {
  showSuggestionsHeadCivilStatusModal('');
}

function showSuggestionsHeadCivilStatusModal(input) {
  const suggestionBox = document.getElementById('suggestionBoxHeadCivilStatusModal');
  suggestionBox.innerHTML = '';

  const suggestions = ['SINGLE', 'MARRIED', 'WIDOWED', 'SEPARATED'];

  if (input.length === 0) {
    suggestionBox.style.display = 'block';
    suggestionBoxVisible = true;
    suggestions.forEach((suggestion, index) => {
      const suggestionElement = createSuggestionElementHeadCivilStatusModal(suggestion, index);
      suggestionBox.appendChild(suggestionElement);
    });

    if (suggestions.length > 0) {
      document.getElementById('head_civilStatus').placeholder = suggestions[0];
    }
  } else {
    const filteredSuggestions = suggestions.filter((suggestion) =>
      suggestion.toLowerCase().startsWith(input.toLowerCase())
    );

    if (filteredSuggestions.length === 0) {
      suggestionBox.style.display = 'none';
      suggestionBoxVisible = false;
    } else {
      suggestionBox.style.display = 'block';
      suggestionBoxVisible = true;
      filteredSuggestions.forEach((suggestion, index) => {
        const suggestionElement = createSuggestionElementHeadCivilStatusModal(suggestion, index);
        suggestionBox.appendChild(suggestionElement);
      });

      if (filteredSuggestions.length > 0) {
        document.getElementById('head_civilStatus').placeholder = filteredSuggestions[0];
      }
    }
  }

  selectedIndex = 0;
  toggleSelectedSuggestionHeadCivilStatusModal();
}

// Rest of the code remains the same


function createSuggestionElementHeadCivilStatusModal(suggestion, index) {
  const suggestionElement = document.createElement('div');
  suggestionElement.className = 'suggestion';
  suggestionElement.textContent = suggestion;
  suggestionElement.addEventListener('mousedown', () => {
    const textbox = document.getElementById('head_civilStatus');
    const currentValue = textbox.value;
    textbox.value = suggestion;
    const suggestionBox = document.getElementById('suggestionBoxHeadCivilStatusModal');
    suggestionBox.style.display = 'none';

    // Blur the textbox only if the value changed
    if (currentValue !== suggestion) {
      textbox.blur();
    }
  });
  suggestionElement.addEventListener('mouseover', () => {
    selectedIndex = index;
    toggleSelectedSuggestionHeadCivilStatusModal();
  });
  return suggestionElement;
}

function toggleSelectedSuggestionHeadCivilStatusModal() {
  const suggestionBox = document.getElementById('suggestionBoxHeadCivilStatusModal');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  Array.from(suggestionElements).forEach((suggestionElement, index) => {
    suggestionElement.classList.toggle('selected', index === selectedIndex);
  });

  const selectedSuggestion = suggestionElements[selectedIndex];
  if (selectedSuggestion) {
    document.getElementById('head_civilStatus').placeholder = selectedSuggestion.textContent;
  }
}

function handleKeyHeadCivilStatusModal(event) {

  const suggestionBox = document.getElementById('suggestionBoxHeadCivilStatusModal');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  const selectedSuggestion = suggestionElements[selectedIndex];
  
  if (event.key === 'ArrowDown') {
    event.preventDefault();
    selectedIndex = Math.min(selectedIndex + 1, suggestionElements.length - 1);
  } else if (event.key === 'ArrowUp') {
    event.preventDefault();
    selectedIndex = Math.max(selectedIndex - 1, -1);
  } else if (event.key === 'Tab') {
    if (selectedIndex >= 0 && selectedSuggestion) {
      event.preventDefault();
      document.getElementById('head_civilStatus').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;
    selectedIndex = -1;
    return;
  } else if (event.key === 'Enter' && selectedIndex >= 0) {
    event.preventDefault();
    if (selectedSuggestion) {
      document.getElementById('head_civilStatus').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisible = false;
    selectedIndex = -1;
    return;
  }

  toggleSelectedSuggestionHeadCivilStatusModal();
}

function changePlaceholderHeadCivilStatusModal() {
  const suggestionBox = document.getElementById('suggestionBoxHeadCivilStatusModal');
  suggestionBox.style.display = 'none';
  document.getElementById('head_civilStatus').placeholder = 'Civil Status';
}

//working child civil status

function showAllSuggestionsWchildCivilStatusModal(index) {
  showSuggestionsWchildCivilStatusModal('', index);
}

function showSuggestionsWchildCivilStatusModal(input, index) {
  const suggestionBox = document.getElementById(`suggestionBoxWchildCivilStatusModal_${index}`);
  suggestionBox.innerHTML = '';

  const suggestions = ['SINGLE', 'MARRIED', 'WIDOWED', 'SEPARATED'];

  if (input.length === 0) {
    suggestionBox.style.display = 'block';
    suggestions.forEach((suggestion, i) => {
      const suggestionElement = createSuggestionElementWchildCivilStatusModal(suggestion, i, index);
      suggestionBox.appendChild(suggestionElement);
    });

    if (suggestions.length > 0) {
      document.getElementById(`Wchild_civilStatus_${index}`).placeholder = suggestions[0];
    }
  } else {
    const filteredSuggestions = suggestions.filter((suggestion) =>
      suggestion.toLowerCase().startsWith(input.toLowerCase())
    );

    if (filteredSuggestions.length === 0) {
      suggestionBox.style.display = 'none';
    } else {
      suggestionBox.style.display = 'block';
      filteredSuggestions.forEach((suggestion, i) => {
        const suggestionElement = createSuggestionElementWchildCivilStatusModal(suggestion, i, index);
        suggestionBox.appendChild(suggestionElement);
      });

      if (filteredSuggestions.length > 0) {
        document.getElementById(`Wchild_civilStatus_${index}`).placeholder = filteredSuggestions[0];
      }
    }
  }

  selectedIndex = 0;
  toggleSelectedSuggestionWchildCivilStatusModal(index);
}

function createSuggestionElementWchildCivilStatusModal(suggestion, index, childIndex) {
  const suggestionElement = document.createElement('div');
  suggestionElement.className = 'suggestion';
  suggestionElement.textContent = suggestion;
  suggestionElement.addEventListener('mousedown', () => {
    const textbox = document.getElementById(`Wchild_civilStatus_${childIndex}`);
    const currentValue = textbox.value;
    textbox.value = suggestion;
    const suggestionBox = document.getElementById(`suggestionBoxWchildCivilStatusModal_${childIndex}`);
    suggestionBox.style.display = 'none';

    // Blur the textbox only if the value changed
    if (currentValue !== suggestion) {
      textbox.blur();
    }
  });
  suggestionElement.addEventListener('mouseover', () => {
    selectedIndex = index;
    toggleSelectedSuggestionWchildCivilStatusModal(childIndex);
  });
  return suggestionElement;
}

function toggleSelectedSuggestionWchildCivilStatusModal(index) {
  const suggestionBox = document.getElementById(`suggestionBoxWchildCivilStatusModal_${index}`);
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  Array.from(suggestionElements).forEach((suggestionElement, i) => {
    suggestionElement.classList.toggle('selected', i === selectedIndex);
  });

  const selectedSuggestion = suggestionElements[selectedIndex];
  if (selectedSuggestion) {
    document.getElementById(`Wchild_civilStatus_${index}`).placeholder = selectedSuggestion.textContent;
  }
}

function handleKeyWchildCivilStatusModal(event, index) {
  const activeTextbox = document.activeElement;
  const suggestionBox = activeTextbox.nextElementSibling;

  if (event.key === 'ArrowDown') {
    event.preventDefault();
    selectedIndex = Math.min(selectedIndex + 1, suggestionBox.children.length - 1);
  } else if (event.key === 'ArrowUp') {
    event.preventDefault();
    selectedIndex = Math.max(selectedIndex - 1, -1);
  } else if (event.key === 'Tab' && selectedIndex >= 0) {
    const selectedSuggestion = suggestionBox.getElementsByClassName('selected')[0];
    const textbox = activeTextbox;
    textbox.value = selectedSuggestion ? selectedSuggestion.textContent : textbox.value;
    suggestionBox.style.display = 'none';
    selectedIndex = -1;
    return;
  } else if (event.key === 'Enter' && selectedIndex >= 0) {
    event.preventDefault();
    const selectedSuggestion = suggestionBox.getElementsByClassName('selected')[0];
    const textbox = activeTextbox;
    textbox.value = selectedSuggestion ? selectedSuggestion.textContent : textbox.value;
    suggestionBox.style.display = 'none';
    selectedIndex = -1;
    return;
  }

  if (event.key === 'Tab') {
    suggestionBox.style.display = 'none';
    selectedIndex = -1;
  } else {
    toggleSelectedSuggestionWchildCivilStatusModal(index);
  }
}

  


function changePlaceholderWchildCivilStatusModal(index) {
  const suggestionBox = document.getElementById(`suggestionBoxWchildCivilStatusModal_${index}`);
  suggestionBox.style.display = 'none';
  document.getElementById(`Wchild_civilStatus_${index}`).placeholder = 'Civil Status';
}