<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .card{
            border: 2px solid rgb(0, 70, 135);
            border-radius: 50px;
            padding: 25px;
            margin-bottom: 15px;
            background: #e4f0ff;
        }
        .card-header{
            background: rgb(0, 70, 135);
            padding: 25px;
            border-radius: 25px 25px 0px 0px;
            color: #ffffff;
            margin-top: -5px;
        }

        li{
            color: #366db1 ;
        }
        li span{
            color:rgb(45, 43, 43);
        }
        h5{
            background: #366db1;
            color: #ffffff;
            padding: 10px 0px 10px 35px;
            margin: 0px 15px -40px 15px ;
            border-radius: 15px;
        }

    </style>
</head>
<body>
    @foreach ($attendanceHistory as $attendance)        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-dark">  
                    <span class="text-white font-size-15">{{ $attendance->student_name." ".$attendance->date_created }}</span>
                </div>
                <div class="card-body">
                    <ul>
                        {{-- <li>id: {{ $attendance->id }}</li> --}}
                        <li>Student Name: <span class="text-primary">{{ $attendance->student_name }}</span></li>
                        <li>Date Created: <span class="text-primary">{{ $attendance->date_created }}</span></li>
                        <li>Time : <span class="text-primary">{{ $attendance->time }}</span></li>
                        <li>Term: <span class="text-primary">{{ $attendance->term }}</span></li>
                        <li>Lesson: <span class="text-primary">{{ $attendance->lesson }}</span></li>
                        <li>Tutor Name: <span class="text-primary">{{ $attendance->tutor_name }}</span></li>
                        <li>Tutor Evaluation: <span class="text-primary">{{ $attendance->tutor_evaluation }}</span></li>
                        <li>Student Self: <span class="text-primary">{{ $attendance->student_self }}</span></li>
                        <li>Student Attendance: <span class="text-primary">{{ $attendance->student_attendance }}</span></li>
                        <li>Homework Completed: <span class="text-primary">{{ $attendance->homework_completed }}</span></li>
                        <li>Weekly Lesson: <span class="text-primary">{{ $attendance->weekly_lesson }}</span></li>
                        <li>Homework Assignment: <span class="text-primary">{{ $attendance->homework_assignment }}</span></li>
                        <li>Email School: <span class="text-primary">{{ $attendance->email_school }}</span></li>
                        <li>Comment: <span class="text-primary">{!! $attendance->comment !!}</span></li>
                        <li>Comment Private: <span class="text-primary">{!! $attendance->commentPrivate !!}</span></li>
                    </ul>
                    <h5>Learning Plans </h5>
                    <br>
                    <br>
                    <ul>
                        <li>Subject: <span class="text-primary">{{ $attendance->subject_name }}</span></li>
                        <li>Concept: <span class="text-primary">{{ $attendance->concept_name }}</span></li>
                        <li>Concept Detail: <span class="text-primary">{{ $attendance->conceptDetail }}</span></li>
                        <li>Learning Activity: <span class="text-primary">{{ $attendance->learningActivity }}</span></li>
                    </ul>
                    <br>
                    @foreach ($attendance->learningPlans as $learning)
                    <ul>
                        <li>Subject: <span class="text-primary">{{ $learning->subject_name }}</span></li>
                        <li>Concept: <span class="text-primary">{{ $learning->concept_name }}</span></li>
                        <li>Concept Detail: <span class="text-primary">{{ $learning->conceptDetail }}</span></li>
                        <li>Learning Activity: <span class="text-primary">{{ $learning->learningActivity }}</span></li>
                    </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach 
</body>
</html>


    