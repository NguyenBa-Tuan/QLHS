<div class="container">

    <a href="{{route('courses.create')}}" class="btn btn-danger">Thêm khóa học mới</a>

</div>

<div class="container list">

    <h2>Danh sách khóa học</h2>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Tên khóa học</th>
            <th scope="col">Số sinh viên</th>
            <th scope="col">Xóa</th>
            <th scope="col">sửa</th>
          </tr>
        </thead>
        <tbody>
            
            @foreach ($courses as $key => $value)
                <tr>
                    <th scope="row"> @php
                        echo $value->id;
                    @endphp</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->count_student_max}}</td>
                    <td>
                        <form role="form" action="{{route('courses.destroy', $value->id)}}" method="post">
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Xóa <i class="bi bi-x"></i></button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                        {{-- <a href="" class="btn btn-danger">Xóa <i class="bi bi-x"></i></a> --}}
                    </td>
                    <td><a href="{{route('courses.edit', $value->id)}}" class="btn btn-info">Sửa <i class="bi bi-arrow-counterclockwise"></i></a></td>
                </tr>
            @endforeach
        </tbody>
      </table>

</div>