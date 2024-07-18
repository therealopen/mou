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

    <div class="section-title">ON NETWORK INSTALLATION INFRASTRUCTURE</div>

    <div class="section-content">
        @if ($mou)
        <p>This Memorandum of Understanding (MOU) is made on this {{ $mou->created_at->format('d') }} day of {{ $mou->created_at->format('F') }}, {{ $mou->created_at->format('Y') }}, by and between:</p>

        <div class="sub-section-title">Udom University</div>
        <div class="sub-section-content">
            <p><b>Address:</b> {{ $mou->udom_company_address }}</p>
            <p><b>Contact Information:</b> {{ $mou->udom_contact_number }}, {{ $mou->udom_company_email }}</p>
            <p><b>Objective:</b> Develop and maintain a network infrastructure to support academic and administrative functions.</p>
            <p><b>Responsibilities:</b><br>{!! nl2br(e($mou->udom_responsibility)) !!}</p>
        </div>

        <div class="sub-section-title">{{ $mou->other_company_name }}</div>
        <div class="sub-section-content">
            <p><b>Address:</b> {{ $mou->other_company_address }}</p>
            <p><b>Contact Information:</b> {{ $mou->other_contact_number }}, {{ $mou->other_company_email }}</p>
            <p><b>Objective:</b> Collaborate in the development and maintenance of the network infrastructure.</p>
            <p><b>Responsibilities:</b><br>{!! nl2br(e($mou->other_responsibility)) !!}</p>
        </div>

        <div class="section-title">Signatures</div>
        <div class="signature">
            <p>By signing below, both parties agree to the terms and conditions set forth in this Memorandum of Understanding.</p>

            <p>Udom University:</p>
            @if ($mou->udom_signature_path)
                <img src="{{ asset('storage/' . $mou->udom_signature_path) }}" alt="Signature" width="150">
            @else
                No Picture
            @endif
            <img src="{{ asset('assets/signature/signature.png') }}" class="" alt="Signature Pictureee uu" width="150">
           
            <img src="{{ public_path('assets/signature/signature.png') }}" alt="Signature Pictured" width="150">


           
            

            <p>Name: {{ $mou->udom_representation_name }}</p>
            <p>Title: {{ $mou->udom_representative_title }}</p>
            <p>Date: {{ $mou->created_at->format('Y-m-d') }}</p>

            <p>{{ $mou->other_company_name }}:</p>
            @if ($mou->other_signature_path)
                <img src="{{ asset('storage/' . $mou->other_signature_path) }}" alt="{{ $mou->other_company_name }} Signature" width="150">
            @else
                No Picture
            @endif
            <p>Name: {{ $mou->other_representation_name }}</p>
            <p>Title: {{ $mou->other_representative_title }}</p>
            <p>Date: {{ $mou->created_at->format('Y-m-d') }}</p>
        </div>
        @else
        <p>No MOU data found.</p>
        @endif
    </div>
</body>
</html>
