@extends('layouts.app')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Course request</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Course request</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
        <div class="content-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card card-default">
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <?php
                                $Approve_id = Auth::id();
                                ?>
                                <tbody>

                                @foreach($courses as $course)
                                    <tr>
                                        <td>
                                            {{ $course->name }}
                                        </td>
                                        <?php
                                        $flag = 0;
                                        $flag1 = 0;
                                        ?>

                                        @if(Auth::id()!== $course->user_id)
                                            @foreach($courseApprovals as $courseApproval)


                                                @if($courseApproval->course_id === $course->id && Auth::id()=== $courseApproval->user_id && $courseApproval->status === 0)

                                                    <td>
                                                        <form method="POST"
                                                              action="{{ route('courseApproval.destroy', $courseApproval->id) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" class="btn btn-danger btn-sm">Cencel
                                                                Request
                                                            </button>
                                                        </form>
                                                        <?php
                                                        $flag = 1;
                                                        break;
                                                        ?>
                                                    </td>
                                                @endif
                                                @if($courseApproval->course_id === $course->id && Auth::id()=== $courseApproval->user_id && $courseApproval->status === 1)

                                                    <td>
                                                        <form method="POST"
                                                              action="{{ route('courseApproval.destroy', $courseApproval->id) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}
                                                            <button type="submit" class="btn btn-danger btn-sm">Exit
                                                            </button>
                                                        </form>
                                                        <?php
                                                        $flag1 = 1;
                                                        break;
                                                        ?>
                                                    </td>
                                                @endif

                                            @endforeach
                                            @if($flag!==1 && $flag1!==1 )
                                                <td>
                                                    <form method="POST"
                                                          action="{{ route('courseApprove.approveMe',$course->id) }}">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <input type="hidden" id="name" class="form-control"
                                                                   name="courseId"
                                                                   value="{{ $course->id }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" id="name" class="form-control"
                                                                   name="ApproveId"
                                                                   value="{{ $Approve_id }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="hidden" id="name" class="form-control"
                                                                   name="courseUserId"
                                                                   value="{{ $course->user_id}}">
                                                        </div>
                                                        <button type="submit" class="btn btn-success btn-sm">Add me
                                                        </button>
                                                    </form>

                                                    <?php
                                                    $flag = 0;
                                                    $flag1 = 0;
                                                    ?>
                                                    @endif
                                                    @endif
                                                </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection