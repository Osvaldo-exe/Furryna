const uploadArea = document.querySelector('#upload-area');
const fileInput = document.querySelector('#file-input');

//drag and drop
  uploadArea.addEventListener('dragover', (e) => {
    e.preventDefault();
    uploadArea.classList.add('dragging');
  });

  uploadArea.addEventListener('dragleave', () => {
    uploadArea.classList.remove('dragging');
  });

  uploadArea.addEventListener('drop', (e) => {
    e.preventDefault();
    uploadArea.classList.remove('dragging');
    const files = Array.from(e.dataTransfer.files);
    handleFiles(files);
  });

//click detector
  uploadArea.addEventListener('click', () => {
    fileInput.click();
  });


//detect file input and temporary databas
  fileInput.addEventListener('change', (e) => {
    const files = Array.from(e.target.files);
    handleFiles(files);
  });

//kalau mau masuk database, ganti sini (console log baris tu ganti aja)
  function handleFiles(files) {
    files.forEach((file) => {
      console.log(`File added: ${file.name}`);
    });
  }