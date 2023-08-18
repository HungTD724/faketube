<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Company Form - Channel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Detail Channel</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('channels.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Channel ID</th>
                    <th>Channel Name</th>
                    <th>Description</th>
                    <th>Subscribers</th>
                    <th>URL</th>
                </tr>
            </thead>
            @foreach ($channels as $channel)
                <tbody>
                    <tr>
                        <td>{{ $channel->channelID }}</td>
                        <td>{{ $channel->channelName }}</td>
                        <td>{{ $channel->description }}</td>
                        <td>{{ $channel->subscribersCount }}</td>
                        <td>{{ $channel->URL }}</td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
</body>

</html>
