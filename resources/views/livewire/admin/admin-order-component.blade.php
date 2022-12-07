<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        All Orders
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>OrderId</th>
                                        <th>Subtotal</th>
                                        <th>Discount</th>
                                        <th>Tax</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Zip Code</th>
                                        <th>Status</th>
                                        <th>Order Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td>{{ $item->subtotal }}</td>
                                            <td>{{ $item->discount }}</td>
                                            <td>{{ $item->tax }}</td>
                                            <td>{{ $item->firstname }}</td>
                                            <td>{{ $item->lastname }}</td>
                                            <td>{{ $item->mobile }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->zipcode }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
