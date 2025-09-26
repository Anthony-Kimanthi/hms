<?php
// db.php include ready for later
// include 'db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital Management System</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    body {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    .topbar {
      background-color: #0d6efd;
      color: white;
      padding: 10px 20px;
    }
    .sidebar {
      min-height: calc(100vh - 56px); /* subtract topbar height */
      background-color: #343a40;
      color: white;
      padding-top: 20px;
    }
    .sidebar a {
      color: #ccc;
      display: block;
      padding: 10px 15px;
      text-decoration: none;
    }
    .sidebar a:hover, .sidebar a.active {
      background-color: #495057;
      color: #fff;
    }
    .content {
      padding: 20px;
      flex-grow: 1;
    }
  </style>
</head>
<body>
  <!-- Top Bar -->
  <nav class="navbar navbar-expand-lg topbar">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-white">🏥 Hospital Management System</span>
      <div class="d-flex">
        <span class="me-3">Hello, Admin</span>
        <button class="btn btn-outline-light btn-sm">Logout</button>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <nav class="col-md-3 col-lg-2 sidebar">
        <h5 class="px-3">Modules</h5>
        <a href="#" class="active">🏠 Dashboard</a>
        <a href="#">🔍 Search / Register Patients</a>
        <a href="#">💳 Billing</a>
        <a href="#">🩺 Triage</a>
        <a href="#">💊 Pharmacy</a>
      </nav>

      <!-- Main content -->
      <main class="col-md-9 col-lg-10 content">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2>Welcome to Hospital Management System</h2>
        </div>
        <p>Select a module from the left to get started.</p>
      </main>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

