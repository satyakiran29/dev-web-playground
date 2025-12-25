<!DOCTYPE html>
<html>
<head>
  <title>Simple Interest Calculator</title>
  <link rel="stylesheet" href="ss.css">
</head>


  <?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<style>body {
  font-family: "Segoe UI", Tahoma, Arial, sans-serif;
  background: #f4f6f8;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0;
}

.form-container {
  background: #ffffff;
  padding: 28px 32px;
  border-radius: 14px;
  width: 380px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
}

h2 {
  text-align: center;
  margin-bottom: 20px;
  color: #222;
}

.sic-container {
  border: 1px solid #ccc;
  border-radius: 10px;
  padding: 16px;
  margin-bottom: 18px;
}

legend {
  padding: 0 8px;
  font-weight: 600;
  color: #333;
}

.input-left-container,
.input-right-container {
  display: inline-block;
  vertical-align: top;
}

.input-left-container {
  width: 48%;
  color: #444;
  font-size: 14px;
}

.input-left-container span {
  display: block;
  margin: 12px 0;
}

.input-right-container {
  width: 48%;
}

.input-right-container input {
  width: 100%;
  padding: 8px 10px;
  margin: 6px 0;
  border-radius: 6px;
  border: 1px solid #bbb;
  font-size: 14px;
}

.input-right-container input:focus {
  border-color: #4b0082;
  outline: none;
}

button {
  width: 100%;
  padding: 12px;
  background: #4b0082;
  color: #fff;
  font-size: 15px;
  font-weight: 600;
  border: none;
  border-radius: 10px;
  cursor: pointer;
  transition: background 0.3s ease;
}

button:hover {
  background: #36005d;
}
</style>

<form class="form-container" onsubmit="calculate(event)">
  <fieldset class="sic-container">
    <legend>Simple Interest Calculation</legend>

    <div class="input-left-container">
      <span>Enter Principal</span><br>
      <span>Enter Time in Days</span><br>
      <span>Enter Rate of Interest</span>
    </div>

    <div class="input-right-container">
      : <input type="number" id="principal" placeholder="Enter principal"><br>
      : <input type="number" id="time" placeholder="Enter time"><br>
      : <input type="number" id="roi" placeholder="Enter Rate of Interest"><br>
    </div>
  </fieldset>

  <button type="submit">Calculate</button>
</form>

<script>
function calculate(event) {
  event.preventDefault(); // stop form reload

  const principal = parseFloat(document.getElementById("principal").value);
  const timeDays = parseFloat(document.getElementById("time").value);
  const roi = parseFloat(document.getElementById("roi").value);

  if (!principal || !timeDays || !roi) {
    alert("Please fill all fields");
    return;
  }

  if (principal < 1000) {
    alert("Principal must be at least 1000");
    return;
  }

  const timeMonths = timeDays / 30;
  const interest = (principal * timeMonths * roi) / 100;
  const total = principal + interest;

  // Redirect to result page
  window.location.href =
    `result.html?principal=${principal}&time=${timeMonths}&roi=${roi}&interest=${interest}&total=${total}`;
}
</script>

  

  </body>
</html>
