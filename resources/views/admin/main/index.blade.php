@extends('admin.layouts.master')
@section('title', 'Admin Panel')
@section('content')
    <div class="pc-container">
        <div class="pc-content">

            <div class="row">
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-primary order-card">
                        <div class="card-body">
                            <h6 class="text-white">Orders Received</h6>
                            <h2 class="text-end text-white"><i
                                    class="feather icon-shopping-cart float-start"></i><span>486</span>
                            </h2>
                            <p class="m-b-0">Completed Orders<span class="float-end">351</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-success order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total Sales</h6>
                            <h2 class="text-end text-white"><i class="feather icon-tag float-start"></i><span>1641</span>
                            </h2>
                            <p class="m-b-0">This Month<span class="float-end">213</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-warning order-card">
                        <div class="card-body">
                            <h6 class="text-white">Revenue</h6>
                            <h2 class="text-end text-white"><i
                                    class="feather icon-repeat float-start"></i><span>$42,562</span></h2>
                            <p class="m-b-0">This Month<span class="float-end">$5,032</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-grd-danger order-card">
                        <div class="card-body">
                            <h6 class="text-white">Total Profit</h6>
                            <h2 class="text-end text-white"><i
                                    class="feather icon-award float-start"></i><span>$9,562</span></h2>
                            <p class="m-b-0">This Month<span class="float-end">$542</span></p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12">
                    <div class="card table-card">
                        <div class="card-header">
                            <h5>Recent Orders</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <th>Image</th>
                                        <th>Product Code</th>
                                        <th>Customer</th>
                                        <th>Purchased On</th>
                                        <th>Status</th>
                                        <th>Transaction ID</th>
                                    </tr>
                                    <tr>
                                        <td><img src="{{ asset('/images/widget/p1.jpg') }}" alt="prod img" class="img-fluid">
                                        </td>
                                        <td>PNG002413</td>
                                        <td>Jane Elliott</td>
                                        <td>06-01-2017</td>
                                        <td><span class="badge bg-primary">Shipping</span></td>
                                        <td>#7234421</td>
                                    </tr>
                                    <tr>
                                        <td><img src="{{ asset('/images/widget/p2.jpg') }}" alt="prod img" class="img-fluid">
                                        </td>
                                        <td>PNG002344</td>
                                        <td>John Deo</td>
                                        <td>05-01-2017</td>
                                        <td><span class="badge bg-danger">Failed</span></td>
                                        <td>#7234486</td>
                                    </tr>
                                    <tr>
                                        <td><img src="{{ asset('/images/widget/p3.jpg') }}" alt="prod img" class="img-fluid">
                                        </td>
                                        <td>PNG002653</td>
                                        <td>Eugine Turner</td>
                                        <td>04-01-2017</td>
                                        <td><span class="badge bg-success">Delivered</span></td>
                                        <td>#7234417</td>
                                    </tr>
                                    <tr>
                                        <td><img src="{{ asset('/images/widget/p4.jpg') }}" alt="prod img" class="img-fluid">
                                        </td>
                                        <td>PNG002156</td>
                                        <td>Jacqueline Howell</td>
                                        <td>03-01-2017</td>
                                        <td><span class="badge bg-warning">Pending</span></td>
                                        <td>#7234454</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
