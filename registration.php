<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        .container {
            padding: 20px;
            background: #f4f4f4;
            border-radius: 10px;
        }
        .top-buttons-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
            padding: 10px;
            background: #ddd;
            border-radius: 10px;
        }
        .top-buttons button {
            padding: 10px 40px;
            border: none;
            border-radius: 20px;
            background: white;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: 0.3s;
            font-size: 16px;
            margin: 0 5px;
        }
        .top-buttons button:hover, .top-buttons button.active {
            background: gray;
            color: white;
        }
        .content-section {
            display: none;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table, .table th, .table td {
            border: 1px solid #ddd;
        }
        .table th, .table td {
            padding: 10px;
            text-align: left;
        }
        .bottom-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
        }
        .bottom-controls input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .bottom-controls button {
            padding: 10px 15px;
            border: none;
            border-radius: 10px;
            background: white;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            transition: 0.3s;
        }
        .bottom-controls button:hover {
            background: gray;
            color: white;
        }
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            display: flex;
            justify-content: flex-start;
            align-items: center;
            padding-left: 250px;
        }
        .modal-content {
            background-color: #fff;
            color: #000;
            width: 400px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            position: relative;
            left: 50%;
            top: 10%;
            transform: translate(-50%, 10%);
        }
        .modal input, .modal select {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border: 1px solid #000;
            border-radius: 5px;
            background-color: #fff;
            color: #000;
        }
        .modal button {
            width: 100%;
            background-color: #000;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .modal button:hover {
            background-color: #333;
        }
        .close {
            float: right;
            cursor: pointer;
        }
    </style>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        // Section Navigation
        const buttons = document.querySelectorAll('.top-buttons button');
        const sections = document.querySelectorAll('.content-section');

        function showSection(sectionId) {
            sections.forEach(section => section.style.display = 'none');
            document.getElementById(sectionId)?.style.display = 'block';

            buttons.forEach(button => button.classList.remove('active'));
            document.querySelector(`button[data-section="${sectionId}"]`)?.classList.add('active');
        }

        buttons.forEach(button => {
            button.addEventListener("click", function () {
                showSection(this.getAttribute("data-section"));
            });
        });

        if (buttons.length > 0) {
            showSection(buttons[0].getAttribute("data-section"));
        }

        // Modal Handling
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = "block";
            }
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            if (modal) {
                modal.style.display = "none";
            }
        }

        // Close modals when clicking outside of them
        window.addEventListener("click", function (event) {
            document.querySelectorAll(".modal").forEach(modal => {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            });
        });

        // Attach event listeners to close buttons
        document.querySelectorAll(".close").forEach(closeBtn => {
            closeBtn.addEventListener("click", function () {
                const modal = this.closest(".modal");
                if (modal) modal.style.display = "none";
            });
        });

        // Attach event listeners to buttons for opening modals
        document.querySelectorAll("[data-modal]").forEach(button => {
            button.addEventListener("click", function () {
                openModal(this.getAttribute("data-modal"));
            });
        });
    });
</script>


