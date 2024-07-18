<!DOCTYPE html>
<html>
<head>
    <title>MEMORANDUM OF UNDERSTANDING</title>
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
        .sub-section-content {
            margin-left: 10px;
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
    <h1>MEMORANDUM OF UNDERSTANDING</h1>
    <h1>Task Scheduling</h1>
  
    @if ($task)
    <div class="section-title">Task Name:{{$task->Task_title}}</div>

    <div class="section-content">
       
        <p>This Task is started on this {{ $task->task_start_date }}  day of -- {{ $task->task_end_date}}

     
        <div class="sub-section-content">
            <p><b>Description:</b> {{$task->Task_description}}</p>
            <p><b>Remain Day:</b> 20</p>
            <p><b>status:</b> inpogress</p>
            <p><b>Comment:</b> inpogress</p>
            <p><b>Objective:</b> Develop and maintain a network infrastructure to support academic and administrative functions.</p>
            <p><b>Responsibilities People:</b><br>Hussein Mcheni<br>Johnson Juma</p>
        </div>

    

            

           
            

           
        </div>
        @else
        <p>No MOU data found.</p>
        @endif
    </div>
</body>
</html>
