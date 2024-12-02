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
                <label>
                    <h2 class="Font-Title-InputForm">Product Name</h2>
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
                <div class="upload-area" id="upload-area">
                    <span class="upload-area-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="340.531" height="419.116" viewBox="0 0 340.531 419.116">
                            <g id="files-new" clip-path="url(#clip-files-new)">
                                <path id="Union_2" data-name="Union 2" d="M-2904.708-8.885A39.292,39.292,0,0,1-2944-48.177V-388.708A39.292,39.292,0,0,1-2904.708-428h209.558a13.1,13.1,0,0,1,9.3,3.8l78.584,78.584a13.1,13.1,0,0,1,3.8,9.3V-48.177a39.292,39.292,0,0,1-39.292,39.292Zm-13.1-379.823V-48.177a13.1,13.1,0,0,0,13.1,13.1h261.947a13.1,13.1,0,0,0,13.1-13.1V-323.221h-52.39a26.2,26.2,0,0,1-26.194-26.195v-52.39h-196.46A13.1,13.1,0,0,0-2917.805-388.708Zm146.5,241.621a14.269,14.269,0,0,1-7.883-12.758v-19.113h-68.841c-7.869,0-7.87-47.619,0-47.619h68.842v-18.8a14.271,14.271,0,0,1,7.882-12.758,14.239,14.239,0,0,1,14.925,1.354l57.019,42.764c.242.185.328.485.555.671a13.9,13.9,0,0,1,2.751,3.292,14.57,14.57,0,0,1,.984,1.454,14.114,14.114,0,0,1,1.411,5.987,14.006,14.006,0,0,1-1.411,5.973,14.653,14.653,0,0,1-.984,1.468,13.9,13.9,0,0,1-2.751,3.293c-.228.2-.313.485-.555.671l-57.019,42.764a14.26,14.26,0,0,1-8.558,2.847A14.326,14.326,0,0,1-2771.3-147.087Z" transform="translate(2944 428)" fill="var(--c-action-primary)"/>
                            </g>
                        </svg>
                    </span>
                
                    <span class="upload-area-title">Drag file(s) here to upload.</span>
                    <span class="upload-area-description">Alternatively, you can select a file by <strong>clicking here</strong></span>
                    <input type="file" id="file-input" hidden multiple name="image">
                </div>

                <div class="modal-footer">
                    <button class="btn-secondary">Cancel</button>
                    <button class="btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="js/uploadProductForm.js"></script>
</body>
</html>