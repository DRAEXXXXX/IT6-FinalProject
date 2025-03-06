<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: black;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 20px;
            justify-content: space-between;
        }

        .logo {
            width: 150px;
            height: 100px;
            background: white;
            margin-bottom: 20px;
        }

        .nav-buttons {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .nav-button {
            width: 90%;
            padding: 8px;
            margin: 5px 0 20px;
            background: white;
            color: black;
            cursor: pointer;
            transition: 0.3s;
            font-size: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px rgba(125, 125, 125, 0.2);
            text-align: center;
        }

        .nav-button:hover {
            background: gray;
        }

        .logout-button {
            width: 90%;
            padding: 12px;
            margin-bottom: 20px;
            background: red;
            color: white;
            border: none;
            cursor: pointer;
            transition: 0.3s;
            font-size: 16px;
            border-radius: 25px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .logout-button:hover {
            background: darkred;
        }

        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f4f4f4;
        }

        .card-panel {
            width: 95%;
            height: 95%;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            overflow-y: auto;
            border-radius: 10px;
        }
    </style>
    <script>
        function loadContent(page) {
            fetch(page)
                .then(response => response.text())
                .then(data => {
                    document.getElementById('card-panel').innerHTML = data;
                    if (page === 'registration.php') {
                        attachRegistrationListeners();
                    }
                    attachModalListeners();
                })
                .catch(error => console.log(error));
        }

        function attachRegistrationListeners() {
            const buttons = document.querySelectorAll('.top-buttons button');
            const sections = document.querySelectorAll('.content-section');

            function showSection(sectionId) {
                sections.forEach(section => section.style.display = 'none');
                document.getElementById(sectionId).style.display = 'block';
                buttons.forEach(button => button.classList.remove('active'));
                document.querySelector(`button[data-section="${sectionId}"]`).classList.add('active');
            }

            buttons.forEach(button => {
                button.addEventListener("click", function () {
                    showSection(this.getAttribute("data-section"));
                });
            });

            if (buttons.length > 0) {
                showSection(buttons[0].getAttribute("data-section"));
            }
        }

        function attachModalListeners() {
            document.querySelectorAll(".modal").forEach(modal => {
                modal.style.display = "none";
            });

            document.querySelectorAll(".close").forEach(closeBtn => {
                closeBtn.addEventListener("click", function () {
                    closeBtn.closest(".modal").style.display = "none";
                });
            });

            window.addEventListener("click", function (event) {
                document.querySelectorAll(".modal").forEach(modal => {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                });
            });
        }

        function openModal(modalId) {
            document.getElementById(modalId).style.display = "block";
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
        }
    </script>
</head>
<body>
    <div class="sidebar">
        <div>
            <div class="logo"></div>
            <div class="nav-buttons">
                <button class="nav-button" onclick="loadContent('booking.php')">BOOKING</button>
                <button class="nav-button" onclick="loadContent('currently_booked.php')">CURRENTLY BOOKED</button>
                <button class="nav-button" onclick="loadContent('payment.php')">PAYMENT</button>
                <button class="nav-button" onclick="loadContent('maintenance.php')">MAINTENANCE</button>
                <button class="nav-button" onclick="loadContent('registration.php')">REGISTRATION</button>
            </div>
        </div>
        <button class="logout-button" onclick="loadContent('logout.php')">LOGOUT</button>
    </div>
    <div class="main-content">
        <div class="card-panel" id="card-panel">
            <h2>Welcome!</h2>
            <p>Select an option from the sidebar.</p>
        </div>
    </div>
</body>
</html>