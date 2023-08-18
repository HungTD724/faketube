<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 class="text-center text-uppercase">Channel</h2>
            </div>
            <div class="pull-right mb-2">
                <a class="btn btn-success" href="{{ route('channels.create') }}"> Create Channel</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Channel ID</th>
            <th>Channel Name</th>
            <th>Description</th>
            <th>Subscribers</th>
            <th>URL</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($channels as $channel)
        <tr>
            <td>{{ $channel->channelID }}</td>
            <td>{{ $channel->channelName }}</td>
            <td>{{ $channel->description }}</td>
            <td>{{ $channel->subscribersCount }}</td>
            <td>{{ $channel->URL }}</td>
            <td>

                    <a class="btn btn-primary" href="{{ route('channels.show', $channel->channelID) }}">Detail</a>
                    <a class="btn btn-primary" href="{{ route('channels.edit', $channel->channelID) }}">Edit</a>
                    <a class="btn btn-primary" href="#" data-id={{ $channel->channelID }} data-toggle="modal" data-target="#{{$channel->channelID}}">Delete</a>
                    <!-- Modal -->
                    <form action="{{ route('channels.destroy',$channel->channelID) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal fade" id="{{$channel->channelID}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete channel</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure delete the channel with id: {{$channel->channelID}}?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
