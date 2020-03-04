@extends('layouts.layout')

@section('content')
<div style="margin-top:30px;padding-bottom:0px;">
    <h2>早めに終わらせよう</h2>
    <form action="/tasks" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <!-- Task Name -->
        <div class="form-group">
            {{-- <label for="task" class="control-label">やること</label> --}}
                <input type="text" name="name" id="task-name" class="form-control" placeholder="予定を入力">
        </div>

        <!-- Add Task Button -->
        <div class="form-group">
                <button type="submit" class="btn btn-primary btn-sm">
                    追加
                </button>
        </div>
    </form>
</div>
    <!-- Current Tasks -->
    <h2>やること一覧</h2>
    <table class="table table-striped table-hover">

        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <!-- Task Name -->
                    <td>
                        <div>{{ $task->name }}</div>
                    </td>
                    <td>
                        <form action="/tasks/{{ $task->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger btn-sm">削除</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection