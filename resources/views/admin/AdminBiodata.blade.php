<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Account Settings</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="row gutters">
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
            <div class="card h-100 profile-card" style="margin-left: 18rem">
                <div class="card-body">
                    <div class="row gutters">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <h4 id="lead-text">Personal Details</h4>
                                <div class="form-group" style="width: 20vw">
                                    <label for="fullName" class="font-title-inputform">Full Name</label>
                                    <input type="text" class="input-form" name="name" placeholder="Enter full name" value="Admin" readonly>
                                <div class="form-group">
                                    <label for="eMail" class="font-title-inputform">Email</label>
                                    <input type="email" class="input-form" name="email" placeholder="Enter email" value="{{ Auth::user()->email }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="font-title-inputform">Phone</label>
                                    <input type="text" class="input-form" name="phone_number" placeholder="Enter phone number" value="0811 1111 1111" readonly>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>


<script>
// Define the resetFormArea function outside event listeners
function resetFormArea() {
    const fullNameInput = document.querySelector('#fullName');
    const emailInput = document.querySelector('#eMail');
    const phoneInput = document.querySelector('#phone');
    const websiteInput = document.querySelector('#website');

    // Clear input field values
    fullNameInput.value = '';
    emailInput.value = '';
    phoneInput.value = '';
    websiteInput.value = '';
}

// Event listener for the Back button
document.getElementById('backButton').addEventListener('click', function () {
    // Redirect to profile page
    window.location.href = 'profile.html'; // Replace 'profile.html' with the correct URL
    resetFormArea(); // Reset the form when navigating back
});

// Event listener for the Update button
document.getElementById('updateButton').addEventListener('click', function () {
    // Get form values
    const fullName = document.getElementById('fullName').value.trim();
    const email = document.getElementById('eMail').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const website = document.getElementById('website').value.trim();

    // Validate form fields
    if (fullName && email && phone && website) {
        // Create an object with the user details
        const userDetails = {
            name: fullName,
            email: email,
            phone: phone,
            website: website
        };

        // Log the details
        console.log(`Uploading details: Name: ${userDetails.name}, Email: ${userDetails.email}, Phone: ${userDetails.phone}, Website: ${userDetails.website}`);

        // Alert success
        alert('Profile update succeeded');

        // Reset the form
        resetFormArea();
    } else {
        // Alert failure if any field is empty
        alert('Profile update failed, please ensure the data is filled correctly');
    }
});
</script>


<style>
:root {
    --c-action-primary: #2e44ff;
    --c-action-secondary: #e5e5e5;
    --c-text-primary: #0d0f21;
    --c-text-secondary: #eeeeee;
    --c-background-primary: #d0d1de;
}

body {
    background-color: var(--c-background-primary);
    margin: 0;
}

.profile-card {
    background-color: #4369c1;
    border-radius: 0.5rem;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    padding: 1rem;
    color: var(--c-text-secondary);
    justify-content: center;
    display: flex
}

.user-avatar{
    display: flex;
    justify-content: center;
}

.user-avatar img {
    width: 10rem;
    height: 10rem;
    border-radius: 50%;
    border: 2px solid var(--c-text-secondary);
}

.account-settings .about h5 {
    margin: 1rem 0 0.5rem;
}


.input-form {
    min-width: 150%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: var(--c-text-secondary);
    color: #333;
}

.font-title-inputform {
    font-size: 0.9rem;
    color: var(--c-text-secondary);
    margin-bottom: 0.5rem;
}

.btn-secondary, .btn-primary {
    padding: 0.5rem 1rem;
    border-radius: 0.25rem;
    border: 2px solid var(--c-action-secondary);
    background-color: #3577d8;
    color: var(--c-text-secondary);
    transition: background-color 0.4s;
}

.btn-secondary:hover, .btn-primary:hover {
    background-color: #e5d630;
}
</style>
</body>
</html>
