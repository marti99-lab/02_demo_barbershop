<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book an Appointment</title>
  <link rel="stylesheet" href="styles/calendar.css">
  <link rel="stylesheet" href="styles/main.css">
  <link rel="stylesheet" href="styles/menu.css">
</head>
<body>
<?php include 'frontend/components/menu.php'; ?>

  <div class="form-wrapper">
    <h2 id="headline">Book an Appointment</h2>
    <h3>Shop is open from Monday to Friday, 09:00 till 18:00</h3>

    <form id="bookingForm" method="POST" action="../backend/booking/create_appointment.php">
      <label for="date">Select Date:</label>
      <input type="date" id="date" name="date" required><br><br>
      
      <label for="time">Select Time:</label>
      <select id="time" name="time" required></select><br><br>
      
      <button type="submit">Book Appointment</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
        const dateInput = document.getElementById('date');
        const timeSelect = document.getElementById('time');
        // Get today's date in YYYY-MM-DD format
        const today = new Date().toISOString().split('T')[0]; 
        // Set the minimum date to today
        dateInput.setAttribute('min', today); 

        dateInput.addEventListener('change', () => {
            const date = dateInput.value;
            const dayOfWeek = new Date(date).getDay();
            // Clear existing options
            timeSelect.innerHTML = ''; 

            // Only proceed if the selected date is Monday to Friday
            if (dayOfWeek >= 1 && dayOfWeek <= 5) {
                fetchAvailableTimes(date);
            } else {
                alert('Please select a weekday (Monday to Friday).');
            }
        });

        function fetchAvailableTimes(date) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "../backend/booking/available_times.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const availableTimes = JSON.parse(xhr.responseText);
                    const startHour = 9;
                    const endHour = 18;

                    for (let hour = startHour; hour < endHour; hour++) {
                        const timeSlot = hour.toString().padStart(2, '0') + ':00';
                        if (!availableTimes.includes(timeSlot)) {
                            const option = document.createElement('option');
                            option.value = timeSlot;
                            option.textContent = timeSlot;
                            timeSelect.appendChild(option);
                        }
                    }

                    if (timeSelect.options.length === 0) {
                        const option = document.createElement('option');
                        option.textContent = 'No available times';
                        option.disabled = true;
                        timeSelect.appendChild(option);
                    }
                }
            };
            xhr.send(`date=${date}`);
        }
    });
  </script>
</body>
</html>
