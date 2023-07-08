<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pabustan Birthing Clinic-</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script> 
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
</head>

<body>
  @include('navbar')
  </div>
          <div id="layoutSidenav_content">
            <div class="container">
            <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="tab" href="#items">Items</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#services">Services</a>
    </li>
    
  </ul>

  <div class="container">
    <div class="tab-content">
      <div class="tab-pane fade show active" id="items">
        <h1>Items</h1>

        <!-- Add Form -->
        <form id="addItemForm" class="mb-4">
          <h2>Add Item</h2>
          <div class="row g-3">
            <div class="col-md-4">
              <label for="itemName" class="form-label">Item Name</label>
              <input type="text" class="form-control" id="itemName" required>
            </div>
            <div class="col-md-4">
              <label for="itemType" class="form-label">Item Type</label>
              <input type="text" class="form-control" id="itemType" required>
            </div>
            <div class="col-md-4">
              <label for="itemPrice" class="form-label">Item Price</label>
              <input type="number" class="form-control" id="itemPrice" required>
            </div>
          </div>
          <button type="submit" class="btn btn-primary mt-3">Add</button>
        </form>

        <!-- Item List -->
        <table class="table">
          <thead>
            <tr>
              <th>Item Name</th>
              <th>Item Type</th>
              <th>Item Price</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="itemList">
            <!-- Items will be dynamically added here -->
          </tbody>
        </table>
      </div>

      <div class="tab-pane fade" id="services">
        <form id="services" class="mb-4">
      <h2>Services</h2>
      <div class="row g-3">
        <div class="col-md-4">
          <label for="itemName" class="form-label">Item Name</label>
          <input type="text" class="form-control" id="itemName" required>
        </div>
        <div class="col-md-4">
          <label for="itemType" class="form-label">Item Type</label>
          <input type="text" class="form-control" id="itemType" required>
        </div>
        <div class="col-md-4">
          <label for="itemPrice" class="form-label">Item Price</label>
          <input type="number" class="form-control" id="itemPrice" required>
        </div>
      </div>
      <button type="submit" class="btn btn-primary mt-3">Add</button>
    </form>

    <!-- Item List -->
    <table class="table">
      <thead>
        <tr>
          <th>Item Name</th>
          <th>Item Type</th>
          <th>Item Price</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody id="itemList">
        <!-- Items will be dynamically added here -->
      </tbody>
    </table>
      </div>

      <div class="tab-pane fade" id="sched">
        <!-- Content for the Schedule tab -->
      </div>
    </div>
  </div>
            </div>
            </div>
 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    
    </body>
</html>