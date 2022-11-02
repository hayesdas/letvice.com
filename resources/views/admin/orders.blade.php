@extends('admin/layout/panel')
@section("title", "orders")
@section('content')
    <div class="mb-5"></div>
    <div class="container">
        <div class="row">
            @foreach($orders as $order)
                <div class="col mb-3">
                    <div class="card p-4">
                        <p>email: {{$order['email']}}</p>
                        <p>address: {{$order['address']}}</p>
                        <p>total price: {{$order['total_price']}}</p>
                        <p>created at: {{$order['created_at']}}</p>
                        <p>status: {{$order['status']}}</p>
                        <p>products: </p>
                        <table class="table">
                            <tr>
                                <th>
                                    name
                                </th>
                                <th>
                                    category
                                </th>
                                <th>
                                    firm
                                </th>
                                <th>
                                    price
                                </th>
                                <th>
                                    sale
                                </th>
                                <th>
                                    size

                                </th>
                                <th>
                                    count
                                </th>
                            </tr>
                            @foreach($order["products"] as $product)
                                <tr>
                                    <td>
                                        {{$product["name"]}}
                                    </td>
                                    <td>
                                        {{$product["category"]}}
                                    </td>
                                    <td>
                                        {{$product["firm"]}}
                                    </td>
                                    <td>
                                        {{$product["price"]}}
                                    </td>
                                    <td>
                                        {{$product["sale"]}}
                                    </td>
                                    <td>
                                        {{$product["size"]}}

                                    </td>
                                    <td>
                                        {{$product["count"]}}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <form class="form" action="{{route('admin.orders', ['id' => $order['id'], 'status' => 'delivered'])}}" method="post">
                            @csrf
                            <button class="btn btn-primary mb-1 mt-3 w-100">delivered</button>
                        </form>
                        <form class="form" action="{{route('admin.orders', ['id' => $order['id'], 'status' => 'rejected'])}}" method="post">
                            @csrf
                            <button class="btn btn-primary mb-1 w-100">rejected</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
