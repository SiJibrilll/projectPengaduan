{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Laporan</title>
</head>
<body>
    <div class="container mx-auto flex justify-between items-center bg-green-500" style="display: flex; justify-content: space-between; align-items: center; background-color: #34d399;">
        <h1 style="font-weight: 800; font-size: 3rem; color: white;">LaporIND</h1>
      </div>
      
   
    <h1>Laporan Aduan {{$periode}}</h1>
    <p>Per: {{$time}}</p>

    @foreach ($aduan as $item)
        <p> {{var_dump($item)}} </p>
    @endforeach
</body>
</html> --}}

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Letter</title>
</head>
<style>
    @page {
    margin: 0px;
}
body {
    margin: 0px;
}

.page-break {
    page-break-after: always;
}


    table {
        page-break-inside: auto; /* Avoid breaking the table inside pages */
    }

    tbody tr {
        page-break-inside: avoid; /* Avoid breaking table rows inside pages */
    }
       
</style>
<body>
    <div class="letterhead" style="background-color: #0FB5A1; width: 100%; height: 100px; position: relative; text-align: left;">
        <div class="letterhead-text" style="font-weight: bolder; color: #fff; font-size: 30px; font-family: 'Inter', sans-serif; position: absolute; top: 50%; transform: translateY(-50%); margin-left: 20px;">LaporIND</div>
    </div>

    <div class="title" style="text-align: left; margin-left: 20px; font-family: 'Inter', sans-serif; margin-bottom: 20px;">
        <p style="font-weight: bold; font-size: 24px;">Laporan Aduan {{ucfirst($periode)}} </p>
        <p style="font-weight: bold; font-size: 24px;">Per: {{$time}} </p>
    </div>
    
    <div class="table-container" style="margin: 20px;"> <!-- Adjust margin as needed -->
        <table style="font-family: 'Inter', sans-serif; width: 100%; border-collapse: collapse;">
            <thead style="background-color: #0FB5A1; color: #fff;">
                <tr>
                    <th style="padding: 10px;">Judul</th>
                    <th style="padding: 10px;">Deskripsi</th>
                    <th style="padding: 10px;">Status</th>
                    <th style="padding: 10px;">Tanggal Pengajuan</th>
                    <th style="padding: 10px;">Tanggal Penyelesaian</th>
                </tr>
            </thead>
            <tbody style="background-color: #fff; color: #000;">
                
                @foreach ($aduan as $item)
                    <tr>
                        <td style="padding: 10px;"> {{$item->judul}}</td>
                        <td style="padding: 10px;"> {{$item->deskripsi}}</td>
                        <td style="padding: 10px;"> {{$item->status}}</td>
                        <td style="padding: 10px;"> {{$item->created_at->format('l, F j, Y')}}</td>
                        <td style="padding: 10px;">-</td>
                    </tr>
                @endforeach
               
            </tbody>
        </table>
    </div>

    <div class="footer" style="position: absolute; bottom: 0px; left: 20px; font-family: 'Inter', sans-serif;">
        <p style="font-weight: bold; font-size: 20px; color: #0FB5A1;">Laporind</p>
    </div>
</body>
</html>

