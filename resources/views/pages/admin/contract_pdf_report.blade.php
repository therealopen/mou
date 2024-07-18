<!DOCTYPE html>
<html>
<head>
    <title>contract report</title>
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
        .comments {
            margin-top: 20px;
        }
        .comments .comment {
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
    <h1>CONTRACT REPORT</h1>
    
  
    @if ($contracts && $contracts->count())
        @foreach ($contracts as $contract)
            <div class="section-title">Contract Name: {{ $contract->contract_name }}</div>

            <div class="section-content">
                <table class="table">
                    <tr>
                        <th>Contract Type</th>
                        <td>{{ $contract->contract_type }}</td>
                    </tr>
                    <tr>
                        <th>Contract Description</th>
                        <td>{{ $contract->contract_description }}</td>
                    </tr>
                    <tr>
                        <th>Start Date</th>
                        <td>{{ $contract->contract_startDate }}</td>
                    </tr>
                    <tr>
                        <th>End Date</th>
                        <td>{{ $contract->contract_endDate }}</td>
                    </tr>
                    <tr>
                        <th>Contract Period</th>
                        <td>{{ $contract->contract_period }}</td>
                    </tr>
                    <tr>
                        <th>Site Delivery</th>
                        <td>{{ $contract->site_delivery }}</td>
                    </tr>
                    <tr>
                        <th>Contract Value</th>
                        <td>{{ $contract->contract_value }}</td>
                    </tr>
                    <tr>
                        <th>Employer</th>
                        <td>{{ $contract->employer }}</td>
                    </tr>
                    <tr>
                        <th>Approval Status</th>
                        <td>{{ $contract->approval_status }}</td>
                    </tr>
                    <tr>
                        <th>Status TPC</th>
                        <td>{{ $contract->status_tpc }}</td>
                    </tr>
                </table>
                <div class="comments">
                    <h2 class="sub-section-title">Comments</h2>
                    @if ($contract->comments->count())
                        @foreach ($contract->comments as $comment)
                            <div class="comment">
                                <p><b>Status:</b> {{ $comment->contract_status }}</p>
                                <p><b>Reason:</b> {{ $comment->reason_name }}</p>
                                <p><b>Commented by:</b> {{ $comment->user->first_name }} {{ $comment->user->last_name }} ({{ $comment->user->email }})</p>
                                <p><b>Comment Date:</b> {{ $comment->created_at->format('Y-m-d') }}</p>
                            </div>
                        @endforeach
                    @else
                        <p>No comments found for this contract.</p>
                    @endif
                </div>
                <br><br> <!-- Add some spacing between contracts -->
            </div>
        @endforeach
    @else
        <p>No contract data found.</p>
    @endif
</body>
</html>
