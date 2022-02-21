<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Search in Posts</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div class="max-w-sm mx-auto py-8">
    <form action="/search" method="get"  class="flex items-center justify-between border" enctype="multipart/form-data">
        @csrf
        <input type="text" name="query"  placeholder="Search For Something...">
        <button type="submit">Search</button>
    </form>

    @if($results)
        <div class="space-y-4">

            @if($results->count())
                <em> Found {{ $results->total() }}</em>
                @foreach($results as $item)
                    <div>
                        <h1 class="text-lg font-semibold">{{$item->normalize_name}} # {{$item->id}}</h1>
{{--                        <p> {{$item->body}}</p>--}}
{{--                        <p> {{$item->user->name}}</p>--}}
                    </div>
                @endforeach

                {{ $results->links() }}

            @else
                <p>
                    Sorry No Results Found !
                </p>
            @endif
        </div>
    @endif
</div>
</body>
</html>
