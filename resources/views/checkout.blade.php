<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pabustan Birthing Clinic</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <style>
        /* .scrollable-div {
            height: 200px;

        } */

        .containerss{
            margin: 20px;
            height: 1000px;
            overflow-y: scroll;
        }
        .container-table {
            margin: 20px;
            height: 1000px;
            
        }

        /* .item {
            margin: 10px 0;
        } */

        @media screen and (max-width: 992px) {
            .container {
                height: auto;
                overflow-y: visible;
            }

            .scrollable-div {
                height: auto;
                overflow-y: visible;
            }
        }
    </style>
    <body class="sb-nav-fixed">
        @include('navbar')
        </div>
            <div id="layoutSidenav_content">
                <main class="mw-100">
                <div class="container-fluid">

        <div class="row col-12">
        
                <div class="scrollable-div containerss col-md-2">
                    <h2>Select Items:</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Gloves</h5>
                                    <p class="card-text">10.00</p>
                                    <a href="#" class="btn btn-primary">Go to Card 1</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Card 2</h5>
                                    <p class="card-text">This is some example text for Card 2.</p>
                                    <a href="#" class="btn btn-primary">Go to Card 2</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Card 3</h5>
                                    <p class="card-text">This is some example text for Card 3.</p>
                                    <a href="#" class="btn btn-primary">Go to Card 3</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Card 4</h5>
                                    <p class="card-text">This is some example text for Card 4.</p>
                                    <a href="#" class="btn btn-primary">Go to Card 4</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Card 5</h5>
                                    <p class="card-text">This is some example text for Card 5.</p>
                                    <a href="#" class="btn btn-primary">Go to Card 5</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Card 6</h5>
                                    <p class="card-text">This is some example text for Card 6.</p>
                                    <a href="#" class="btn btn-primary">Go to Card 6</a>
                                </div>
                            </div>
                        </div>
                        <!-- Add more cards as needed -->
                    </div>
                </div>
                
                <div class="scrollable-div containerss col-md-2">
                    <h2>Select Items:</h2>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Gloves</h5>
                                    <p class="card-text">10.00</p>
                                    <a href="#" class="btn btn-primary">Go to Card 1</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Card 2</h5>
                                    <p class="card-text">This is some example text for Card 2.</p>
                                    <a href="#" class="btn btn-primary">Go to Card 2</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Card 3</h5>
                                    <p class="card-text">This is some example text for Card 3.</p>
                                    <a href="#" class="btn btn-primary">Go to Card 3</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Card 4</h5>
                                    <p class="card-text">This is some example text for Card 4.</p>
                                    <a href="#" class="btn btn-primary">Go to Card 4</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Card 5</h5>
                                    <p class="card-text">This is some example text for Card 5.</p>
                                    <a href="#" class="btn btn-primary">Go to Card 5</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Card 6</h5>
                                    <p class="card-text">This is some example text for Card 6.</p>
                                    <a href="#" class="btn btn-primary">Go to Card 6</a>
                                </div>
                            </div>
                        </div>
                        <!-- Add more cards as needed -->
                    </div>
                </div>

                <div class="container-table col-md-6 col align-self-end">
                    <h2>Receipt</h2>
                    <table class="table">
                        <thead>
                            <tr class="bg-light">
                                <th>Item</th>
                                <th>Qty</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Product 1</td>
                                <td>2</td>
                                <td>$10.00</td>
                                <td>$20.00</td>
                            </tr>
                            <tr>
                                <td>Product 2</td>
                                <td>1</td>
                                <td>$15.00</td>
                                <td>$15.00</td>
                            </tr>
                            <tr>
                                <td>Product 3</td>
                                <td>3</td>
                                <td>$5.00</td>
                                <td>$15.00</td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>1</td>
                                <td>$5.00</td>
                                <td>$5.00</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td>-</td>
                                <td>-</td>
                                <td>$6.00</td>
                            </tr>
                            <tr class="table-primary">
                                <td><strong>Total</strong></td>
                                <td>-</td>
                                <td>-</td>
                                <td><strong>$61.00</strong></td>
                            </tr>
                        </tbody>
                    </table>
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
