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
                    <h2>Edit Channel</h2>
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
        @foreach ($channels as $channel)
            <form method="POST" action="{{ route('channels.update', $channel->channelID) }}">
                @csrf
                @method('PUT')
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="channelName" placeholder="channelName" name="channelName"
                        value="{{ $channel->channelName }}">
                    <label for="channelName">Channel Name</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="description" placeholder="description"
                        name="description" value="{{ $channel->description }}">
                    <label for="description">Description</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="number" class="form-control" id="subscribersCount" placeholder="subscribersCount"
                        name="subscribersCount" value="{{ $channel->subscribersCount }}">
                    <label for="subscribersCount">Subscribers Count</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="URL" placeholder="URL"
                        name="URL" value="{{ $channel->URL }}">
                    <label for="URL">URL</label>
                </div>

                <input type="submit" name="submit" id="submit" value="Update">

            </form>
        @endforeach
    </div>
</body>

</html>
