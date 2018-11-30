@extends('welcome')
@section('title', 'Danh sách khách hàng')
@section('content')
    <div class="col-12">
        <div class="row">
            <div class="col-12"><h1>Danh Sách Khách Hàng</h1></div>
            <div class="col-12">
                @if (Session::has('success'))
                    <p class="text-success">
                        <i class="fa fa-check" aria-hidden="true"></i>{{ Session::get('success') }}
                    </p>
                @endif
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ma khách hàng</th>
                    <th scope="col">Tên khách hàng</th>
                    <th scope="col">email</th>
                    <th scope="col">dia chi</th>
                    <th scope="col">so dien thoai</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if(count($customers) == 0)
                    <tr><td colspan="4">Không có dữ liệu</td></tr>
                @else
                    @foreach($customers as $key => $customer)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $customer->code_customer }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->phone_number }}</td>
                            <td><a href="{{route('customers.edit',$customer->id)}}">sửa</a></td>
                            <td><a href="{{route('customers.destroy',$customer->id)}}" class="text-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">xóa</a></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <a class="btn btn-primary" href="{{route('customers.create')}}">Thêm mới</a>
        </div>
    </div>

    {{ $customers->links() }}

    <div class="col-6">
        <form class="navbar-form navbar-left" action="{{route('customers.search')}}">
            @csrf
            <div class="row">
                <div class="col-8">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search" name="keyword">
                    </div>
                </div>
                <div class="col-4">
                    <button type="submit" class="btn btn-default">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
@endsection