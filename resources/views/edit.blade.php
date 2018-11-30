@extends('welcome')
@section('title', 'sua khách hàng')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12">
                <h1>sua thong tin khách hàng</h1>
            </div>
            <div class="col-12">
                <form method="post" action="{{ route('customers.update',$customer->id) }}">
                    @csrf
                    <div class="form-group">
                        <label>ma khach hang la</label>
                        <input type="text" class="form-control" name="code_customer"  required>
                    </div>
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input type="text" class="form-control" name="name"  value="{{$customer->name}}" >
                        @if($errors->has('name'))
                            <p>{{ $errors->first('name') }}</p>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" value="{{$customer->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">dia chi</label>
                        <input type="text" class="form-control" name="address" placeholder="Enter address" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">so dt</label>
                        <input type="text" class="form-control" name="phone_number" placeholder="Enter phone number" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection