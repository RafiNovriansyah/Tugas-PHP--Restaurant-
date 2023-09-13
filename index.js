const btn = document.getElementById('TersediaBtn');

// ✅ Toggle button text on click
btn.addEventListener('click', function handleClick() {
  const initialText = 'Tersedia';

  if (btn.textContent.toLowerCase().includes(initialText.toLowerCase())) {
    btn.textContent = 'Tidak Tersedia';
  } else {
    btn.textContent = initialText;
  }
});

