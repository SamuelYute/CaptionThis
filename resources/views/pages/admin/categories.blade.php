<!-- Categories -->
<div class="tab-pane animated fadeIn" id="categories" role="tabpanel">
    <div style="background: white;margin:40px;">
        <div class="w3-padding-large w3-margin-bottom" style="border-bottom:1px solid gainsboro">
            <h4>Categories Activity</h4>
        </div>

        <div class="row w3-center" style="padding:40px 30px">
            <h1>Graphs will go here</h1>
        </div>
    </div>

    <div style="background: white;margin:40px;">
        <div class="w3-padding-large w3-margin-bottom" style="border-bottom:1px solid gainsboro">
            <h4>All Categories</h4>
        </div>

        <div class="w3-padding">
            <div class="d-flex justify-content-around w3-padding">
                <div class="alert alert-info"><i class="fa fa-exclamation-circle"></i> Hover on a table row below to view the category picture.</div>
                <div style="border:1px solid gainsboro">

                </div>
                <div class="align-self-center">
                    <a class="btn w3-hover-dark-gray" role="button" data-toggle="modal" data-target="#add-category-modal"><i class="fa fa-plus"></i> Add Category</a>

                </div>
            </div>

            <table class="table w3-small">
                <thead class="thead-inverse">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Pictures</th>
                    <th>Updated at</th>
                    <th>Available Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach( $categories as $category)
                    <tr>
                        <td>{{ ++$loop->index.'.' }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->pictures->count() }}</td>
                        <td>{{ $category->updated_at->diffForHumans() }}</td>
                        <td>
                            <a class="btn btn-sm w3-blue w3-hover-shadow" href="#">View</a>
                            <a class="btn btn-sm w3-teal w3-hover-shadow" data-toggle="modal" data-target="#edit-category-modal-{{$category->id}}" role="button">Edit</a>
                            <a class="btn btn-sm w3-dark-gray w3-hover-shadow delete-confirm" data-title="{{ $category->name }}" href="{{ URL::route('admin.categories.delete',$category->id) }}">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
