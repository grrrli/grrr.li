// Toast notification
function showToast(message) {
    const existingToast = document.querySelector('.toast');
    if (existingToast) {
        existingToast.remove();
    }

    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.textContent = message;
    document.body.appendChild(toast);

    setTimeout(() => {
        toast.classList.add('show');
    }, 10);

    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => {
            toast.remove();
        }, 300);
    }, 2000);
}

// Copy to clipboard
function copyToClipboard(text) {
    console.log('copyToClipboard called with:', text);

    // Try modern clipboard API first
    if (navigator.clipboard && navigator.clipboard.writeText) {
        console.log('Using modern clipboard API');
        navigator.clipboard.writeText(text).then(() => {
            console.log('Clipboard API success');
            showToast('Copied');
        }).catch((err) => {
            console.error('Clipboard API failed:', err);
            fallbackCopy(text);
        });
    } else {
        // Fallback for older browsers or insecure contexts
        console.log('Using fallback copy');
        fallbackCopy(text);
    }
}

// Fallback copy method
function fallbackCopy(text) {
    console.log('Fallback copy called with:', text);
    const textarea = document.createElement('textarea');
    textarea.value = text;
    textarea.style.position = 'fixed';
    textarea.style.top = '0';
    textarea.style.left = '0';
    textarea.style.width = '2em';
    textarea.style.height = '2em';
    textarea.style.padding = '0';
    textarea.style.border = 'none';
    textarea.style.outline = 'none';
    textarea.style.boxShadow = 'none';
    textarea.style.background = 'transparent';
    textarea.setAttribute('readonly', '');

    document.body.appendChild(textarea);

    // For iOS
    textarea.contentEditable = true;
    textarea.readOnly = false;

    const range = document.createRange();
    range.selectNodeContents(textarea);
    const selection = window.getSelection();
    selection.removeAllRanges();
    selection.addRange(range);
    textarea.setSelectionRange(0, 999999);

    try {
        const successful = document.execCommand('copy');
        console.log('execCommand copy result:', successful);
        if (successful) {
            showToast('Copied');
        } else {
            showToast('Failed to copy');
        }
    } catch (err) {
        console.error('Fallback copy failed:', err);
        showToast('Failed to copy');
    }

    document.body.removeChild(textarea);
}

// Refresh page
function refreshPage() {
    location.reload();
}
