// Theme Toggle
const themeToggle = document.getElementById('themeToggle');
const themeIcon = document.getElementById('themeIcon');
const htmlElement = document.documentElement;

// Check for saved theme preference or default to 'light'
const currentTheme = localStorage.getItem('theme') || 'light';
htmlElement.setAttribute('data-bs-theme', currentTheme);
updateThemeIcon(currentTheme);

themeToggle.addEventListener('click', function() {
    const currentTheme = htmlElement.getAttribute('data-bs-theme');
    const newTheme = currentTheme === 'light' ? 'dark' : 'light';

    htmlElement.setAttribute('data-bs-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    updateThemeIcon(newTheme);

    // Add animation
    this.style.transform = 'rotate(360deg)';
    setTimeout(() => {
        this.style.transform = 'rotate(0deg)';
    }, 300);
});

function updateThemeIcon(theme) {
    if (theme === 'dark') {
        themeIcon.className = 'bi bi-sun-fill';
    } else {
        themeIcon.className = 'bi bi-moon-stars-fill';
    }
}

// Initialize jQuery
$(document).ready(function () {
    // Add fade-in animation to tabs
    $('button[data-bs-toggle="pill"]').on('shown.bs.tab', function (e) {
        $($(e.target).attr('data-bs-target')).addClass('fade-in');
    });
});

// Copy to Clipboard Function
function copyToClipboard(elementId) {
    const element = document.getElementById(elementId);
    let textToCopy = '';

    // Check if it's a textarea or div
    if (element.tagName === 'TEXTAREA') {
        textToCopy = element.value;
    } else {
        textToCopy = element.innerText || element.textContent;
    }

    if (!textToCopy || textToCopy.trim() === '' || textToCopy.includes('көринеди')) {
        return; // Don't copy placeholder text
    }

    // Copy to clipboard
    navigator.clipboard.writeText(textToCopy).then(function() {
        // Visual feedback
        const button = event.target.closest('.copy-btn');
        const icon = button.querySelector('i');
        const originalClass = icon.className;

        button.classList.add('copied');
        icon.className = 'bi bi-check-lg';

        setTimeout(() => {
            button.classList.remove('copied');
            icon.className = originalClass;
        }, 2000);
    }).catch(function(err) {
        console.error('Failed to copy:', err);
    });
}

// Spell Check Function
function checkText() {
    const text = $('#textUser').val();
    if (!text.trim()) {
        $('#textResponse').html('<span class="text-muted">Нәтийже бул жерде көринеди...</span>');
        return;
    }

    // Show loading state
    $('#textResponse').html('<span class="text-muted"><i class="bi bi-hourglass-split me-2"></i>Тексериўде...</span>');

    $.ajax({
        url: "/check",
        type: "POST",
        data: {
            "_token": window.csrfToken,
            text: text,
        },
        success: function(data) {
            // Display result with HTML support for highlighting
            $('#textResponse').html(data);
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            $('#textResponse').html('<span class="text-danger">Қате: ' + error + '</span>');
        }
    });
}

// Dictionary Explanation Function
function explanation() {
    const word = $('#expWord').val().trim();
    if (!word) {
        $('#expText').html('<span class="text-warning"><i class="bi bi-exclamation-circle me-2"></i>Сөзди киритиң!</span>');
        return;
    }

    // Show loading state
    $('#expText').html('<span class="text-muted"><i class="bi bi-hourglass-split me-2"></i>Излеўде...</span>');

    $.ajax({
        url: "/explanation",
        type: "POST",
        data: {
            '_token': window.csrfToken,
            word: word
        },
        success: function(data) {
            if (data) {
                $('#expText').html(data);
            } else {
                $('#expText').html('<span class="text-info"><i class="bi bi-info-circle me-2"></i>Бул сөз сөзликте табылмады.</span>');
            }
        },
        error: function(xhr, status, error) {
            console.error('Error:', error);
            $('#expText').html('<span class="text-danger"><i class="bi bi-x-circle me-2"></i>Қате: Сөз табылмады.</span>');
        }
    });
}

// Enter key support for dictionary search
$('#expWord').on('keypress', function(e) {
    if (e.which === 13) {
        e.preventDefault();
        explanation();
    }
});

// Ctrl+Enter key support for spell checking
$('#textUser').on('keydown', function(e) {
    if (e.ctrlKey && e.which === 13) {
        e.preventDefault();
        checkText();
    }
});
