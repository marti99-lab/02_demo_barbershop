<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="styles/main.css">
  <link rel="stylesheet" href="styles/menu.css">
</head>
<body>

<?php include 'frontend/components/menu.php'; ?>

  <div class="content">
    <h2 id="headline">Appointments</h2>
    <table id="appointmentsTable">
      <thead>
        <tr>
          <th>Date</th>
          <th>Time</th>
          <th>Booked By</th>
          <th id="th-2">Actions</th>
        </tr>
      </thead>
      <tbody id="appointmentsBody">
      </tbody>
    </table>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      fetchAppointments();
    });

    function fetchAppointments() {
      const xhr = new XMLHttpRequest();
      xhr.open("GET", "../backend/booking/get_appointments.php", true);
      xhr.onload = function() {
        if (xhr.status === 200) {
          const appointments = JSON.parse(xhr.responseText);
          const appointmentsBody = document.getElementById('appointmentsBody');
          appointmentsBody.innerHTML = ''; 

          if (appointments.length > 0) {
            appointments.forEach(function(appointment, index) {
              const row = document.createElement('tr');

              // using different color on every 2nd entry
              if (index % 2 === 1) {
                row.style.backgroundColor = '#91dbfd';
              }

              const dateCell = document.createElement('td');
              dateCell.textContent = appointment.date;
              row.appendChild(dateCell);

              const timeCell = document.createElement('td');
              timeCell.textContent = appointment.time;
              row.appendChild(timeCell);

              const usernameCell = document.createElement('td');
              usernameCell.textContent = appointment.username;
              row.appendChild(usernameCell);

              const actionCell = document.createElement('td');
              if (appointment.user_id == <?php echo $_SESSION['user_id']; ?>) {
                const deleteButton = document.createElement('button');
                deleteButton.textContent = 'Cancel';
                deleteButton.onclick = function() {
                  cancelAppointment(appointment.id);
                };
                actionCell.appendChild(deleteButton);
              } else {
                actionCell.textContent = '';  
              }
              row.appendChild(actionCell);

              appointmentsBody.appendChild(row);
            });
          } else {
            const row = document.createElement('tr');
            const noAppointments = document.createElement('td');
            noAppointments.textContent = "No appointments found.";
            noAppointments.colSpan = 4;
            row.appendChild(noAppointments);
            appointmentsBody.appendChild(row);
          }
        } else {
          console.error("Failed to fetch appointments.");
        }
      };
      xhr.send();
    }

    function cancelAppointment(appointmentId) {
      if (confirm("Are you sure you want to cancel this appointment?")) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "../backend/booking/cancel_appointment.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
          if (xhr.status === 200) {
            fetchAppointments(); 
          } else {
            console.error("Failed to cancel appointment.");
          }
        };
        xhr.send(`id=${appointmentId}`);
      }
    }
  </script>
</body>
</html>