</head>
<body>
    <div class="container">
        <div class="top-buttons-container">
            <div class="top-buttons">
                <button data-section="vehicle-section">Vehicle</button>
                <button data-section="employee-section">Employee</button>
                <button data-section="drivers-section">Driver</button>
            </div>
        </div>

        <div id="vehicle-section" class="content-section">
        <table class="table">
                <tr>
                    <th>Vehicle ID</th>
                    <th>Vehicle Type</th>
                    <th>Plate No.</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Yr. of Manuf.</th>
                    <th>Seating Cap.</th>
                    <th>Price</th>
                    <th>Driver</th>
                    <th>Added by</th>
                    <th>Date added</th>
                    <th>Status</th>
                </tr>
                <?php
                $sql = "SELECT * FROM vehicles";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['vehicle_id']}</td>
                                <td>{$row['vehicle_type']}</td>
                                <td>{$row['plate_no']}</td>
                                <td>{$row['brand']}</td>
                                <td>{$row['model']}</td>
                                <td>{$row['year_of_manufacture']}</td>
                                <td>{$row['seating_capacity']}</td>
                                <td>{$row['price']}</td>
                                <td>{$row['driver']}</td>
                                <td>{$row['added_by']}</td>
                                <td>{$row['date_added']}</td>
                                <td>{$row['status']}</td>
                              </tr>";
                    }
                }
                ?>
            </table>
            <div class="bottom-controls">
                <input type="text" placeholder="Search Vehicle">
                <button>Enter</button>
                <button onclick="openModal('VehicleAddModal')">Add</button>
                <button onclick="openModal('VehicleEditModal')">Edit</button>
                <button>Deactivate</button>
            </div>
        </div>
        
        <div id="employee-section" class="content-section">
        <table class="table">
                <tr>
                    <th>Employee ID</th>
                    <th>Full Name</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Role</th>
                    <th>Password</th>
                    <th>Salary</th>
                    <th>Added By</th>
                    <th>Date Added</th>
                    <th>Status</th>
                </tr>
                <?php
                $sql = "SELECT * FROM employees";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['employee_id']}</td>
                                <td>{$row['full_name']}</td>
                                <td>{$row['contact_no']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['role']}</td>
                                <td>{$row['password']}</td>
                                <td>{$row['salary']}</td>
                                <td>{$row['added_by']}</td>
                                <td>{$row['date_added']}</td>
                                <td>{$row['status']}</td>
                              </tr>";
                    }
                }
                ?>
            </table>
            <div class="bottom-controls">
                <input type="text" placeholder="Search Employee">
                <button>Enter</button>
                <button onclick="openModal('EmployeeAddModal')">Add</button>
                <button onclick="openModal('EmployeeEditModal')">Edit</button>
                <button>Deactivate</button>
            </div>
        </div>
        
        <div id="drivers-section" class="content-section">
        <table class="table">
                <tr>
                    <th>Driver ID</th>
                    <th>Full Name</th>
                    <th>Contact No.</th>
                    <th>Address</th>
                    <th>License No.</th>
                    <th>Years of Experience</th>
                    <th>Commission Rate</th>
                    <th>Added By</th>
                    <th>Date Added</th>
                    <th>Status</th>
                </tr>
                <?php
                $sql = "SELECT * FROM drivers";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['driver_id']}</td>
                                <td>{$row['full_name']}</td>
                                <td>{$row['contact_no']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['license_no']}</td>
                                <td>{$row['years_of_experience']}</td>
                                <td>{$row['commission_rate']}</td>
                                <td>{$row['added_by']}</td>
                                <td>{$row['date_added']}</td>
                                <td>{$row['status']}</td>
                              </tr>";
                    }
                }
                ?>
            </table>
            <div class="bottom-controls">
                <input type="text" placeholder="Search Driver">
                <button>Enter</button>
                <button onclick="openModal('DriverAddModal')">Add</button>
                <button onclick="openModal('DriverEditModal')">Edit</button>
                <button>Deactivate</button>
            </div>
        </div>
    </div>
    <div id="VehicleAddModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('VehicleAddModal')">&times;</span>
            <h2>Add Vehicle</h2>
            <form>
                <input type="text" placeholder="Vehicle Type" required>
                <input type="text" placeholder="Plate No." required>
                <input type="text" placeholder="Brand" required>
                <input type="text" placeholder="Model" required>
                <input type="number" placeholder="Year of Manufacture" required>
                <input type="number" placeholder="Seating Capacity" required>
                <input type="number" placeholder="Price" required>
                <input type="text" placeholder="Driver" required>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <!-- Vehicle Edit Modal -->
    <div id="VehicleEditModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('VehicleEditModal')">&times;</span>
            <h2>Edit Vehicle</h2>
            <form>
                <input type="text" placeholder="Vehicle Type" required>
                <input type="text" placeholder="Plate No." required>
                <input type="text" placeholder="Brand" required>
                <input type="text" placeholder="Model" required>
                <input type="number" placeholder="Year of Manufacture" required>
                <input type="number" placeholder="Seating Capacity" required>
                <input type="number" placeholder="Price" required>
                <input type="text" placeholder="Driver" required>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>

    <!-- Employee Add Modal -->
    <div id="EmployeeAddModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('EmployeeAddModal')">&times;</span>
            <h2>Add Employee</h2>
            <form>
                <input type="text" placeholder="Full Name" required>
                <input type="text" placeholder="Contact No." required>
                <input type="email" placeholder="Email" required>
                <input type="text" placeholder="Address" required>
                <input type="text" placeholder="Role" required>
                <input type="password" placeholder="Password" required>
                <input type="number" placeholder="Salary" required>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <!-- Employee Edit Modal -->
    <div id="EmployeeEditModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('EmployeeEditModal')">&times;</span>
            <h2>Edit Employee</h2>
            <form>
                <input type="text" placeholder="Full Name" required>
                <input type="text" placeholder="Contact No." required>
                <input type="email" placeholder="Email" required>
                <input type="text" placeholder="Address" required>
                <input type="text" placeholder="Role" required>
                <input type="password" placeholder="Password" required>
                <input type="number" placeholder="Salary" required>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>

    <!-- Driver Add Modal -->
    <div id="DriverAddModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('DriverAddModal')">&times;</span>
            <h2>Add Driver</h2>
            <form>
                <input type="text" placeholder="Full Name" required>
                <input type="text" placeholder="Contact No." required>
                <input type="text" placeholder="Address" required>
                <input type="text" placeholder="License No." required>
                <input type="number" placeholder="Years of Experience" required>
                <input type="number" placeholder="Commission Rate" required>
                <button type="submit">Save</button>
            </form>
        </div>
    </div>

    <!-- Driver Edit Modal -->
    <div id="DriverEditModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('DriverEditModal')">&times;</span>
            <h2>Edit Driver</h2>
            <form>
                <input type="text" placeholder="Full Name" required>
                <input type="text" placeholder="Contact No." required>
                <input type="text" placeholder="Address" required>
                <input type="text" placeholder="License No." required>
                <input type="number" placeholder="Years of Experience" required>
                <input type="number" placeholder="Commission Rate" required>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
