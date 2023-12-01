<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student ID Generator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            text-align: center;
        }

        h2 {
            color: #333;
        }

        .form-container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .form-label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
            color: #555;
        }

        .form-input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-select {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-button {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <h2>Student ID Generator</h2>

    <form action="http://faithacademy.local/generateID" method="get" class="form-container">
        <label for="firstName" class="form-label">First Name:</label>
        <input type="text" id="firstName" name="firstName" required class="form-input"><br>

        <label for="lastName" class="form-label">Last Name:</label>
        <input type="text" id="lastName" name="lastName" required class="form-input"><br>

        <label for="year" class="form-label">Pin Generated:</label>
        <input type="text" id="year" name="year" required class="form-input" readonly><br>

        <button type="button" class="form-button" onclick="generateID()">Generate ID</button>
    </form>

    <script>
        const generatedNames = [];

        function generateRandomString(length) {
            const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            let randomString = '';

            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * characters.length);
                randomString += characters.charAt(randomIndex);
            }

            return randomString;
        }

        function isNameGenerated(firstName, lastName) {
            return generatedNames.includes(firstName + lastName);
        }

        function generateID() {
            let firstNameValue = document.querySelector('#firstName').value;
            let lastNameValue = document.querySelector('#lastName').value;

            // Check if the name combination has been generated before
            if (isNameGenerated(firstNameValue, lastNameValue)) {
                alert('This name combination has already been used. Please enter different names.');
                return;
            }

            let randomString = generateRandomString(7); // Adjust the length to 7

            let generatedID = firstNameValue.substr(0, 3) + lastNameValue.substr(0, 3) + randomString;

            // Replace the content of the "Year of Admission" field with the generated ID
            document.querySelector('#year').value = generatedID;

            // Add the generated name combination to the list
            generatedNames.push(firstNameValue + lastNameValue);
        }
    </script>

</body>

</html>