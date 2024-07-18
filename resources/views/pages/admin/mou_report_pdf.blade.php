<!DOCTYPE html>
<html>
<head>
    <title>MOU Report</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 11pt;
            margin: 20px;
        }
        h1, .section-title, .sub-section-title {
            text-align: center;
            color: #333;
            font-size: 16pt;
        }
        .section-content {
            margin-top: 10px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #333;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f2f2f2;
        }
        .comments, .tasks {
            margin-top: 20px;
        }
        .comments .comment, .tasks .task {
            margin-bottom: 10px;
        }
        .signature {
            margin-top: 10px;
            text-align: center;
        }
        img {
            display: block;
            margin: 0 auto;
            margin-top: 5px;
        }
        @page {
            size: A4 portrait;
            margin: 20mm;
        }
    </style>
</head>
<body>
    <h1>MOU REPORT</h1>

    @if ($mous && $mous->count())
        @foreach ($mous as $mou)
            <div class="section-title">MOU Title: {{ $mou->mou_title }}</div>

            <div class="section-content">
                <table class="table">
                    <tr>
                        <th>Description</th>
                        <td>{{ $mou->mou_description }}</td>
                    </tr>
                    <tr>
                        <th>Start Date</th>
                        <td>{{ $mou->start_date }}</td>
                    </tr>
                    <tr>
                        <th>End Date</th>
                        <td>{{ $mou->end_date }}</td>
                    </tr>
                    <tr>
                        <th>Contract Period</th>
                        <td>{{ $mou->contract_period }}</td>
                    </tr>
                    <tr>
                        <th>Site Delivery</th>
                        <td>{{ $mou->site_delivery }}</td>
                    </tr>
                    <tr>
                        <th>Status Progress</th>
                        <td>{{ $mou->status_tpc }}</td>
                    </tr>
                </table>
                
                <div class="tasks">
                    <h2 class="sub-section-title">Tasks</h2>
                    @if ($mou->tasks->count())
                        @foreach ($mou->tasks as $task)
                            <div class="task">
                                <p><b>Task Title:</b> {{ $task->Task_title }}</p>
                                <p><b>Task Description:</b> {{ $task->Task_description }}</p>
                                <p><b>Status:</b> all</p>
                                <p><b>Start Date:</b> {{ $task->task_start_date }}</p>
                                <p><b>End Date:</b> {{ $task->task_end_date }}</p>
                            </div>
                        @endforeach
                    @else
                        <p>No tasks found for this MOU.</p>
                    @endif
                </div>

                {{-- <div class="comments">
                    <h2 class="sub-section-title">Comments</h2>
                    @if ($mou->comments->count())
                        @foreach ($mou->comments as $comment)
                            <div class="comment">
                                <p><b>Status:</b> {{ $comment->mou_status }}</p>
                                <p><b>Reason:</b> {{ $comment->mou_reason_name }}</p>
                                <p><b>Commented by:</b> {{ $comment->user->first_name }} {{ $comment->user->last_name }} ({{ $comment->user->email }})</p>
                                <p><b>Comment Date:</b> {{ $comment->created_at->format('Y-m-d') }}</p>
                            </div>
                        @endforeach
                    @else
                        <p>No comments found for this MOU.</p>
                    @endif
                </div> --}}
                
                <br><br> <!-- Add some spacing between MOUs -->
            </div>
        @endforeach
    @else
        <p>No MOU data found.</p>
    @endif
</body>
</html>
