<div class="container">
    <h2>Thêm học sinh</h2>

    <a href="{{route('users.create')}}" class="btn btn-danger">Thêm sinh viên mới</a>

</div>

<div class="container list">

    <h2>Danh sách sinh viên</h2>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Họ tên</th>
            <th scope="col">Xóa</th>
            <th scope="col">sửa</th>
          </tr>
        </thead>
        <tbody>
            
            @foreach ($data as $key => $value)
                <tr>
                    <th scope="row"> @php
                        echo $value->id;
                    @endphp</th>
                    <td>{{$value->name}}</td>
                    <td>
                        <form role="form" action="{{route('users.destroy', $value->id)}}" method="post">
                            @method('DELETE')
                            <button type="submit" class="btn btn-default">Xóa <i class="bi bi-x"></i></button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                        {{-- <a href="" class="btn btn-danger">Xóa <i class="bi bi-x"></i></a> --}}
                    </td>
                    <td><a href="{{route('users.edit', $value->id)}}" class="btn btn-info">Sửa <i class="bi bi-arrow-counterclockwise"></i></a></td>
                </tr>
            @endforeach
        </tbody>
      </table>

</div>