const suggestions = ['APLAYA', 'BALIBAGO', 'CAINGIN', 'DILA', 'DITA', 'DON JOSE', 'IBABA', 'KANLURAN', 'LABAS', 'MACABLING', 'MALITLIT', 'MALUSAK', 'MARKET AREA', 'POOC', 'PULONG SANTA CRUZ', 'SANTO DOMINGO', 'SINALHAN', 'TAGAPO'];
let selectedIndexHeadModal = -1;
let suggestionBoxVisibleHeadModal = false;

function showAllSuggestionsheadModal() {
  showSuggestionsheadModal('');
}

function showSuggestionsheadModal(input) {
  const suggestionBox = document.getElementById('suggestionBoxHeadModal');
  suggestionBox.innerHTML = '';

  if (input.length === 0) {
    suggestionBox.style.display = 'block'; // Show suggestion box
    suggestionBoxVisibleHeadModal = true;
    suggestions.forEach((suggestion, index) => {
      const suggestionElement = createSuggestionElementHeadModal(suggestion, index);
      suggestionBox.appendChild(suggestionElement);
    });

    // Set the first suggestion as placeholder
    if (suggestions.length > 0) {
      document.getElementById('barangay-headmodal').placeholder = suggestions[0];
    }
  } else {
    const filteredSuggestions = suggestions.filter(suggestion =>
      suggestion.toLowerCase().startsWith(input.toLowerCase())
    );

    if (filteredSuggestions.length === 0) {
      suggestionBox.style.display = 'none';
      suggestionBoxVisibleHeadModal = false;
    } else {
      suggestionBox.style.display = 'block';
      suggestionBoxVisibleHeadModal = true;
      filteredSuggestions.forEach((suggestion, index) => {
        const suggestionElement = createSuggestionElementHeadModal(suggestion, index);
        suggestionBox.appendChild(suggestionElement);
      });

      // Set the first filtered suggestion as placeholder
      if (filteredSuggestions.length > 0) {
        document.getElementById('barangay-headmodal').placeholder = filteredSuggestions[0];
      }
    }
  }

  // Always hover over the first suggestion
  selectedIndexHeadModal = 0;
  toggleSelectedSuggestionHeadModal();
}

function createSuggestionElementHeadModal(suggestion, index) {
  const suggestionElement = document.createElement('div');
  suggestionElement.className = 'suggestion';
  suggestionElement.textContent = suggestion;
  suggestionElement.addEventListener('mousedown', () => {
    const textbox = document.getElementById('barangay-headmodal');
    const currentValue = textbox.value;
    textbox.value = suggestion;
    const suggestionBox = document.getElementById('suggestionBoxHeadModal');
    suggestionBox.style.display = 'none';
    suggestionBoxVisibleHeadModal = false;

    // Blur the textbox only if the value changed
    if (currentValue !== suggestion) {
      textbox.blur();
    }
  });
  suggestionElement.addEventListener('mouseover', () => {
    selectedIndexHeadModal = index;
    toggleSelectedSuggestionHeadModal();
  });
  return suggestionElement;
}

function toggleSelectedSuggestionHeadModal() {
  const suggestionBox = document.getElementById('suggestionBoxHeadModal');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  Array.from(suggestionElements).forEach((suggestionElement, index) => {
    suggestionElement.classList.toggle('selected', index === selectedIndexHeadModal);
  });

  // Update the placeholder with the selected suggestion
  const selectedSuggestion = suggestionElements[selectedIndexHeadModal];
  if (selectedSuggestion) {
    document.getElementById('barangay-headmodal').placeholder = selectedSuggestion.textContent;
  }
}

function handleKeyheadModal(event) {
  const suggestionBox = document.getElementById('suggestionBoxHeadModal');
  const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
  const selectedSuggestion = suggestionElements[selectedIndexHeadModal];
  
  if (event.key === 'ArrowDown') {
    event.preventDefault();
    selectedIndexHeadModal = Math.min(selectedIndexHeadModal + 1, suggestionElements.length - 1);
  } else if (event.key === 'ArrowUp') {
    event.preventDefault();
    selectedIndexHeadModal = Math.max(selectedIndexHeadModal - 1, -1);
  } else if (event.key === 'Tab') {
    if (selectedIndexHeadModal >= 0 && selectedSuggestion) {
      event.preventDefault();
      document.getElementById('barangay-headmodal').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisibleHeadModal = false;
    selectedIndexHeadModal = -1;
    return;
  } else if (event.key === 'Enter' && selectedIndexHeadModal >= 0) {
    event.preventDefault();
    if (selectedSuggestion) {
      document.getElementById('barangay-headmodal').value = selectedSuggestion.textContent;
    }
    suggestionBox.style.display = 'none';
    suggestionBoxVisibleHeadModal = false;
    selectedIndexHeadModal = -1;
    return;
  }

  toggleSelectedSuggestionHeadModal();
}

function changePlaceholderheadModal() {
  const suggestionBox = document.getElementById('suggestionBoxHeadModal');
  suggestionBox.style.display = 'none';
  document.getElementById('barangay-headmodal').placeholder = 'Barangay (Barrio)';
}

function convertToUppercase(element) {
    element.value = element.value.toUpperCase();
}

  //community dropdown list

  function showAllSuggestionsCommunityheadModal() {
    showSuggestionsCommunityheadModal('');
  }
  
  function showSuggestionsCommunityheadModal(input) {
    const suggestionBox = document.getElementById('headcommunitySuggestionBox');
    suggestionBox.innerHTML = '';
  
    const suggestions = [
      'COMMUNITY1',
      'COMMUNITY2',
      'COMMUNITY3',
      'COMMUNITY4',
      'COMMUNITY5',
      'COMMUNITY6',
      'COMMUNITY7',
      'COMMUNITY8',
      'COMMUNITY9',
      'COMMUNITY10',
      'COMMUNITY11',
      'COMMUNITY12',
      'COMMUNITY13',
      'COMMUNITY14',
      'COMMUNITY15',
      'COMMUNITY16'
    ];

    const barangayValue = document.getElementById('barangay-headmodal').value;
  
    if (input.length === 0) {
        suggestionBox.style.display = 'block'; // Show suggestion box
      
        let filteredSuggestions;
        if (barangayValue === 'APLAYA') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY1' || suggestion === 'COMMUNITY2'
          );
        } else if (barangayValue === 'BALIBAGO') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY3' || suggestion === 'COMMUNITY4'
          );
        } else if (barangayValue === 'CAINGIN') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY5' || suggestion === 'COMMUNITY6'
          );
        } else if (barangayValue === 'DILA') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY7' || suggestion === 'COMMUNITY8'
          );
        } else if (barangayValue === 'DITA') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY9' || suggestion === 'COMMUNITY10'
          );
        } else if (barangayValue === 'DON JOSE') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY11'
          );
        } else if (barangayValue === 'IBABA') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY12'
          );
        } else if (barangayValue === 'KANLURAN') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY13'
          );
        } else if (barangayValue === 'LABAS') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY14'
          );
        } else if (barangayValue === 'MACABLING') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY15'
          );
        } else if (barangayValue === 'MALITLIT') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY1'
          );
        } else if (barangayValue === 'MALUSAK') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY3'
          );
        } else if (barangayValue === 'MARKET AREA') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY13'
          );
        } else if (barangayValue === 'POOC') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY5'
          );
        } else if (barangayValue === 'PULONG SANTA CRUZ') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY8'
          );
        } else if (barangayValue === 'SINALHAN') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY3'
          );
        } else if (barangayValue === 'TAGAPO') {
          filteredSuggestions = suggestions.filter((suggestion) =>
            suggestion === 'COMMUNITY10'
          );
        } else {
          filteredSuggestions = suggestions;
        }
      filteredSuggestions.forEach((suggestion, index) => {
        const suggestionElement = createSuggestionElementCommunityheadModal(suggestion, index);
        suggestionBox.appendChild(suggestionElement);
      });
    } else {
      const filteredSuggestions = suggestions.filter((suggestion) =>
        suggestion.toLowerCase().startsWith(input.toLowerCase())
      );
  
      if (filteredSuggestions.length === 0) {
        suggestionBox.style.display = 'none';
      } else {
        suggestionBox.style.display = 'block';
        filteredSuggestions.forEach((suggestion, index) => {
          const suggestionElement = createSuggestionElementCommunityheadModal(suggestion, index);
          suggestionBox.appendChild(suggestionElement);
        });
  
        // Set the first filtered suggestion as placeholder
        if (filteredSuggestions.length > 0) {
          document.getElementById('community-headModal').placeholder = filteredSuggestions[0];
        }
      }
    }
  
    // Always hover over the first suggestion
    selectedIndex = 0;
    toggleSelectedSuggestionCommunityheadModal();
  }
  
  function createSuggestionElementCommunityheadModal(suggestion, index) {
    const suggestionElement = document.createElement('div');
    suggestionElement.className = 'suggestion';
    suggestionElement.textContent = suggestion;
    suggestionElement.addEventListener('mousedown', () => {
      const textbox = document.getElementById('community-headModal');
      textbox.value = suggestion;
      const suggestionBox = document.getElementById('headcommunitySuggestionBox');
      suggestionBox.style.display = 'none';
  
      // Blur the textbox
      textbox.blur();
    });
    suggestionElement.addEventListener('mouseover', () => {
      selectedIndex = index;
      toggleSelectedSuggestionCommunityheadModal();
    });
    return suggestionElement;
  }
  
  function toggleSelectedSuggestionCommunityheadModal() {
    const suggestionBox = document.getElementById('headcommunitySuggestionBox');
    const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
    Array.from(suggestionElements).forEach((suggestionElement, index) => {
      suggestionElement.classList.toggle('selected', index === selectedIndex);
    });
  
    // Update the placeholder with the selected suggestion
    const selectedSuggestion = suggestionElements[selectedIndex];
    if (selectedSuggestion) {
      document.getElementById('community-headModal').placeholder = selectedSuggestion.textContent;
    }
  }
  
  function handleCommunityheadModalKeyDown(event) {
    const suggestionBox = document.getElementById('headcommunitySuggestionBox');
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
          document.getElementById('community-headModal').value = selectedSuggestion.textContent;
        }
        suggestionBox.style.display = 'none';
        selectedIndex = -1;
        return;
      } else if (event.key === 'Enter' && selectedIndex >= 0) {
        event.preventDefault();
        if (selectedSuggestion) {
          document.getElementById('community-headModal').value = selectedSuggestion.textContent;
        }
        suggestionBox.style.display = 'none';
        selectedIndex = -1;
        return;
      }
    
      toggleSelectedSuggestionCommunityheadModal();
    }
    
    function changeheadCommunityPlaceholder() {
      const suggestionBox = document.getElementById('headcommunitySuggestionBox');
      suggestionBox.style.display = 'none';
      document.getElementById('community-headModal').placeholder = 'Community Association';
    }

  //basic house dropdown

  function showAllSuggestionsHouseheadModal() {
    showSuggestionsHouseheadModal('');
  }
  
  function showSuggestionsHouseheadModal(input) {
    const suggestionBox = document.getElementById('suggestionBoxHouseheadModal');
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
        const suggestionElement = createSuggestionElementHouseheadModal(suggestion, index);
        suggestionBox.appendChild(suggestionElement);
      });
  
      // Set the first suggestion as placeholder
      if (suggestions.length > 0) {
        document.getElementById('basicheadModal').placeholder = suggestions[0];
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
          const suggestionElement = createSuggestionElementHouseheadModal(suggestion, index);
          suggestionBox.appendChild(suggestionElement);
        });
  
        // Set the first filtered suggestion as placeholder
        if (filteredSuggestions.length > 0) {
          document.getElementById('basicheadModal').placeholder = filteredSuggestions[0];
        }
      }
    }
  
    // Always hover over the first suggestion
    selectedIndex = 0;
    toggleSelectedSuggestionHouseheadModal();
  }
  
  function createSuggestionElementHouseheadModal(suggestion, index) {
    const suggestionElement = document.createElement('div');
    suggestionElement.className = 'suggestion';
    suggestionElement.textContent = suggestion;
    suggestionElement.addEventListener('mousedown', () => {
      const textbox = document.getElementById('basicheadModal');
      const currentValue = textbox.value;
      textbox.value = suggestion;
      const suggestionBox = document.getElementById('suggestionBoxHouseheadModal');
      suggestionBox.style.display = 'none';
      suggestionBoxVisible = false;
  
      // Blur the textbox only if the value changed
      if (currentValue !== suggestion) {
        textbox.blur();
      }
    });
    suggestionElement.addEventListener('mouseover', () => {
      selectedIndex = index;
      toggleSelectedSuggestionHouseheadModal();
    });
    return suggestionElement;
  }
  
  function toggleSelectedSuggestionHouseheadModal() {
    const suggestionBox = document.getElementById('suggestionBoxHouseheadModal');
    const suggestionElements = suggestionBox.getElementsByClassName('suggestion');
    Array.from(suggestionElements).forEach((suggestionElement, index) => {
      suggestionElement.classList.toggle('selected', index === selectedIndex);
    });
  
    // Update the placeholder with the selected suggestion
    const selectedSuggestion = suggestionElements[selectedIndex];
    if (selectedSuggestion) {
      document.getElementById('basicheadModal').placeholder = selectedSuggestion.textContent;
    }
  }
  
  function handleKeyHouseheadModal(event) {
    const suggestionBox = document.getElementById('suggestionBoxHouseheadModal');
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
          document.getElementById('basicheadModal').value = selectedSuggestion.textContent;
        }
        suggestionBox.style.display = 'none';
        suggestionBoxVisible = false;
        selectedIndex = -1;
        return;
      } else if (event.key === 'Enter' && selectedIndex >= 0) {
        event.preventDefault();
        if (selectedSuggestion) {
          document.getElementById('basicheadModal').value = selectedSuggestion.textContent;
        }
        suggestionBox.style.display = 'none';
        suggestionBoxVisible = false;
        selectedIndex = -1;
        return;
      }
    
      toggleSelectedSuggestionHouseheadModal();
    }
    
    function changePlaceholderHouseheadModal() {
      const suggestionBox = document.getElementById('suggestionBoxHouseheadModal');
      suggestionBox.style.display = 'none';
      document.getElementById('basicheadModal').placeholder = 'Basic Housing Data';
    }