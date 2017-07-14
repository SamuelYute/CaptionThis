<!-- Challenges -->
<div class="tab-pane animated fadeIn" id="challenges" role="tabpanel">
    <div style="background: white;margin:40px;">
        <div class="w3-padding-large w3-margin-bottom" style="border-bottom:1px solid gainsboro">
            <h4>Current Challenge(s)</h4>
        </div>

        <div class="row w3-center" style="padding:40px 30px">
            <h1>Information will go here</h1>
        </div>
    </div>

    <div style="background: white;margin:40px;">
        <div class="w3-padding-large w3-margin-bottom" style="border-bottom:1px solid gainsboro">
            <h4>All Challenges</h4>
        </div>

        <div class="w3-padding">
            <div class="d-flex justify-content-around w3-padding">
                <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> Hover on a table row below to view the challenge description.</div>
                <div style="border:1px solid gainsboro">

                </div>
                <div class="align-self-center">
                    <a class="btn w3-hover-dark-gray" role="button" data-toggle="modal" data-target="#add-challenge-modal"><i class="fa fa-plus"></i> Add Challenge</a>

                </div>
            </div>

            <table class="table w3-small">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Sponsor</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Updated at</th>
                    <th>Available Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $challenges as $challenge)
                    <tr>
                        <td>{{ ++$loop->index.'.' }}</td>
                        <td data-toggle="tooltip" data-placement="bottom" title="{{ $challenge->description }}" role="button"><span>{{ $challenge->title }}</span></td>
                        <td>{{ $challenge->sponsor }}</td>
                        <td>{{ $challenge->start_date }}</td>
                        <td>{{ $challenge->end_date }}</td>
                        <td>
                            @if($challenge->status == 0)
                                <span class="badge w3-khaki w3-padding-small">Inactive</span>
                            @else
                                <span class="badge w3-grey w3-padding-small">Current</span>
                            @endif
                        </td>
                        <td>{{ $challenge->updated_at->diffForHumans() }}</td>
                        <td>
                            <a class="btn btn-sm w3-blue w3-hover-shadow" href="#">View</a>
                            <a class="btn btn-sm w3-teal w3-hover-shadow" data-toggle="modal" data-target="#edit-challenge-modal-{{$challenge->id}}" role="button">Edit</a>
                            <a class="btn btn-sm w3-dark-gray w3-hover-shadow delete-confirm" data-title="{{ $challenge->title }}" href="{{ URL::route('admin.challenges.delete',$challenge->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>