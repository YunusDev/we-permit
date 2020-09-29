@extends('admin.layouts.base')

@section('title')
    All Users
@endsection
@section('styles')

    <link rel="stylesheet" href="{{asset('admin/datatables/dataTables.bootstrap4.css')}}">

@endsection

@section('content')

    <div class="section-header">
        <h1>Users</h1>
    </div>

    <div class="section-body" style="">

        <div class="row">
            <div class="col-12">

                <div class="card">

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Completed Application</th>
                                <th>Created at</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($users)
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->fname}} {{$user->lname}}</td>
                                        <td>{{$user->email }}</td>
                                        <td>
                                            @if($user->complete_reg)
                                                <span class="badge badge-primary">Yes</span>
                                            @else
                                                <span class="badge badge-warning">No</span>
                                            @endif

                                        </td>
                                        <td>{{$user->created_at->diffForHumans()}}</td>
                                        <td>

                                            <form method="post" id="delete-form-{{$user->id}}" action="{{route('users.destroy', $user->id)}}">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}

                                            </form>

                                            <a href="" onclick="
                                                    if(confirm('Are you sure you want to delete this ?'))
                                                    {
                                                    event.preventDefault();document.getElementById('delete-form-{{$user->id}}').submit();}
                                                    else
                                                    {event.preventDefault();}">
                                                <span class="fas fa-trash"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Completed Application</th>
                                <th>Created at</th>
                                <th>Delete</th>

                                {{--@endcan--}}
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>

            </div>
        </div>

    </div>


@endsection

@section('scripts')

    <script src="{{asset('admin/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/datatables/dataTables.bootstrap4.js')}}"></script>

    <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false
            });
        });
    </script>

@endsection
