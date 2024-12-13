<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/uploadProductForm.css">
    <title>Document</title>
</head>
<body>
    <div class="modal">
        <div class="modal-body">
            <form id="bestForm" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ Auth::user()->email }}" name="product_owner">
                <label>
                    <h2 class="Font-Title-InputForm" >Product Name</h2>
                    <input class="Input-Form" type="text" placeholder="Enter product name here" name="product_name">
                </label>
                <label>
                    <h2 class="Font-Title-InputForm">Product Price</h2>
                    <input class="Input-Form" type="text" placeholder="Enter product price here" name="price">
                </label>
                <label>
                    <h2 class="Font-Title-InputForm">Product Description</h2>
                    <input class="Input-Form" type="text" placeholder="Enter product description here" name="product_description">
                </label>
                <fieldset class="upload-area" id="upload-area">
                    <span class="upload-area-icon" id="upload-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="340.531" height="419.116" viewBox="0 0 340.531 419.116">
                            <g id="files-new" clip-path="url(#clip-files-new)">
                                <path id="Union_2" data-name="Union 2" d="M-2904.708-8.885A39.292,39.292,0,0,1-2944-48.177V-388.708A39.292,39.292,0,0,1-2904.708-428h209.558a13.1,13.1,0,0,1,9.3,3.8l78.584,78.584a13.1,13.1,0,0,1,3.8,9.3V-48.177a39.292,39.292,0,0,1-39.292,39.292Zm-13.1-379.823V-48.177a13.1,13.1,0,0,0,13.1,13.1h261.947a13.1,13.1,0,0,0,13.1-13.1V-323.221h-52.39a26.2,26.2,0,0,1-26.194-26.195v-52.39h-196.46A13.1,13.1,0,0,0-2917.805-388.708Zm146.5,241.621a14.269,14.269,0,0,1-7.883-12.758v-19.113h-68.841c-7.869,0-7.87-47.619,0-47.619h68.842v-18.8a14.271,14.271,0,0,1,7.882-12.758,14.239,14.239,0,0,1,14.925,1.354l57.019,42.764c.242.185.328.485.555.671a13.9,13.9,0,0,1,2.751,3.292,14.57,14.57,0,0,1,.984,1.454,14.114,14.114,0,0,1,1.411,5.987,14.006,14.006,0,0,1-1.411,5.973,14.653,14.653,0,0,1-.984,1.468,13.9,13.9,0,0,1-2.751,3.293c-.228.2-.313.485-.555.671l-57.019,42.764a14.26,14.26,0,0,1-8.558,2.847A14.326,14.326,0,0,1-2771.3-147.087Z" transform="translate(2944 428)" fill="var(--c-action-primary)"/>
                            </g>
                        </svg>
                    </span>
                
                    <span class="upload-area-title" id="upload-title">Drag file(s) here to upload.</span>
                    <span class="upload-area-description" id="upload-description">Alternatively, you can select a file by <strong>clicking here</strong></span>
                    <input type="file" id="file-input" hidden multiple name="image">
                    <div id="preview-container" style="margin-top: 20px; display: flex; gap: 10px; flex-wrap: wrap;"></div>
                </fieldset>

                <div class="modal-footer">
                    <a class="btn-secondary" id="cancel-button" href="{{route('MyProducts')}}">Cancel</a>
                    <button class="btn-primary" type="submit" id="upload-button">Add Product</button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        const uploadArea = document.querySelector('#upload-area');
        const fileInput = document.querySelector('#file-input');
        const previewContainer = document.querySelector('#preview-container');
        const uploadTitle = document.querySelector('#upload-title');
        const uploadDescription = document.querySelector('#upload-description');
        const uploadIcon = document.querySelector('#upload-icon');

        let selectedFiles = []; // Array untuk nyimpan file

        // Drag-and-drop function
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

        // Click detector, upload area
        uploadArea.addEventListener('click', () => {
            fileInput.click();
        });

        // change detector, upload area
        fileInput.addEventListener('change', (e) => {
            const files = Array.from(e.target.files);
            handleFiles(files);
        });

        // Upload button function
        document.querySelector('#upload-button').addEventListener('click', () => {
            if (selectedFiles.length === 0) {
                alert('No files selected for upload.');
                return;
            }

            selectedFiles.forEach((file) => {
                console.log(`Uploading file: ${file.name}, Size: ${file.size} bytes, Type: ${file.type}`);
            });

            alert('Files uploaded successfully!');
            resetUploadArea();
        });

        // Cancel button function, activate function resetUploadArea()
        document.querySelector('#cancel-button').addEventListener('click', () => {
            resetUploadArea();
        });

        const allowedFileTypes = [
            'image/jpeg',
            'image/png',
            'image/gif',
            'video/mp4',
            'video/avi',
            'video/mpeg',
            'video/quicktime',
            'video/wmv'
        ];
        const maxFiles = 1;

        function handleFiles(files) {
            if (selectedFiles.length + files.length > maxFiles) {
                alert(`You can only upload ${maxFiles} file. Please remove some files before adding new ones.`);
                return;
            }

            files.forEach((file) => {
                if (allowedFileTypes.includes(file.type)) {
                    if (file.type.startsWith('image/')) {
                        const reader = new FileReader();
                        reader.onload = (e) => {
                            // Preview image
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            img.alt = file.name;
                            img.style.maxWidth = '300px';
                            img.style.maxHeight = '150px';
                            img.style.objectFit = 'cover';
                            img.style.border = '1px solid #ccc';
                            img.style.borderRadius = '5px';
                            img.style.marginRight = '10px';

                            // Add image to the preview container
                            previewContainer.appendChild(img);
                        };
                        reader.readAsDataURL(file); // Read image file
                    } else if (file.type.startsWith('video/')) {
                        // Preview Video thumbnail
                        const video = document.createElement('video');
                        video.src = URL.createObjectURL(file);
                        video.controls = true;
                        video.style.maxWidth = '100px';
                        video.style.maxHeight = '80px';
                        video.style.marginRight = '10px';

                        // Add video to the preview container
                        previewContainer.appendChild(video);
                    }

                    // Add file to the selectedFiles array
                    selectedFiles.push(file);
                } else {
                    alert(`Unsupported file type: ${file.name}`);
                }
            });

            // Hide the upload instructions if files are added
            if (selectedFiles.length > 0) {
                uploadTitle.style.display = 'none';
                uploadDescription.style.display = 'none';
                uploadIcon.style.display = 'none';
            }
        }

        // Function to reset upload area for every interaction
        function resetUploadArea() {
            // Re-display the upload instructions
            uploadTitle.style.display = 'block';
            uploadDescription.style.display = 'block';
            uploadIcon.style.display = 'block';

            // Clear previews and reset the selected files
            previewContainer.innerHTML = '';
            selectedFiles = [];
        }
    </script>
</body>
</html>