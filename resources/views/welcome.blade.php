<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a7437f466d.js" crossorigin="anonymous"></script>
</head>

<body>
    <h1 class="text-center my-5">Tasks for Today</h1>

    <div class="create-task-field row mx-5 mb-5 d-flex">
        <form method="post" action="{{ route('uploadTask') }}">
            {{ csrf_field() }}

            <div class="input-group mb-3 col-12">
                <input type="text" class="form-control" placeholder="Create New Task Here" name="taskItem">
                <button class="btn btn-outline-primary" type="submit" id="button-addon2">Add Task</button>
            </div>

        </form>
    </div>

    <div class="row mx-5">

        <div class="container col-12">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Task No.</th>
                        <th scope="col">Task Name</th>
                        <th scope="col">Complete?</th>
                        <th scope="col">Created</th>
                        <th scope="col">Updated</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($taskItems as $taskItem)
                    <tr>
                        <th scope="row" class="align-middle">{{ $taskItem->id}}</th>
                        <td class="align-middle">{{ $taskItem->taskname }}</td>
                        <td class="align-middle">{{ $taskItem->is_complete }}</td>
                        <td class="align-middle">{{ $taskItem->created_at }}</td>
                        <td class="align-middle">{{ $taskItem->updated_at }}</td>
                        <td class="align-middle">

                            <div class="d-flex">
                                <form method="post" action="{{ route('completeTask', $taskItem->id) }}">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-sm mx-2 btn-outline-success" data-toggle="tooltip" data-placement="top" title="Mark as Complete">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                </form>

                                <form method="post" action="{{ route('incompleteTask', $taskItem->id) }}">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-sm mx-2 btn-outline-warning" ata-toggle="tooltip" data-placement="top" title="Mark as Incomplete">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </form>

                                <form method="post" action="{{ route('deleteTask', $taskItem->id) }}">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-sm mx-2 btn-outline-danger" ata-toggle="tooltip" data-placement="top" title="Delete Record">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</body>

</html>