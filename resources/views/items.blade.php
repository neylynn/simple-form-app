<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Items List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function deleteItem(id) {
            $.ajax({
                url: `/items/delete/${id}`,
                type: 'POST',
                data: { _token: '{{ csrf_token() }}' },
                success: function (response) {
                    if (response.success) {
                        location.reload();
                    }
                },
                error: function (error) {
                    console.error('Error deleting item:', error);
                }
            });
        }

        function recoverItem(id) {
            $.ajax({
                url: `/items/recover/${id}`,
                type: 'POST',
                data: { _token: '{{ csrf_token() }}' },
                success: function (response) {
                    if (response.success) {
                        location.reload();
                    }
                },
                error: function (error) {
                    console.error('Error recovering item:', error);
                }
            });
        }
    </script>
</head>
<body>
    <div class="container mt-5">
        <h1>Items List</h1>

        <form method="GET" action="/items" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search items by name" value="{{ $search }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>

        <h2>Active Items</h2>
        <ul class="list-group mb-4">
            @forelse ($activeItems as $item)
                <li id="item-{{ $item['id'] }}" class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item['id'] }} - {{ $item['name'] }}
                    <button class="btn btn-danger btn-sm" onclick="deleteItem({{ $item['id'] }})">Delete</button>
                </li>
            @empty
                <li class="list-group-item">No active items found.</li>
            @endforelse
        </ul>

        <h2>Deleted Items</h2>
        <ul class="list-group">
            @forelse ($deletedItems as $item)
                <li id="deleted-item-{{ $item['id'] }}" class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $item['id'] }} - {{ $item['name'] }}
                    <button class="btn btn-success btn-sm" onclick="recoverItem({{ $item['id'] }})">Recover</button>
                </li>
            @empty
                <li class="list-group-item">No deleted items found.</li>
            @endforelse
        </ul>
    </div>
</body>
</html>
